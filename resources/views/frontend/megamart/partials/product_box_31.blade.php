@php
    $cart_added = [];
@endphp


<div class="carousel-box px-3 position-relative has-transition Product_card">
    <div class="aiz-card-box h-auto bg-white hov-scale-img">
        <div class="position-relative img-fit overflow-hidden">
            @php
            $product_url = route('product', $product->slug);
            if ($product->auction_product == 1) {
                $product_url = route('auction-product', $product->slug);
            }
            @endphp
            
            <a href="{{ $product_url }}" class="d-block h-100">
                <img class="lazyload mx-auto img-fit has-transition h-100"
                    src="{{ get_image($product->thumbnail) }}"
                    alt="{{ $product->getTranslation('name') }}" title="{{ $product->getTranslation('name') }}"
                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg'); }}'">
            </a>
            <!-- Discount percentage tag -->
            <!-- Wholesale tag -->
            <!-- wishlisht & compare icons -->
        </div>
        <div class="text-left">
            <div class="productCardInfo">
                <div class="product-card">
                    <!--<h2 class="product-title">Multifunctional Sewing Kit</h2>-->
                    <h3 class="fw-400 fs-13 text-truncate-2 lh-1-4 mb-0 h-40px text-center pt-1">
                        <a href="{{ $product_url }}" class="d-block text-reset hov-text-primary"
                            title="{{ $product->getTranslation('name') }}">{{ $product->getTranslation('name') }}</a>
                    </h3>
                    <div class="product-rating">
                        <span class="rating-star">★</span>
                        <span class="rating-value">4.8</span>
                        <span class="product-category">| Category</span>
                    </div>
                    <p class="product-availability">100 Available</p>
                    <div class="product-price">

                        @if ($product->auction_product == 0)
                            <!-- Previous price -->
                            @if (home_base_price($product) != home_discounted_base_price($product))
                                <div class="disc-amount has-transition">
                                    <del class="fw-400 text-secondary mr-1">{{ home_base_price($product) }}</del>
                                </div>
                            @endif
                            <!-- price -->
                            <div class="">
                                <span class="fw-700 text-primary">{{ home_discounted_base_price($product) }}</span>
                            </div>
                        @endif
                        @if ($product->auction_product == 1)
                            <!-- Bid Amount -->
                            <div class="">
                                <span class="fw-700 text-primary">{{ single_price($product->starting_bid) }}</span>
                            </div>
                        @endif

                    </div>
                    <div class="btn_wish">
                        <button class="wishlist-icon" onclick="addToCompare({{ $product->id }})"
                        data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                            </svg>
                        </button>
                        <button class="wishlist-icon" onclick="addToWishList({{ $product->id }})"
                        data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="left">
                            <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                        </button>
                        <button class="add-to-cart">
                            <span><a href="javascript:void(0);" class="text-white" onclick="showAddToCartModal({{ $product->id }})">Add to Cart</a></span>
                            <span class="cart-icon">
                                <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                            </span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
