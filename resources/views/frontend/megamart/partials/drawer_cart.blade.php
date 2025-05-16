@php
use App\Models\BusinessSetting;
use App\Models\Coupon;
    $total = 0;
    $total_no_of_items = 0;
    $carts = get_user_cart();
    $shipping_cost = 0;
    $tax = 0;
    $discount = 0;
    $applied_coupon_code = '';
    $free_shipping_over_order_cost = BusinessSetting::where('type', 'free_shipping_over_order_cost')->first();
    if(count($carts) > 0){
        foreach($carts as $key => $cartItem){
            $product = get_single_product($cartItem['product_id']);
            $total = $total + cart_product_price($cartItem, $product, false) * $cartItem['quantity'];
            $total_no_of_items = $total_no_of_items + $cartItem['quantity'];
            $tax += cart_product_tax($cartItem, $product, false) * $cartItem['quantity'];
        }
    }

    $shipping_type = BusinessSetting::where('type', 'shipping_type')->first();
    $flat_rate_shipping_cost = BusinessSetting::where('type', 'flat_rate_shipping_cost')->first();
    if($total < $free_shipping_over_order_cost->value){
        if($shipping_type->value == 'flat_rate'){
            $shipping_cost = $flat_rate_shipping_cost->value;
        }
    }

    $coupon_discount = 0;
    $coupon_applied_status = false;
    if(get_setting('coupon_system') == 1){
        $coupon_code = null;
        if(count($carts) > 0) {
            foreach ($carts as $key => $cartItem){
                if ($cartItem->coupon_applied == 1){
                    $coupon_code = $cartItem->coupon_code;
                    $coupon_applied_status = true;
                    $applied_coupon_detail = Coupon::where('code', $cartItem->coupon_code)->first();
                    break;
                }
            }
            if($coupon_applied_status){
                $coupon_discount = $applied_coupon_detail->discount;
                $applied_coupon_code = $applied_coupon_detail->code;
            }
        } 
    }

    $available_coupons = Coupon::get();

@endphp     
            <!-- $coupon_discount = $carts->sum('discount'); -->
