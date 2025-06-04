<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CashOnDeliveryController extends Controller
{
    public function pay()
    {

        $carts = Cart::where('user_id', Auth::user()->id)->get();
        if(count($carts) > 0){
            Cart::where('user_id', Auth::user()->id)->delete();
        }

        
        flash(translate("Your order has been placed successfully"))->success();
        return redirect()->route('order_confirmed');
    }
}
