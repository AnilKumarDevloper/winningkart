<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\City;
use App\Models\State;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Hash;
use Session;


class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $address = new Address;
        $isDefaultAddress = 0;
        if(Auth::check()){
            $address->user_id   = $request->customer_id;
            $isDefaultAddress = $request->has('is_default_address') ? 1 : 0;
            if($isDefaultAddress == 1){
                Address::where('user_id', $request->customer_id)->update([
                    "set_default" => 0
                ]);
            }
        }else{
            $phone_exists = User::where('phone', $request->country_code.$request->phone)->exists();
            $user_id = '';
            $platform = '';
            $otp = mt_rand(100000, 999999); 
            if($phone_exists){
                // login user
                $platform = 'phone';
                User::where('phone', $request->country_code.$request->phone)
                ->update(['verification_code' => $otp]);
                $user =  User::where('phone', $request->country_code.$request->phone)->first();
                $address->user_id   = $user->id;
                Address::where('user_id', $user->id)->update([
                    "set_default" => 0
                ]);
                   //send otp on sms here----------------------------
                    $otpController = new OTPVerificationController;
                    $otpController->send_code($user);
                    //send otp on sms here----------------------------
            }else{
                $platform = 'phone';
                $password = substr(hash('sha512', rand()), 0, 8);
                $user = User::create([
                    "name" => $request->name, 
                    'phone' => $request->country_code.$request->phone,
                    'password' => Hash::make($password),
                    'is_guest' => 1,
                    'user_type' => 'customer',
                    'verification_code' => $otp
                ]);
                $address->user_id   = $user->id; 
                   //send otp on sms here----------------------------
                    $otpController = new OTPVerificationController;
                    $otpController->send_code($user);
                    //send otp on sms here----------------------------
            }
        }
            $address->house_number  = $request->house_number;
            $address->address       = $request->address;
            $address->country_id    = $request->country_id;
            $address->state_id      = $request->state_id;
            $address->city_id       = $request->city_id;
            $address->longitude     = $request->longitude;
            $address->latitude      = $request->latitude;
            $address->postal_code   = $request->postal_code;
            $address->area          = $request->area;
            $address->state         = $request->state;
            $address->name          = $request->name;
            $address->email         = $request->email;
            $address->phone         = $request->phone;
            $address->set_default   = $isDefaultAddress;
            $address->save();
            $address = $address->fresh();

            flash(translate('Address info Stored successfully'))->success();
            session(['saved_address' => $address]);
            if(Auth::check()){
                Cart::where('user_id', Auth::user()->id)->update(['address_id' => $address->id]);
            }else{
                if(session('temp_user_id') != null){
                    Cart::where('temp_user_id', session('temp_user_id'))->update([
                        'user_id' => $user->id,
                        'temp_user_id' => null,
                        'address_id' => $address->id
                    ]);
                    Session::forget('temp_user_id');
                    Address::where('id', $address->id)->update(["set_default" => 1]);
                }
                return redirect()->route('frontend.verify_otp', [$platform, Crypt::encrypt($user->id), 'frontend.auth.payment']);
            }
            return redirect()->route('frontend.auth.payment');
        }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data['address_data'] = Address::findOrFail($id);
        $data['states'] = State::where('status', 1)->where('country_id', $data['address_data']->country_id)->get();
        $data['cities'] = City::where('status', 1)->where('state_id', $data['address_data']->state_id)->get();

        $returnHTML = view('frontend.'.get_setting('homepage_select').'.partials.address_edit_modal', $data)->render();
        return response()->json(array('data' => $data, 'html' => $returnHTML));
    }

    /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
    */

    public function update(Request $request, $id){
        $address = Address::findOrFail($id);
        $isDefaultAddress = $request->has('is_default_address') ? 1 : 0;
        if($isDefaultAddress == 1){
            Address::where('user_id', $request->customer_id)->update([
                "set_default" => 0
            ]);
             $address->set_default   = $isDefaultAddress;
        }
        $address->house_number  = $request->house_number;
        $address->address       = $request->address;
        $address->country_id    = $request->country_id;
        $address->state_id      = $request->state_id;
        $address->city_id       = $request->city_id;
        $address->longitude     = $request->longitude;
        $address->latitude      = $request->latitude;
        $address->postal_code   = $request->postal_code;
        $address->area          = $request->area;
        $address->state         = $request->state;
        $address->name          = $request->name;
        $address->email         = $request->email;
        $address->phone         = $request->phone;
       
        $address->save();
        Cart::where('user_id', Auth::user()->id)->update(['address_id' => $id]);
        flash(translate('Address info updated successfully'))->success();
        return redirect()->route('frontend.auth.payment');
        // return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id); 
        if (!$address->set_default) {
            $address->delete();
            flash(translate('Address Deleted.'))->success();

            return back();
        }
        flash(translate('Default address cannot be deleted'))->warning();
        return back();
    }

    public function getStates(Request $request)
    {
        $states = State::where('status', 1)->where('country_id', $request->country_id)->get();
        $html = '<option value="">' . translate("Select State") . '</option>';

        foreach ($states as $state) {
            $html .= '<option value="' . $state->id . '">' . $state->name . '</option>';
        }

        echo json_encode($html);
    }


    public function getCities(Request $request)
    {
        $cities = City::where('status', 1)->where('state_id', $request->state_id)->get();
        $html = '<option value="">' . translate("Select City") . '</option>';

        foreach ($cities as $row) {
            $html .= '<option value="' . $row->id . '">' . $row->getTranslation('name') . '</option>';
        }

        echo json_encode($html);
    }

    public function set_default($id)
    {
        foreach (Auth::user()->addresses as $key => $address) {
            $address->set_default = 0;
            $address->save();
        }
        $address = Address::findOrFail($id);
        $address->set_default = 1;
        $address->save();

        return back();
    }

    public function addNewAddress(Request $request){
        $validate = $request->validate([
            "postal_code" => ["required"],
            "area" => ["required"],
            "state" => ["required"],
            "house_number" => ["required"],
            "address" => ["required"],
            "name" => ["required"],
            "email" => ["required", "email"],
            "phone" => ["required", "digits:10"]
        ]);
        try{
            $new_address = new Address();
            $new_address->user_id = Auth::user()->id;
            $new_address->postal_code = $request->postal_code;
            $new_address->area = $request->area;
            $new_address->state = $request->state;
            $new_address->house_number = $request->house_number;
            $new_address->address = $request->address;
            $new_address->name = $request->name;
            $new_address->email = $request->email;
            $new_address->phone = $request->phone;
            $new_address->save(); 
            flash(translate('Address info Stored successfully'))->success();
            return redirect()->back();
        }catch(\Exception $e){
            abort('500');
        }
    }


}
