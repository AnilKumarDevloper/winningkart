@php
    $cart_added = [];
@endphp

{{-- -
<div class="carousel-box card-products3  position-relative has-transition Product_card_add">
    <div class="aiz-card-box h-auto bg-white hov-scale-img productSection h-100" style="height: 100% !important;">
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
                   
                    <h3 class="fw-600 fs-16 text-truncate-2 lh-1-4 mb-0 text-center pt-1 textTitle">
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

                        <button class="wishlist-icon " onclick="addToWishList({{ $product->id }})"
                             data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}" data-placement="">
                            <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                        </button>

                        <button class="add-to-cart" style="padding: 7px 20px;" >
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

 --}}

<div class="col-md-12 col-6">
    <div class="pr_height bg-white">
        <div class="productWrapper d-flex flex-column justify-content-between">
                <div class="productDetails productDetail_element"> 
                        <div class="bestsell">
                            @php
                                $product_url = route('product', $product->slug);
                                if ($product->auction_product == 1) {
                                    $product_url = route('auction-product', $product->slug);
                                }
                            @endphp
                            <a href="{{ $product_url }}">
                                <div class="productImages">
                                        <img src="{{ get_image($product->thumbnail) }}"
                                            alt="{{ $product->getTranslation('name') }}" title="{{ $product->getTranslation('name') }}"
                                             onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg'); }}'"
                                         class="css-11gn9r6">
                                </div>
                                <div class="productAllDetails">
                                        <div class="productTitle" title="{{ $product->getTranslation('name') }}">{{ $product->getTranslation('name') }}</div>
                                        <div class="reviews_div d-flex justify-content-center flex-wrap"> 
                                           @if ($product->auction_product == 0) 
                                           
                                              <span class="product_mrp_">MRP:
                                                  @if (home_base_price($product) != home_discounted_base_price($product))
                                                       <span><del>{{ home_base_price($product) }}</del></span>
                                                   @endif
                                               </span>
                                              <span class="current_mrp">{{ home_discounted_base_price($product) }}</span>  

                                            @endif 
                                            
                                            @if ($product->auction_product == 1)
                                                <!-- Bid Amount -->
                                                <span class="current_mrp">{{ single_price($product->starting_bid) }}</span>  
                                            @endif 
                                              <span class="price_off">35% Off</span> 
                                        </div>
                                        <div class="reviewStars ">
                                            <span><i class="ri-star-s-fill"></i></span>
                                            <span><i class="ri-star-s-fill"></i></span>
                                            <span><i class="ri-star-s-fill"></i></span>
                                            <span><i class="ri-star-s-line"></i></span>
                                            <span><i class="ri-star-s-line"></i></span> 
                                            <span>( 1 )</span>
                                        </div>
                                        <div class="css-size"><div class="css-ijlamg">6 sizes</div></div>
                                </div>
                            </a>
                        </div>
                </div>
                <!--product size and start -->
                <div class="select_size_color hiddenCartElement">
                    
                    <div class="header_select">
                            <span>Select a Size(6)</span>
                            <button type="button" class="close_selectseciton"><i class="ri-close-large-line"></i></button> 
                    </div>
                     <!-- <button>select color</button> -->


                    <div class="select_customSize">
                        <ul class="selectYourSize">
                            <li class="select_customSize_list">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input sizeWise customerselectedSize" 
                                        type="radio" 
                                        name="customSize" 
                                        value="M" 
                                        id="sizeM" 
                                        checked>
                                    <label class="form-check-label" for="sizeM">
                                        M
                                    </label>
                                </div> 
                            </li>
                            <li class="select_customSize_list">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input sizeWise customerselectedSize" 
                                        type="radio" 
                                        name="customSize" 
                                        value="XL"
                                        id="sizeXL" 
                                        >
                                    <label class="form-check-label" for="sizeXL">
                                        XL
                                    </label>
                                </div> 
                            </li>
                            <li class="select_customSize_list">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input sizeWise customerselectedSize"
                                        type="radio"  
                                        name="customSize"
                                        value="L"
                                        id="sizeL"
                                        >
                                    <label class="form-check-label" for="sizeL">
                                        L
                                    </label>
                                </div> 
                            </li>
                            <li class="select_customSize_list">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input sizeWise customerselectedSize" 
                                        type="radio" 
                                        name="customSize"
                                        value="S"
                                        id="sizeS" 
                                        >
                                    <label class="form-check-label" >
                                        S
                                    </label>
                                </div> 
                            </li>
                            <li class="select_customSize_list">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input sizeWise customerselectedSize" 
                                        type="radio" 
                                        name="customSize"
                                        value="XS"
                                        id="sizeXS"  
                                        >
                                    <label class="form-check-label" for="sizeXS" >
                                        XS
                                    </label>
                                </div> 
                            </li>
                            <li class="select_customSize_list">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input sizeWise customerselectedSize"
                                        type="radio" 
                                        name="customSize"
                                        value="2XL"
                                        id="size2XL"  
                                        >
                                    <label class="form-check-label" for="size2XL">
                                        2XL
                                    </label>
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="sizeContainer">
                         <div class="productTitle selectedSize mb-2 mt-2">XS</div>
                         <div class="reviews_div d-flex justify-content-center flex-wrap">
                            <span class="product_mrp_">MRP: <span>₹3499</span></span>
                            <span class="current_mrp">₹2274</span>
                            <span class="price_off">35% Off</span>
                        </div> 
                    </div>

                </div>
                <!--product size and colors end -->

                <!--product colors element start -->

                <!--product colors element end-->  

                <div class="actionSection"> 
                    <div class="actionSection_1">
                        <button type="button" class="wishlist_button_text" onclick="addToWishList({{ $product->id }})">
                            <span><i class="ri-heart-line"></i></span>
                        </button>
                        <button type="button" class="preview_button">Preview Size</button>
                    </div>  
                </div>
                
                <div class="detail_and_addToCart hiddenCartElement">
                        <a href="{{ $product_url }}" class="view_detail_2">
                            <button class="" type="button">
                                View Details
                            </button> 
                        </a>
                        <button type="button" class="addToCart_button" onclick="showAddToCartModal({{ $product->id }})">
                            <span>Add to Cart</span>
                        </button>
                </div> 


        </div>
    </div> 
</div>
