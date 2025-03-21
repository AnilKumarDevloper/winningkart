@php
    $cart_added = [];
@endphp

<div class="carousel-box px-3 position-relative has-transition Product_card  home_slicky_products">
    <div class="aiz-card-box h-auto bg-white hov-scale-img">
        <div class="position-relative img-fit overflow-hidden product_image home_product_img_">
            @php
            $product_url = route('product', $product->slug);
            if ($product->auction_product == 1) {
                $product_url = route('auction-product', $product->slug);
            }
            @endphp
            <!-- Image -->
           
            <a href="{{ $product_url }}" class="d-block h-100">
                <img class="lazyload mx-auto img-fit has-transition"
                    src="{{ get_image($product->thumbnail) }}"
                    alt="{{ $product->getTranslation('name') }}" title="{{ $product->getTranslation('name') }}"
                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg'); }}'" >
            </a>
            
        </div>
        <div class="text-left">
            <div class="productCardInfo">
                <div class="product-card">
                   
                    <h3 class="fw-600 fs-16 text-truncate-2 lh-1-4 mb-0 text-center pt-1">
                        <a href="{{ $product_url }}" class="d-block text-reset hov-text-primary"
                            title="{{ $product->getTranslation('name') }}">{{ $product->getTranslation('name') }}</a>
                    </h3>
                    <div class="product-rating mt-2">
                        <span class="rating-star">★</span>
                        <span class="rating-value">4.8</span>
                        <span class="product-category"> |&nbsp; {{ $category_name }}</span>
                    </div>
                    
                    <div class="product-price mt-2">

                        @if ($product->auction_product == 0)
                            <!-- Previous price -->
                            @if (home_base_price($product) != home_discounted_base_price($product))
                                <div class="disc-amount1 has-transition1 d-inline">
                                    <del class="fw-400 text-secondary mr-1 d-inline">{{ home_base_price($product) }}</del>
                                </div>
                            @endif
                            <!-- price -->
                            <div class="d-inline">
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

                        <!-- <button class="wishlist-icon" onclick="addToCompare({{ $product->id }})"
                        data-toggle="tooltip" data-title="{{ translate('Add to compare') }}" data-placement="">
                             <img src="{{ asset('public/assets/img/compare.png') }}" alt="">
                        </button> -->

                        <button class="wishlist-icon" onclick="addToWishList({{ $product->id }})"
                        data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="">
                            <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                        </button>

                        <button class="add-to-cart" style="padding: 7px 25px;" >
                            <span><a href="javascript:void(0);" class="text-white" onclick="showAddToCartModal({{ $product->id }})" style="font-size: 0.7rem;">Add to Cart</a></span>
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
