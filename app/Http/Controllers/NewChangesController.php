<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;

class NewChangesController extends Controller
{
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
            $addresses = Address::with(['user', 'city', 'state', 'country'])->where('user_id', Auth::user()->id)->get();
        }
            return view('frontend.new_changes.address' , compact('addresses'));
        }catch(\Exception $e){
            abort('404');
        }
    }
    public function authPayment(){
        try{
            return view('frontend.new_changes.payment');
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
        // return $request;
        $validate = $request->validate([
            "email" => ['nullable', 'sometimes', 'string', 'lowercase', 'email', 'max:255'],
            "phone" => ['nullable', 'sometimes', 'digits:10']
        ]);
        try{
            $user_id = '';
            $platform = '';
            $otp = mt_rand(100000, 999999);
            if($request->phone != null){
                $check_user_with_phone = User::where('phone', '+'.$request->country_code.$request->phone)->exists();
                if($check_user_with_phone){
                    $user = User::where('phone', '+'.$request->country_code.$request->phone)->first();
                    $user_id = $user->id;
                    $platform = 'phone';
                    //send otp on sms here----------------------------
                    //send otp on sms here----------------------------
                    User::where('phone', '+'.$request->country_code.$request->phone)->update(['verification_code' => $otp]);
                }else{
                    $user = User::create([
                        'name' => 'Winningkart User',
                        'phone' => '+'.$request->country_code.$request->phone,
                        'user_type' => 'customer',
                        'verification_code' => $otp, 
                    ]);
                    $user_id = $user->id;
                    $platform = 'phone';
                    // return back()->withErrors(['custom_error' => 'User Not Found. Please register first.'])->withInput();
                }
            }elseif($request->email != null){
                $check_user_with_email = User::where('email', $request->email)->exists();
                if($check_user_with_email){
                    $user = User::where('email', $request->email)->first();
                    $user_id = $user->id;
                    $platform = 'email';
                    // send otp on email here---------------------------
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
                    // return back()->withErrors(['custom_error' => 'User Not Found. Please register first.'])->withInput();
                }
            }else{
                return back();
            }
            return redirect()->route('frontend.verify_otp', [$platform, Crypt::encrypt($user_id)]);
        }catch(\Exception $e){
            abort('404');
        }
    }

    public function verifyOtpToLogin($platform, $user_id){
        try{
            if($platform != 'email' && $platform != 'phone'){
                return back();
            }
            $user = User::where('id', Crypt::decrypt($user_id))->first();
            return view('frontend.new_changes.auth.verify_otp', compact('user', 'platform'));
        }catch(\Exception $e){
            abort('404');
        }
    }

    public function verifyOtpToLoginSubmit(Request $request){
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
                User::where('id', $user_id)->update(['verification_code' => NULL]);
                Auth::login($user, true);
            }else{
                return back()->withErrors(['custom_error' => 'Incorrect OTP'])->withInput();
            }
            return redirect('/'); 
        }catch(\Exception $e){
            abort('404');
        }
    }

    public function resendOtp($platform, $user_id){
        try{    
            $otp = mt_rand(100000, 999999);
            if($platform == 'email'){
                // send OTP on email--------------------------------------
                // send OTP on email--------------------------------------
            }elseif($platform == 'phone'){
                // send OTP on sms----------------------------------------
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
    // public function redirectAdminLogin(){ 
    //     try{
    //         return redirect()->route('backend.admin_login_view');
    //     }catch(\Exception $e){
    //         abort('404');
    //     }
    // }
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
}
