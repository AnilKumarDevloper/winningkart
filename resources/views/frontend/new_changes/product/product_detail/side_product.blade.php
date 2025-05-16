@php
    $photos = [];
@endphp
@if($detailedProduct->photos != null)
    @php
        $photos = explode(',', $detailedProduct->photos);
    @endphp
@endif
<div class="bg-white border "> 
    <div class="addExtrapProduct">
        <div class="addExtrapProduct-s">
            <a href="">
                <div class="col-10" style="overflow: hidden;">
                    <div class="aiz-carousel product-gallery arrow-inactive-transparent arrow-lg-none" data-nav-for='.product-gallery-thumb' data-fade='true' data-auto-height='true' data-arrows='true'>
                        @if($detailedProduct->digital == 0)
                            @foreach ($detailedProduct->stocks as $key => $stock)
                                @if($stock->image != null)
                                    <div class="carousel-box img-zoom rounded-0">
                                        <img class="img-fluid h-auto lazyload mx-auto" src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ uploaded_asset($stock->image) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                    </div>
                                @endif
                            @endforeach
                        @endif  
                        @foreach($photos as $key => $photo)
                            <div class="carousel-box img-zoom rounded-0">
                                <img class="img-fluid h-auto lazyload mx-auto" src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ uploaded_asset($photo) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                            </div>
                        @endforeach 
                    </div>
                </div>
                <h5 class="productTitle">{{ $detailedProduct->getTranslation('name') }}</h5>
                <div class="d-flex justify-content-center align-items-center">
                    <span class="mrpText">MRP:</span>
                        @if (home_price_new($detailedProduct) != home_discounted_price_new($detailedProduct))
                        <del class="fw-600 text-secondary d-inline">{{ home_price_new($detailedProduct) }}</del>
                        @endif
                        <span class="productMrp">{{ home_discounted_price_new($detailedProduct) }}</span>
                </div>
                @if(discount_in_percentage($detailedProduct) > 0)
                    <h6 class="text-center itemoff">{{ discount_in_percentage($detailedProduct) }}% off</h6>
                @endif  
            </a>
        </div> 
        <div class="col-12 d-flex justify-content-center align-items-center">
            @if ($detailedProduct->digital == 0)      
                <button type="button" class="AddToCart add-to-cart"
                    @if (Auth::check() || get_Setting('guest_checkout_activation') == 1) onclick="addToCart()" @else onclick="showLoginModal()" @endif>Add To Cart</button>
                <button type="button" class="btn btn-secondary out-of-stock fw-600 d-none" disabled><i class="la la-cart-arrow-down"></i> {{ translate('Out of Stock') }}</button>
            @endif
        </div> 
    </div> 
</div>







