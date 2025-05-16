@php
use App\Models\BusinessSetting;
use App\Models\Coupon;
    $total = 0;
    $sub_total = 0;
    $total_no_of_items = 0;
    $carts = get_user_cart();
    $shipping_cost = 0;
    $tax = 0;
    $discount = 0;
    $free_shipping_over_order_cost = BusinessSetting::where('type', 'free_shipping_over_order_cost')->first();
    if(count($carts) > 0){
        foreach($carts as $key => $cartItem){
            $product = get_single_product($cartItem['product_id']);
            $sub_total = $sub_total + cart_product_price($cartItem, $product, false) * $cartItem['quantity'];
            $total_no_of_items = $total_no_of_items + $cartItem['quantity'];
            $tax += cart_product_tax($cartItem, $product, false) * $cartItem['quantity'];
        }
    }
    $shipping_type = BusinessSetting::where('type', 'shipping_type')->first();
    $flat_rate_shipping_cost = BusinessSetting::where('type', 'flat_rate_shipping_cost')->first();
    if($sub_total < $free_shipping_over_order_cost->value){   
        if($shipping_type->value == 'flat_rate'){
            $shipping_cost = $flat_rate_shipping_cost->value;
        }
    }
    $coupon_discount = 0;
    $coupon_applied_status = false;
    if (get_setting('coupon_system') == 1){
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
            }
        }
    }
@endphp 

@if(isset($carts) && count(value: $carts) > 0)
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
                </div>
            </div>
        </div>
        @php
            $total = $sub_total + $tax + $shipping_cost;
            if (Session::has('club_point')) {
                $total -= Session::get('club_point');
            }
            if ($coupon_discount > 0) {
                $total -= $coupon_discount;
            }
        @endphp

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
                                <span>Bag MRP (<span>{{ count($carts) > 0 ? count($carts) : 0 }} </span> items)</span>
                                <span>{{ single_price($sub_total) }}</span>
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
                                <span><span style="font-size: 11px;">Rs.{{ $shipping_cost }}</span></span>
                                @else
                                <span><span style="font-size: 11px;"><strike>Rs.{{ $flat_rate_shipping_cost->value }}</strike></span></span>    
                                <span><span style="color: #068743; font-size: 11px;">Free</span></span>
                                @endif
                            </div>  
                            @if($tax > 0)
                                <div class="details_section d-flex justify-content-between">
                                    <span>{{ translate('Tax') }}</span>
                                    <span>{{ single_price($tax) }}</span>
                                </div>
                            @endif
        
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