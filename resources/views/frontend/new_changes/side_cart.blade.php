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

@if (isset($carts) && count(value: $carts) > 0)
<div class="accordion" id="accordionExample">
                    <div class="accordion-item"> 
                        <div class="accordion-button d-flex justifycontentbetween"  data-bs-toggle="collapse" data-bs-target="#productItems" aria-expanded="true" aria-controls="productItems">
                            <div class="justifycontentbetween2">
                               <span><b>Bag</b></span>
                               <span style="padding-right: 6px;">{{ count($carts) > 0 ? count($carts) : 0 }} items</span>
                            </div>
                        </div>
                   
                        <div id="productItems" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body productContainer"> 
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
                                <div class="">
                                        <a href="{{ route('product', $product->slug) }}" class="productItemImg d-flex">
                                            @if($product->thumbnail_img != '')
                                            <span><img src="{{ uploaded_asset($product->thumbnail_img) }}" data-src="{{ uploaded_asset($product->thumbnail_img) }}" class="img-fit lazyload size-60px has-transition" alt="{{ $product->getTranslation('name') }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"></span>
                                            @else
                                            <span><img src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ uploaded_asset($product->thumbnail_img) }}" class="img-fit lazyload size-60px has-transition" alt="{{ $product->getTranslation('name') }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"></span>
                                            @endif
                                            <span class="productTitles">
                                            {{ $product->getTranslation('name') }}
                                        </a> 
                                        <div class="d-flex mt-2 justify-content-between cartQty">
                                            <span>Quantity :<span>{{ $cartItem['quantity'] }}</span></span>
                                            <span><b>Rs.{{  number_format($totalPrice, 2) }}</b></span>
                                        </div>
                                </div>
                                @endif
                                @endforeach
                                <!----->
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item"> 
                        <div class="accordion-button collapsed justifycontentbetween" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              <div class="justifycontentbetween2">
                                   <span><b>Price Details</b></span>
                                    <span style="padding-right: 6px;">{{ single_price($total) }}</span>
                            </div>
                        </div>
                      
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                 <div>
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
                        </div>
                    </div>
                  
                </div>
                @endif