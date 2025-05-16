@php
        $photos = [];
    @endphp
    @if ($detailedProduct->photos != null)
        @php
            $photos = explode(',', $detailedProduct->photos);
        @endphp
    @endif
<div class="bg-white border ">

    {{--
    <div class="p-3 p-sm-4 fs-16 fw-600">
        {{ translate('Top Selling Products') }}
    </div>

    <div class="px-3 px-sm-4 pb-4">
        <ul class="list-group list-group-flush">
            @foreach (get_best_selling_products(6, $detailedProduct->user_id) as $key => $top_product)
                <li class="py-3 px-0 list-group-item border-0">
                    <div class="row gutters-10 align-items-center hov-scale-img hov-shadow-md overflow-hidden has-transition">
                        <div class="col-xl-4 col-lg-6 col-4">
                            <!-- Image -->
                            <a href="{{ route('product', $top_product->slug) }}"
                                class="d-block text-reset">
                                <img class="img-fit lazyload h-80px h-md-150px h-lg-80px has-transition"
                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($top_product->thumbnail_img) }}"
                                    alt="{{ $top_product->getTranslation('name') }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                            </a>
                        </div>
                        <div class="col text-left">
                            <!-- Product name -->
                            <div class="d-lg-none d-xl-block mb-3">
                                <h4 class="fs-14 fw-400 text-truncate-2">
                                    <a href="{{ route('product', $top_product->slug) }}"
                                        class="d-block text-reset hov-text-primary">{{ $top_product->getTranslation('name') }}</a>
                                </h4>
                            </div>
                            <div class="">
                                <!-- Price -->
                                <span class="fs-14 fw-700 text-primary">{{ home_discounted_base_price($top_product) }}</span>
                                <!-- Home Price -->
                                @if(home_price($top_product) != home_discounted_price($top_product))
                                <del class="fs-14 fw-700 opacity-60 ml-1 ml-lg-0 ml-xl-1">
                                    {{ home_price($top_product) }}
                                </del>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    --}}

    <div class="addExtrapProduct">
        <div class="addExtrapProduct-s">
            <a href="">
                <div class="col-10" style="overflow: hidden;">
                    <div class="aiz-carousel product-gallery arrow-inactive-transparent arrow-lg-none" data-nav-for='.product-gallery-thumb' data-fade='true' data-auto-height='true' data-arrows='true'>
                        @if ($detailedProduct->digital == 0)
                            @foreach ($detailedProduct->stocks as $key => $stock)
                                @if ($stock->image != null)
                                    <div class="carousel-box img-zoom rounded-0">
                                        <img class="img-fluid h-auto lazyload mx-auto" src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ uploaded_asset($stock->image) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                    </div>
                                @endif
                            @endforeach
                        @endif

                        @foreach ($photos as $key => $photo)
                            <div class="carousel-box img-zoom rounded-0">
                                <img class="img-fluid h-auto lazyload mx-auto" src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ uploaded_asset($photo) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                            </div>
                        @endforeach 
                    </div>
                </div>
                <h5 class="productTitle">{{ $detailedProduct->getTranslation('name') }}</h5>
                <div class="d-flex justify-content-center align-items-center">
                    <span class="mrpText">MRP:</span>
                        @if (home_price($detailedProduct) != home_discounted_price($detailedProduct))
                        <del class="fw-600 text-secondary d-inline">{{ home_price($detailedProduct) }}</del>
                        @endif
                        <span class="productMrp">{{ home_discounted_price($detailedProduct) }}</span>
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







