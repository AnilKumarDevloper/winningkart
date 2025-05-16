<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('public/assets/css/custom-style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <style>
        .paymentmethod{
            border: none;
            outline: none;
            background-color: #fff;
            width: 100%;
            min-height: 56px;
            padding: 0px;
        }
        .upiDetails img{
            width: 35px;
        }
        .nav-pills .nav-link.active{
            background-color: aliceblue;

        }
        .subtitle{
            font-size: 16px;
            font-weight: 500;
            line-height: 24px;
            letter-spacing: -0.1px;
            color: rgba(0, 19, 37, 0.92);
            text-overflow: ellipsis;
            overflow: hidden;
            margin: 0px;
            -webkit-font-smoothing: antialiased;
            text-align: left;
        }
        .pay_method_title{
            font-size: 14px;
    font-weight: 400;
    line-height: 20px;
    letter-spacing: 0px;
    color: rgba(0, 19, 37, 0.64);
    margin: 0px;
    -webkit-font-smoothing: antialiased;
        }

        .pay_details_container{
            visibility: visible;
            opacity: 1;
            height: auto;
            background-color: rgb(255, 255, 255);
            margin: 0px 6px;
            overflow: unset;
            max-height: 2000px;
            padding-left: 0px;
        }
    .css-payment_with{
    font-size: 20px;
    font-weight: 600;
    line-height: 24px;
    letter-spacing: -0.1px;
    color: rgba(0, 19, 37, 0.92);
    margin: 0px;
    -webkit-font-smoothing: antialiased;
}
.main_p{
    padding-top: 24px;
    padding-bottom: 12px;
    margin-bottom: 12px;
    padding-left: 12px;
    border-bottom: 1px solid rgba(0, 19, 37, 0.16);
    border-top-color: rgba(0, 19, 37, 0.16);
    border-right-color: rgba(0, 19, 37, 0.16);
    border-left-color: rgba(0, 19, 37, 0.16);
}
.paymentimg{
    width: 35px;
}
.detail_Inputs{
    padding: 10px 12px;
    outline: none;
    border: 1px solid rgba(0, 19, 37, 0.16);
    width: 100%;
}
    </style>
</head>
<body>
    @php
    use App\Models\Cart;
    use App\Models\Address;

     $cart = [];
        if(auth()->user() != null){
            $cart = Cart::where('user_id', Auth::user()->id)->first();
            $address = Address::where('id', $cart->address_id)->first();
        }else{
            $temp_user_id = Session()->get('temp_user_id');
            if($temp_user_id){
                $cart = Cart::where('temp_user_id', $temp_user_id)->first();
                $address = Address::where('id', $cart->address_id)->first();
            }
        }
        if(!$cart){
            return redirect('/home');
        }
    @endphp
<header class="loginHeader">
        <div class="container" style="max-width:1140px">
            <div class="d-flex align-items-center">
                <div class="w-25">
                    <a href="{{ route('home') }}">
                        <img src="{{ url('/public/uploads/all/DOpocsFF5UbkkXMXjmOHv8h4TGg0yB5GJ0tVZ3Ri.webp') }}"
                        style="width:150px">
                    </a>
                </div>
                <div class="row w-75"> 
                    <div class="col-4 d-flex align-items-center gap-3">
                        <span class="stepWise color1"><i class="ri-user-line"></i></span>
                        <span>Sign Up</span>
                    </div> 
                    <div class="col-4 d-flex align-items-center gap-3">
                        <span class="stepWise addre"><b>2</b></span>
                        <span>Address</span>
                    </div> 
                    <div class="col-4 d-flex align-items-center gap-3">
                        <span class="stepWise addre"><b>3</b></span>
                        <span> Payment</span>
                    </div> 
                </div>
            </div>  
        </div>
    </header>

    <section>
        <div class="container mt-4" style="max-width:1140px">
            <div class="adr1">
                <p class="accountsh1">Choose payment method</p>
                <p class="accountp1 mt-2"> Choose the payment method you prefer</p>
            </div>
            
            <div class="row mt-5"> 
                <div class="col-sm-8"> 
                <form action="{{ route('payment.checkout') }}" class="form-default" role="form" method="POST" id="checkout-form">
                   @csrf

                   <div class="row">  
                        <div class="col-sm-6"> 
                             <!-- Paypal --> 
                             @if (get_setting('paypal_payment') == 1)
                                <div class="d-flex payment_options">
                                    <span>
                                    <img src="https://adn-static1.nykaa.com/media/wysiwyg/Payments/DesktopRevamp_icons/card-debit-credit-24_2.svg" class="paymentimg" >
                                    </span>
                                    <div class="d-flex">
                                         <input value="paypal" class="online_payment" type="radio" name="payment_option" checked>
                                    <p class="subtitle " color="">{{ translate('Paypal') }}</p> 
                                    </div>
                                </div>
                            @endif
 

                                     <!-- razorpay -->
                                    @if (get_setting('razorpay') == 1)
                                        <div class="d-flex payment_options">
                                    <span>
                                    <img src="https://adn-static1.nykaa.com/media/wysiwyg/Payments/DesktopRevamp_icons/card-debit-credit-24_2.svg" class="paymentimg" >
                                    </span>
                                    <div class="d-flex">
                                         <input value="razorpay" class="online_payment" type="radio" name="payment_option" checked>
                                    <p class="subtitle " color="">{{ translate('Razorpay') }}</p> 
                                    </div>
                                </div>
                                    @endif

                                     <!-- Cash Payment -->
                                    @if (get_setting('cash_payment') == 1)
                                       <div class="d-flex payment_options">
                                    <span>
                                    <img src="https://adn-static1.nykaa.com/media/wysiwyg/Payments/DesktopRevamp_icons/card-debit-credit-24_2.svg" class="paymentimg" >
                                    </span>
                                    <div class="d-flex">
                                         <input value="cash_on_delivery" class="online_payment" type="radio" name="payment_option" checked>
                                    <p class="subtitle " color="">{{ translate('Cash on Delivery') }}</p> 
                                    </div>
                                </div>
                                   
                                    @endif




                            </div>
                            <div class="col-md-6"> 
                                    <div class="card-header p-4 border-bottom-0">
                                <h5 class="fs-16 fw-700 text-dark mb-0">
                                    {{ translate('Any additional info?') }}
                                </h5>
                            </div>
                                       <div class="form-group px-4">
                                <textarea name="additional_info" rows="5" class="form-control rounded-0"
                                    placeholder="{{ translate('Type your text...') }}"></textarea>
                            </div>

                                    <div class="col-12 mt-2">
                                       <button type="button" onclick="submitOrder(this)"
                                        class="btn btn-primary fs-14 fw-700 rounded-0 px-4">{{ translate('Complete Order') }}</button>
                                    </div> 
                            </div> 
                     
                    </div>
                </div>
                
            </form>

                <div class="col-sm-4">

                    @if($address != '')
                     <span class="userName">{{ $address->name ?? '' }}</span><br>
                     <span>{{ $address->house_number ?? '' }}, {{ $address->address ?? '' }}</span><br>
                    <span>{{ $address->area}}, {{ $address->state}} - {{ $address->postal_code ?? '' }}</span><br>
                    <span>{{ $address->phone ?? '' }}</span>
                    @endif

                    @include('frontend.new_changes.side_cart') 
                    <div class="mt-3 d-flex gap-2" style="background: rgb(249, 250, 250); padding: 12px 17px;">
                        <span><p class="authontic">Buy authentic products. Pay securely. Easy returns and exchange</p></span>
                        <span><img src="{{ url('public\assets\img\BuyerAssuran.svg') }}"></span>
                    </div> 
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        var minimum_order_amount_check = {{ get_setting('minimum_order_amount_check') == 1 ? 1 : 0 }};
        var minimum_order_amount =
        {{ get_setting('minimum_order_amount_check') == 1 ? get_setting('minimum_order_amount') : 0 }};
 
          function submitOrder(el) {
            $(el).prop('disabled', true);
            // if ($('#agree_checkbox').is(":checked")) {
                if (minimum_order_amount_check && $('#sub_total').val() < minimum_order_amount) {   
                    alert('You order amount is less then the minimum order amount');
                    // AIZ.plugins.notify('danger', '{{ translate('You order amount is less then the minimum order amount') }}');
                }else{
                    var offline_payment_active = '{{ addon_is_activated('offline_payment') }}';
                    if (offline_payment_active == '1' && $('.offline_payment_option').is(":checked") && $('#trx_id')
                        .val() == '') { 
                    alert('You need to put Transaction id');
                    // AIZ.plugins.notify('danger', '{{ translate('You need to put Transaction id') }}');
                    $(el).prop('disabled', false);
                } else {
                    $('#checkout-form').submit();
                }
            }
        // }else{ 
        //         alert('You need to agree with our policies');
        //         // AIZ.plugins.notify('danger', '{{ translate('You need to agree with our policies') }}');
        //         $(el).prop('disabled', false);
        //     }
        }
    </script>

</body>
</html> 