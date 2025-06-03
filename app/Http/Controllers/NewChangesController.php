<?php

namespace App\Http\Controllers;

use App\Mail\OtpEmailManager;
use App\Models\Address;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\FlashDeal;
use App\Models\Product;
use App\Models\Review;
use App\Models\Upload;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Log;
use Session;
use App\Models\CombinedOrder;
use Razorpay\Api\Api;

class NewChangesController extends Controller
{
    private $api;

    public function __construct()
    {
        $this->api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
    }

    public function authCartLogin(){
        try{
            if(Auth::check()){
                return redirect()->route('frontend.auth.address');
            }else{
                return view('frontend.new_changes.auth');
            }
        }catch(\Exception $e){
            abort('404');
        }
    }

    public function authAddress(){
        try{
            $addresses = [];
            if(Auth::check()){
            $addresses = Address::with(['user', 'city', 'state', 'country'])->where('user_id', Auth::user()->id)->orderBy('set_default', 'desc')->get();
        }
            return view('frontend.new_changes.address' , compact('addresses'));
        }catch(\Exception $e){
            return $e->getMessage();
            abort('404');
        }
    }

    public function authPayment(){
        try{ 
            if(auth()->user() != null){
            $cart = Cart::where('user_id', Auth::user()->id)->first(); 
        }else{
            $temp_user_id = Session()->get('temp_user_id');
            if($temp_user_id){
                $cart = Cart::where('temp_user_id', $temp_user_id)->first(); 
            }
        }
        if($cart != ''){
            return view('frontend.new_changes.payment');
        }else{
             return redirect('/');
        }
        }catch(\Exception $e){
            abort('404');
        }
    }
   
//login code----------------------------------------------------------(start)
    public function allUserLoginView(){
        try{
            return view('frontend.new_changes.auth.login');
        }catch(\Exception $e){
            abort('404');
        }
    }

    public function allUserLoginSubmit(Request $request){
        
        $validate = $request->validate([
            "email" => ['nullable', 'sometimes', 'string', 'lowercase', 'email', 'max:255'],
            "phone" => ['nullable', 'sometimes', 'digits:10']
        ]);
        try{
            $user_id = '';
            $platform = '';
            $otp = mt_rand(100000, 999999);
            if($request->phone != null){
                $check_user_with_phone = User::where('phone', $request->country_code.$request->phone)->exists();
                if($check_user_with_phone){
                    
                    User::where('phone', $request->country_code.$request->phone)->update(['verification_code' => $otp]);
                    $user = User::where('phone', $request->country_code.$request->phone)->first();
                    $user_id = $user->id;
                    $platform = 'phone';
                    //send otp on sms here----------------------------
                    $otpController = new OTPVerificationController;
                    $otpController->send_code($user);
                    //send otp on sms here----------------------------
                }else{
                    $user = User::create([
                        'name' => 'Winningkart User',
                        'phone' => $request->country_code.$request->phone,
                        'user_type' => 'customer',
                        'verification_code' => $otp, 
                    ]);
                    $user_id = $user->id;
                    $platform = 'phone';
                }
            }elseif($request->email != null){
                $check_user_with_email = User::where('email', $request->email)->exists();
                  $otp_mail_data = [
                        "otp" => $otp
                    ]; 
                if($check_user_with_email){
                    $user = User::where('email', $request->email)->first();
                    $user_id = $user->id;
                    $platform = 'email'; 
                    // send otp on email here---------------------------
                        Mail::to($request->email)->queue(new OtpEmailManager($otp_mail_data));
                    // send otp on email here---------------------------
                    User::where('email', $request->email)->update(['verification_code' => $otp]);
                }else{
                    $user = User::create([
                        'name' => 'Winningkart User',
                        'email' => $request->email,
                        'user_type' => 'customer',
                        'verification_code' => $otp, 
                    ]);
                    $user_id = $user->id;
                    $platform = 'email';
                    
                    // send otp on email here---------------------------
                        Mail::to($request->email)->queue(new OtpEmailManager($otp_mail_data));
                    // send otp on email here---------------------------
                }
                if(session('temp_user_id') != null){
                    Cart::where('temp_user_id', session('temp_user_id'))
                            ->update([
                                'user_id' => $user->id,
                                'temp_user_id' => null
                    ]);
                    Session::forget('temp_user_id');
                }
            }else{
                return back();
            }
            return redirect()->route('frontend.verify_otp', [$platform, Crypt::encrypt($user_id)]);
        }catch(\Exception $e){
            abort('404');
        }
    }

    public function verifyOtpToLogin($platform, $user_id, $redirection_route = null){
        try{
            if($platform != 'email' && $platform != 'phone'){
                return back();
            }
            $user = User::where('id', Crypt::decrypt($user_id))->first();
     
        return view('frontend.new_changes.auth.verify_otp', compact('user', 'platform', 'redirection_route'));
        }catch(\Exception $e){
            abort('404');
        }
    }

