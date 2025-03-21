@php
    $total = 0;
    $total_no_of_items = 0;
    $carts = get_user_cart();
    if(count($carts) > 0) {
        foreach ($carts as $key => $cartItem) {
            $product = get_single_product($cartItem['product_id']);
            $total = $total + cart_product_price($cartItem, $product, false) * $cartItem['quantity'];
            $total_no_of_items = $total_no_of_items + $cartItem['quantity'];
        }
    }
@endphp     
<div>
    <div class="d-flex gap-2">  
        <div class="">
            <button class="button_cart" id="toggleSidebar">
                <span class="item_qty d-flex justify-content-center align-items-center">{{$total_no_of_items> 0 ? $total_no_of_items : 0 }}</span>
                    <i class="ri-shopping-cart-line"></i>
            </button>
        </div> 
    </div>
    <!--- rite sidebar sections  start-->
    <div class="right_sidebar">
        <div class="overlayer-2"></div>
            @if (isset($carts) && count(value: $carts) > 0)
                <div class="sidebarRight" id="cart_elements">
                    <div class="sidbar_Header">
                        <div class="d-flex gap-3 align-items-center">
                            <span class="closeArrow" id="closeArroCart"><i class="ri-arrow-left-line"></i></span>
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
                                @if ($product != null) 
                                    <div class="cart_products">
                                        <div class="d-flex gaps2">
                                            <div class="cart_img">
                                               <img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ uploaded_asset($product->thumbnail_img) }}" class="img-fit lazyload size-60px has-transition" alt="{{ $product->getTranslation('name') }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                            </div>
                                            <div>
                                              
                                                    <div class="d-flex gap-2">
                                                        <div class="title_section">
                                                        <a href="{{ route('product', $product->slug) }}" style="text-decoration: none; color:#121416">
                                                            <span class="titles_inCart">{{ $product->getTranslation('name') }}</span></div>
                                                            </a>
                                                            <span class="delete_fromCart" onclick="removeFromCart({{ $cartItem['id'] }})"><button><i class="ri-delete-bin-line"></i></button></span>
                                                    </div>
                                                
                                                <button class="quantity_button" id="select_quantity_btn">
                                                    <p >Quantity : <span >{{ $cartItem['quantity'] }}</span> <i class="ri-arrow-down-s-line"></i></p>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="product_price">
                                            <span>You Pay <span class="information" id="product_offer_element"><i class="ri-information-line"></i></span></span>
                                            <span>Rs.{{  number_format($totalPrice, 2) }} </span>

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <!--- coopan code section start -->
                            <div class="cart_products CouponsSection" id="CouponsCode">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="CouponsText">Coupons</p>
                                        <p class="couponsAply">Apply now and save extra!</p>
                                    </div>
                                    <span><i class="ri-arrow-right-wide-fill"></i></span>
                                </div>
                            </div>
                            <!--- coopan code section  end--> 
                            <div class="cart_products">
                                <div class="Price_details pt-1 pb-2">
                                    <p>Price Details</p>
                                </div>
                                <div>
                                    <div class="details_section d-flex justify-content-between">
                                        <span>Bag MRP (<span>4</span> items)</span>
                                        <span>{{ single_price($total) }}</span>
                                    </div>
                                    <div class="details_section d-flex justify-content-between">
                                        <span>Shipping <span class="information" id="shipping_charge_btn"><i class="ri-information-line"></i></span></span>
                                        <span>₹70 <span style="color: #068743; font-size: 11px;">Free</span></span>
                                    </div> 
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
                                    <div class="price_inCart_title">
                                        <span>Grand Total</span>
                                    </div>
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
                        <div>
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
                                                <span>₹429</span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span>Discount on MRP</span>
                                                <span>₹30</span>
                                            </div>
                                            <div class="d-flex justify-content-between paybleText mb-2">
                                                <span>Discount on MRP</span>
                                                <span>₹30</span>
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
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="select_Quantity1" checked>
                                                <label class="form-check-label" for="select_Quantity1">1</label>
                                            </div>
                                            <div class="form-check selectQuantity mb-2">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="select_Quantity2">
                                                <label class="form-check-label" for="select_Quantity2">2</label>
                                            </div>
                                            <div class="form-check selectQuantity mb-2">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="select_Quantity3">
                                                <label class="form-check-label" for="select_Quantity3">3</label>
                                            </div>
                                            <div class="form-check selectQuantity mb-2">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="select_Quantity4">
                                                <label class="form-check-label" for="select_Quantity4">4</label>
                                            </div>
                                            <div class="form-check selectQuantity mb-2">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="select_Quantity6">
                                                <label class="form-check-label" for="select_Quantity6">5+</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!---Select Quantity end -->
                                    <!--- Shipping Charge start --->
                                    <div class="p-4" id="shipping_charge" style="display: none;">
                                        <div><span class="close_isBtn" ><i class="ri-close-line"></i></span></div>
                                        <div class="item_titles pt-3 pb-3">
                                            <p>Shipping Charge</p> 
                                        </div> 
                                        <div> 
                                            <p style="color: rgb(0 19 37 / 64%); font-size:16px">Shipping over order of Rs. 299 is free</p>
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
                    <div class="sidebarRight" id="coupon_elements" style="display: none; padding: 0 15px;">
                          <div class="sidbar_Header">
                                <div class="d-flex gap-3 align-items-center">
                                    <span class="closeArrow" id="coupon_back_btn"><i class="ri-arrow-left-line"></i></span>
                                    <b>Coupons & Offers</b> 
                                </div>
                         </div>  
                         <div class="searchbox mt-3">
                            <div class="d-flex justify-content-between">
                                <input type="text" class="w-100" placeholder="Enter Coupon Code" id="couponCodeValue">
                                <spna>Apply</spna>
                            </div>
                         </div>
                    </div>
                    <!---- coupons sections end --->
            </div>
        <!--- rite sidebar sections end -->
    </div>