<div>
    <div class="d-flex gap-2"> 
        <div class="">
            <button class="button_cart" id="toggleSidebar">
                <span class="item_qty d-flex justify-content-center align-items-center">{{$total_no_of_items> 0 ? $total_no_of_items : 0 }}</span><i class="ri-shopping-cart-line"></i>
            </button>
        </div> 
    </div>
    <!--- rite sidebar sections  start-->
    <div class="right_sidebar ">
        <div class="overlayer-2"></div>
            @if (isset($carts) && count(value: $carts) > 0)
                <div class="sidebarRight" id="cart_elements">
                    <div class="sidbar_Header">
                        <div class="d-flex gap-3 align-items-center">
                            <span class="closeArrow closeArrowBag" id="closeArroCart"><i class="ri-arrow-left-line"></i></span>
                                <b>Bag</b> 
                                <p class="mb-0 text-mute" style="font-size: 12px; padding-left:7px">  <span>{{$total_no_of_items> 0 ? $total_no_of_items : 0 }} items</span></p> 
                            </div>
                        </div>  
                        <div class="card_body">
                            @auth
                            @else
                                <div data-test-id="login_redirect">
                                    <div>
                                        <div class="css-1fzh5bq login_logout_section">
                                            <div class="css-1vm2tzo">
                                                <p color="#3a4047" class="rigth_login_p">Get Started &amp; grab best offers!</p>
                                                <div class="login_buttons ">
                                                    <a href="{{ route('user.login') }}">Login / Register</a>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            @endauth
                            @foreach ($carts as $key => $cartItem)
                                @php
                                    $product = get_single_product($cartItem['product_id']);
                                    $price = cart_product_price($cartItem, $product);   
                                    $price = preg_replace('/[^0-9\.]/', '', $price);  
                                    $price = (float) $price;  
                                    $quantity = (int) $cartItem['quantity']; 
                                    $totalPrice = $quantity * $price;
                                @endphp
                                @if($product != null)
                                    <div class="cart_products">
                                        <div class="d-flex gaps2">
                                            <div class="cart_img">
                                               <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ uploaded_asset($product->thumbnail_img) }}" class="img-fit lazyload size-60px has-transition" alt="{{ $product->getTranslation('name') }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                            </div>
                                            <div>
                                                <div class="d-flex gap-2">
                                                    <div class="title_section">
                                                        <a href="{{ route('product', $product->slug) }}" style="text-decoration: none; color:#121416"><span class="titles_inCart">{{ $product->getTranslation('name') }}</span></a> 
                                                    </div>
                                                    <span class="delete_fromCart" onclick="removeFromCart({{ $cartItem['id'] }})"><button><i class="ri-delete-bin-line"></i></button></span>
                                                </div>
                                                <button class="quantity_button" id="select_quantity_btn" data-item-id="{{ $cartItem->id }}">
                                                    <p>Quantity : <span id="item_qty_{{ $cartItem->id }}">{{ $cartItem['quantity'] }}</span> <i class="ri-arrow-down-s-line"></i></p>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product_price">
                                            @if(home_price_new($product) != home_discounted_price_new($product)) 
                                                <span>You Pay
                                                    <span class="information" id="product_offer_element"
                                                        data-mrp="{{ $product->unit_price * $quantity}}"
                                                        data-discountonmrp="{{ $product->discount * $quantity }}"
                                                        data-youpay="{{ $totalPrice }}"
                                                    ><i class="ri-information-line"></i></span>
                                                </span>

                                                <span>{{  single_price($totalPrice) }}</span>
                                                @else
                                                <span>You Pay
                                                     
                                                </span>
                                                <span>{{ single_price($totalPrice) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <!--- coopan code section start -->
                            <div class="cart_products CouponsSection" id="CouponsCode">
                                <div class="d-flex justify-content-between align-items-center">
                                    @if($coupon_applied_status)
                                        <div>
                                            <p class="CouponsText">{{ $coupon_code }} Applied</p>
                                            <p class="couponsAply">View more Coupons</p>
                                        </div>
                                        <span><i class="ri-arrow-right-wide-fill"></i></span>
                                    @else
                                    <div>
                                        <p class="CouponsText">Coupons</p>
                                        <p class="couponsAply">Apply now and save extra!</p>
                                    </div>   
                                    <span><i class="ri-arrow-right-wide-fill"></i></span>
                                @endif
                            </div>
                        </div>
                            <!--- coopan code section  end--> 
                            <div class="cart_products">
                                <div class="Price_details pt-1 pb-2">
                                    <p>Price Details</p>
                                </div>
                                <div>
                                    <div class="details_section d-flex justify-content-between">
                                        <span>Bag MRP (<span>{{$total_no_of_items> 0 ? $total_no_of_items : 0 }}</span> items)</span>
                                        <span>{{ single_price($total) }}</span>
                                    </div>
                                    @if ($coupon_discount > 0)
                                        <div class="details_section d-flex justify-content-between"> 
                                            <span>{{ translate('Coupon Discount') }}<span class="information" id=""></span></span>
                                            <span><span style="font-size: 11px;">{{ single_price($coupon_discount) }}</span></span>  
                                        </div> 
                                    @endif  

                                    <div class="details_section d-flex justify-content-between">
                                        <span>Shipping <span class="information" id="shipping_charge_btn"><i class="ri-information-line"></i></span></span>
                                        @if($shipping_cost > 0)
                                            <span><span style="font-size: 11px;">Rs{{ $shipping_cost }}</span></span>
                                        @else
                                        <span>
                                            <span style="font-size: 11px;"><strike>Rs{{ $flat_rate_shipping_cost->value }}</strike> </span>
                                            <span><span style="color: #068743; font-size: 11px;">Free</span></span>
                                        </span>
                                        @endif
                                    </div> 

                                    <div class="details_section d-flex justify-content-between">
                                        <span>{{ translate('Tax') }}</span>
                                        <span>{{ single_price($tax) }}</span>
                                    </div>

                                    @php
                                        $total = $total + $tax + $shipping_cost;
                                        if(Session::has('club_point')){
                                            $total -= Session::get('club_point');
                                        }
                                        if ($coupon_discount > 0) {
                                            $total -= $coupon_discount;
                                        }
                                    @endphp
                                    <div class="Price_details d-flex justify-content-between pb-1 pt-2">
                                        <p>You Pay</p>
                                        <p>{{ single_price($total) }}</p>
                                    </div>
                            </div>
                        </div>  
                    </div>
 
                    <div class="cart_footer">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="total_price1">
                                <span class="price_inCart"><b>{{ single_price($total) }}</b></span>
                                <div class="price_inCart_title"><span>Grand Total</span></div>
                            </div>
                            <div class="proceed_cart">
                                @auth
                                    <a href="{{ route('frontend.auth.address') }}" class="d-flex justify-content-between btn"><span>Proceed</span><span><i class="ri-arrow-right-line"></i></span></a>
                                @else
                                    <a href="{{ route('frontend.auth_cart_login') }}" class="d-flex justify-content-between btn"><span>Proceed</span><span><i class="ri-arrow-right-line"></i></span></a>
                                 @endauth
                            </div>
                        </div>
                    </div>  
                    <!--- footer information element start---->
                    <div class="infocontainer">
                        <div class="overlayer-3" style="display: none;"></div>
                            <div class="footerInformation">
                                <!---Product Price element start -->
                                <div class="p-4" id="product_offer_details" style="display: none;">
                                    <div><span class="close_isBtn" ><i class="ri-close-line"></i></span></div>
                                    <div class="item_titles pt-3 pb-3"><p>Product Price</p></div>
                                        <div>
                                            <div class="footerElement_texts">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span>MRP</span>
                                                    <span id="data_mrp"></span>
                                                </div>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span>Discount on MRP</span>
                                                    <span id="data_discountonmrp"></span>
                                                </div>
                                                <div class="d-flex justify-content-between paybleText mb-2">
                                                    <span>You'll Pay</span>
                                                    <span id="data_youpay"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!---Product Price element end -->
                                    <!---Select Quantity start -->
                                    <div class="p-4" id="select_Quantity" style="display: none;">
                                        <div><span class="close_isBtn" ><i class="ri-close-line"></i></span></div>
                                        <div class="item_titles pt-3 pb-3"><p>Select Quantity</p></div>
                                        <div>
                                            <div class="form-check selectQuantity mb-2">
                                                <input class="form-check-input" type="radio" name="quantity_val" id="quantity_val_1" class="quantity_val" value="1">
                                                <label class="form-check-label" for="select_Quantity1">1</label>
                                            </div>
                                            <div class="form-check selectQuantity mb-2">
                                                <input class="form-check-input" type="radio" name="quantity_val" id="quantity_val_2"  class="quantity_val" value="2">
                                                <label class="form-check-label" for="select_Quantity2">2</label>
                                            </div>
                                            <div class="form-check selectQuantity mb-2">
                                                <input class="form-check-input" type="radio" name="quantity_val" id="quantity_val_3"  class="quantity_val" value="3">
                                                <label class="form-check-label" for="select_Quantity3">3</label>
                                            </div>
                                            <div class="form-check selectQuantity mb-2">
                                                <input class="form-check-input" type="radio" name="quantity_val" id="quantity_val_4"  class="quantity_val" value="4">
                                                <label class="form-check-label" for="select_Quantity4">4</label>
                                            </div>
                                            <div class="form-check selectQuantity mb-2">
                                                <input class="form-check-input" type="radio" name="quantity_val" id="quantity_val_5"  class="quantity_val" value="5">
                                                <label class="form-check-label" for="select_Quantity4">5</label>
                                            </div>
                                            <div class="form-check selectQuantity mb-2">
                                                <input class="form-check-input" type="radio" name="quantity_val_5_plus" id="quantity_val_5_plus"  class="quantity_val_5_plus" value="5+">
                                                <label class="form-check-label" for="select_Quantity6">5+</label>
                                            </div>
                                            <input type="hidden" id="cart_item_id">
                                        </div>
                                    </div>
                                    <div class="p-4" id="quantity_five_plus" style="display: none;">
                                        <div><span class="close_btn_quantity_five_plus" ><i class="ri-close-line"></i></span></div>
                                        <div class="item_titles pt-3 pb-3"><p>Select Quantity</p></div> 
                                        <div> 
                                            <div class="searchbox mt-3">
                                                <div class="d-flex justify-content-between">
                                                    <input type="text" name="selectedqty" id="selectedqty" class="w-100" placeholder="Enter Quantity" required>  
                                                </div> 
                                            </div>
                                            <div class="d-flex pt-2">
                                                <button type="button" class="btn btn-secondary fw-600 mr-2 mr-2 close_btn_quantity_five_plus" style="width:100%;">Cancel</button>
                                                <button type="button" class="AddToCart add-to-cart ml-2" id="submit_five_plus_qty">Submit</button>
                                            </div> 
                                        </div>
                                    </div> 
                                    <!---Select Quantity end -->
                                    <!--- Shipping Charge start --->
                                    <div class="p-4" id="shipping_charge" style="display: none;">
                                        <div><span class="close_isBtn" ><i class="ri-close-line"></i></span></div>
                                        <div class="item_titles pt-3 pb-3"><p>Shipping Charge</p></div> 
                                        <div> 
                                            <p style="color: rgb(0 19 37 / 64%); font-size:16px">Shipping over order of Rs. {{ $free_shipping_over_order_cost->value }} is free</p>
                                        </div>
                                    </div>
                                    <!--- Shipping Charge end --->
                                </div>
                            </div>
                            <!--- footer information element end----> 
                        </div> 
                       @else 
                       <!--- empty cart elemnt start ---> 
                       <div class="sidebarRight">
                            <div class="sidbar_Header">
                                <div class="d-flex gap-3 align-items-center">
                                   <span class="closeArrow"><i class="ri-arrow-left-line"></i></span>
                                    <b>Bag</b>
                                </div>
                            </div> 
                            <div class="d-flex justify-content-center align-items-center mt-5">
                                <div>
                                    <div class="d-flex justify-content-center">
                                       <img src="{{ url('public\assets\img\abandoned-cart.png')}}" width="100">
                                    </div>
                                    <div class="text-center">
                                        <p class="empty_text">Your Shopping Bag is<br> empty</p>
                                        <p color="#001325" class="css-zpajky">This feels too light! Go on, add all your <br>favourites</p>
                                        <div>
                                            <a class="Start_shopping" href="">Start Shopping</a>
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                       </div>
                         <!--- empty cart elemnt end --->
                    @endif 
                    <!---- coupons sections end ---> 
                    <div class="sidebarRight" id="coupon_elements" style="display: none;">
                        <div class="overlayer-3 couponoutLayer" style="display: none;"></div>
                            <div style="padding: 0 15px;">
                                <div class="sidbar_Header">
                                    <div class="d-flex gap-3 align-items-center">
                                        <span class="closeArrow" id="coupon_back_btn"><i class="ri-arrow-left-line"></i></span>
                                        <b>Coupons & Offers</b> 
                                    </div>
                                </div>
                                <form class="" id="apply-coupon-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="searchbox mt-3">
                                        <div class="d-flex justify-content-between">
                                            <input type="text" name="code" class="w-100" placeholder="Enter Coupon Code" id="coupon_code_val" onkeydown="return event.key != 'Enter';" placeholder="{{ translate('Have coupon code? Apply here') }}" required> 
                                            <spna type="submit" id="coupon-apply">Apply</spna>
                                        </div>
                                    </div>
                                </form>
                                <p style="color:red;" id="apply_coupon_errror"></p> 
                                <div class="unlocked-1q"><span>Unlocked Coupons</span></div>
                                @foreach($available_coupons as $available_coupon)
                                <div class="coupan-card p-2 card mt-2">
                                    <div class="first-row d-flex justify-content-between align-content-center mt-2  mb-2 ">
                                        <div class="brand-img"> 
                                            <img src="{{ static_asset('assets/img/ic_coupon.png') }}">
                                        </div>
                                        <!-- <div class="coupan-applied">
                                            <span class="savetag saveUpto">Save upto ₹123</span>
                                        </div> -->
                                    </div>
                                    <div class="coupan-containt-body">
                                        @if($available_coupon->discount_type == "percent")
                                        <h6 class="coupon-heading">Extra {{ $available_coupon->discount }}% off</h6>
                                        @else
                                        <h6 class="coupon-heading">Extra Rs. {{ $available_coupon->discount }} off</h6>
                                        @endif 
                                        <!-- <p class="coupon-info">Extra 10% off on Prepaid Orders on Campus</p>
                                        <button class="viewDetails offerDetails">View Details</button> -->
                                        <div class="applyCoupan-action d-flex justify-content-between align-items-center mt-3">
                                            <div class="coupon-code-wraper"> 
                                                <div class="row2">
                                                    <span class="couponCode">{{ $available_coupon->code }}</span>
                                                </div>
                                                <div class="coupon-expiry">Expires on {{ Carbon\Carbon::parse($available_coupon->end_date)->format('d M, Y') }}</div>
                                            </div>
                                            @if($available_coupon->code == $applied_coupon_code)
                                            <div class="coupon-code-action">
                                                <button class="appliedcoupon btn-success" data-couponcode="{{ $available_coupon->code }}">Applied</button>
                                                <button class="removecoupon btn-danger" data-couponcode="{{ $available_coupon->code }}">Remove</button>
                                            </div>
                                            @else
                                            <button class="applycoupon" data-couponcode="{{ $available_coupon->code }}">Apply</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach 
                            </div> 
                            <!--footer information cart start -->
                            <div class="infocontainer">
                                <div class="footerInformation pt-1" id="coupon_info" style="display: none;">
                                    <div style="width:35px; height: 8px; background-color: antiquewhite; cursor: pointer;" class="m-auto mb-2 closecouponDetail"></div>
                                        <div class="footer-coupon-info p-2 position-relative "> 
                                            <div class="brand-img d-flex justify-content-center mb-3"> 
                                                <img src="{{ static_asset('assets/img/ic_coupon.png') }}" style="width:40px">
                                               </div>
                                            <div class="coupon-code-wraper p-2 w-50 m-auto ">  
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <span class="couponCode" id="copyCouponCode"> </span> 
                                                    <span style="cursor: pointer;" class="copyCode" id="copyCode"> <i class="ri-file-copy-line"></i></span>
                                                </div>  
                                            </div>
                                            <div class="saveprice" id="savePrice">You saved ₹224 </div>
                                            <div class="c-info p-2 mt-3">
                                                <h6 class="coupon-heading" id="couponHeading"> </h6>
                                                <p class="coupon-info" id="couponInfo">Extra 10% off on Prepaid Orders on Campus</p>
                                                <hr class="mt-2 mb-2">
                                                <div class="termcondition">
                                                    <p class="t-condition">Terms and conditions</p>
                                                    <ul style="padding-left:15px" class="ex-off">
                                                        <li>Extra 10% off on Prepaid Orders on Campus</li>
                                                    </ul>
                                                </div>
                                                <hr class="mt-3 mb-3">
                                                
                                                <div class="removeitem-btn d-flex justify-content-center gap-2" >
                                                    <button class="btnAction mr-2">Remove</button>
                                                    <button class="btnAction tx-2 cancelCouponDetail">Cancel</button>
                                                </div>
                                            </div>  
                                            <div class="toastbody animate__shakeY" id="showcouponCode">Coupon code copied successfully..!</div> 
                                        </div>
                                    </div>  
                                </div>
                                <!--footer information cart end -->
                            </div>
                            <!---- coupons sections end --->
                        </div>
                        <!--- rite sidebar sections end --> 
                    </div>

    <!-- <div class="toast align-items-center footerRight" role="alert" aria-live="copyCode" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div> 
        </div>
     </div>  -->