    public function verifyOtpToLoginSubmit(Request $request, $redirection_route = null){
        $validate = $request->validate([
            "otp_digit_first" => ['required'],
            "otp_digit_second" => ['required'],
            "otp_digit_third" => ['required'],
            "otp_digit_forth" => ['required'],
            "otp_digit_fifth" => ['required'],
            "otp_digit_sixth" => ['required'],
        ]);
        try{
            $otp = $request->otp_digit_first.$request->otp_digit_second.$request->otp_digit_third.$request->otp_digit_forth.$request->otp_digit_fifth.$request->otp_digit_sixth;
            $user_id = $request->user_id; 
            $check_otp = User::where('id', $user_id)->where('verification_code', $otp)->exists();
            if($check_otp){
                $user = User::where('id', $user_id)->first();
                if(session('temp_user_id') != null){
                    Cart::where('temp_user_id', session('temp_user_id'))
                            ->update([
                                'user_id' => $user->id,
                                'temp_user_id' => null
                    ]);
                    Session::forget('temp_user_id');
                }

                User::where('id', $user_id)->update(['verification_code' => NULL]);
                Auth::login($user, true);
            }else{
                return back()->withErrors(['custom_error' => 'Incorrect OTP'])->withInput();
            }
               if($redirection_route != null){
            return redirect()->route($redirection_route);
        }
            return redirect('/'); 
        }catch(\Exception $e){
            return $e->getMessage();
            // abort('404');
        }
    }

    public function resendOtp($platform, $user_id){
        try{
            $otp = mt_rand(100000, 999999);
             User::where('id', $user_id)->update([
                'verification_code' => $otp
            ]);
            $user = User::where('id', $user_id)->first();
            if($platform == 'email'){ 
                     $otp_mail_data = [
                        "otp" => $otp
                    ];
                // send otp on email here---------------------------
                    Mail::to($user->email)->queue(new OtpEmailManager($otp_mail_data));
                // send otp on email here--------------------------- 
            }elseif($platform == 'phone'){
                // send OTP on sms----------------------------------------
                    $otpController = new OTPVerificationController;
                    $otpController->send_code($user);
                // send OTP on sms----------------------------------------
            }else{
                return back();
            }
            User::where('id', $user_id)->update([
                'verification_code' => $otp
            ]);
            return back()->with('otp_sent_success', "OTP resend successfully.");
        }catch(\Exception $e){
            abort('404');
        }
    }

//login code----------------------------------------------------------(end)

// Admin Login---------------------------------------------------------(start)
    public function adminLoginView(){
        try{
            return view('frontend.new_changes.auth.admin_login');
        }catch(\Exception $e){
            abort('404');
        }
    }

    public function adminLoginSubmit(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]); 
        try {
            $check_user = User::where('email', $request->email)->where('user_type', 'admin')->exists();
            if($check_user){
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    $request->session()->regenerate(); 
                    $user = Auth::user();
                    $user_type = $user->user_type; 
                    return redirect()->route('admin.dashboard');
                }else{
                    return back()->withErrors(['custom_error_phone' => 'Incorrect Password'])->withInput();
                }
            }else{
                return back()->withErrors(['custom_error_email' => 'Email id does not exists.'])->withInput();
            } 
        } catch (\Exception $e) {
            return abort('404');
        }
    }
// Admin Login---------------------------------------------------------(end)


    public function specialOffer(){
        try{
            $today = strtotime(date('Y-m-d H:i:s'));
            $flash_deals = FlashDeal::where('status', 1)->where('start_date', "<=", $today)
            ->where('end_date', ">", $today)
            ->get(); 
            return view('frontend.new_changes.special-offers', compact('flash_deals'));
        }catch (\Exception $e){
        abort('500');
        }
    }

    public function deliverHere($id){
        try{
            Cart::where('user_id', Auth::user()->id)->update(['address_id' => $id]);
            return redirect()->route('frontend.auth.payment');
        }catch(\Exception $e){
            abort('500');
        }
    }
    public function reviewImages($slug){
        try{
            $detailedProduct  = Product::with('reviews', 'brand', 'stocks', 'user', 'user.shop')->where('auction_product', 0)->where('slug', $slug)->where('approved', 1)->first();
            $all_reviews_images = Review::with('user:id,name')->where('product_id', $detailedProduct->id)->get();
            // return $all_reviews_images;
            return view('frontend.new_changes.review_image', compact(
            'detailedProduct',
            'all_reviews_images'
            ));
        }catch(\Exception $e){
            abort('500');
        }
    }

    public function getBrandListFromFilter(Request $request){
        try{
            $brands = Brand::select('id', 'name', 'slug', )->where('name', 'LIKE', $request->brand.'%')->get();
             return response()->json([
                "status" => "success",
                "data" => $brands
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function getAllColorList(){
        try{
           $colors = AttributeValue::select('id', 'value')->where('attribute_id', 3)->get();
             return response()->json([
                "status" => "success",
                "data" => $colors
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function getAllReviewsOfProduct($product_id){
         try{
            $data = [];
           $reviews = Review::with('user')->where('product_id', $product_id)->where('status', 1)->get();
           foreach($reviews as $review){ 
            $photosArray = explode(',', $review->photos);
            $photos = Upload::select('id', 'file_name')->whereIn('id', $photosArray)->get();
            $profile = '';
            if($review->user->avatar_original != NULL){
                $profile_photo = Upload::select()->where('id', $review->user->avatar_original)->first();
                $profile = $profile_photo->file_name;
            }
            $data[] = [
                "id" => $review->id,
                "user" =>  $review->user->name,
                "user_profile" => $profile,
                "review" => $review->comment,
                "created_at" => Carbon::parse($review->created_at)->format('d-m-Y'),
                "rating" => $review->rating,
                "photos" => $photos,
            ];
           }
            return response()->json([
                "status" => "success",
                "data" => $data
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    } 

    public function getAllVariantList(){
        try{
          $variant_list = (new Attribute)->newQueryWithoutRelationships()
        ->select('id', 'name')
        ->with(['attribute_values:id,attribute_id,value'])
        ->get();
             return response()->json([
                "status" => "success",
                "data" => $variant_list
            ], 200);
        }catch(\Exception $e){
              return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
