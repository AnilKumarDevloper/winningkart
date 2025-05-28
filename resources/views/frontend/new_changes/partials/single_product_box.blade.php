    @php
        $cart_added = [];
        $choiceOptions = json_decode($product->choice_options, true);
    @endphp
     <form id="option-choice-form_{{ $product->id }}" class="option-choice-form">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="hidden" name="quantity" value="1">
        @foreach (json_decode($product->colors) as $key => $color)                                   
            <input type="radio" name="color" value="{{ get_single_color_name($color) }}"
            @if ($key == 0) checked @endif hidden>                                      
        @endforeach
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
                                <img src="{{ get_image($product->thumbnail) }}" alt="{{ $product->getTranslation('name') }}" title="{{ $product->getTranslation('name') }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg'); }}'" class="css-11gn9r6">
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
                                            <span class="current_mrp">{{ single_price($product->starting_bid) }}</span>  
                                        @endif 
                                        @if(discount_in_percentage($product) > 0)
                                            <span class="price_off">{{ discount_in_percentage($product) }}% Off</span> 
                                        @endif
                                    </div>
                                    <div class="row no-gutters mb-3">
                                        <div class="col-12 relevents">
                                            @php
                                                $total = 0;
                                                $total += $product->reviews->count();
                                            @endphp
                                            <span class="rating rating-mr-1">{{ renderStarRating($product->rating) }}  ({{ $total }})</span>
                                        </div>
                                    </div> 
                                </div>
                            </a>
                        </div>
                    </div>  
                    @if(!empty($choiceOptions))
                        @foreach(json_decode($product->choice_options) as $key => $choice)
                        @php
                            $attribute_detail = App\Models\Attribute::where('id', $choice->attribute_id)->first();
                        @endphp
                        <div class="css-size">
                            <div class="css-ijlamg">{{ count($choice->values) }} {{ $attribute_detail->name }}</div>
                        </div>
                        <div class="select_size_color hiddenCartElement"> 
                            <div class="header_select">
                                <span>Select a {{ $attribute_detail->name }} ({{ count($choice->values) }})</span>
                                <button type="button" class="close_selectseciton"><i class="ri-close-large-line"></i></button> 
                            </div> 
                            <div class="select_customSize">
                                <ul class="selectYourSize">
                                @foreach ($choice->values as $key => $value)
                                    <li class="select_customSize_list">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input sizeWise" type="radio" name="attribute_id_{{ $choice->attribute_id }}" value="{{ $value }}" id="{{ $value }}"   @if ($key == 0) checked @endif>
                                            <label class="form-check-label" for="sizeM">{{ $value }}</label>
                                        </div>
                                    </li>
                                    @endforeach 
                                </ul>
                            </div>
                        <div class="sizeContainer">
                            <div class="productTitle selectedSize mb-2 mt-2">{{ $choice->values[0] }}</div>
                            <div class="reviews_div d-flex justify-content-center flex-wrap">
                                @if(home_price_new($product) != home_discounted_price_new($product)) 
                                    <span class="product_mrp_">MRP: <span><del class="opacity-70 fs-16 mr-2">{{ home_price_new($product) }}</del></span></span>
                                    <span class="current_mrp">{{ home_discounted_price_new($product) }}</span>
                                    @if(discount_in_percentage($product) > 0)
                                        <span class="price_off">{{ discount_in_percentage($product) }}% Off</span>
                                    @endif
                                    @else
                                    <span class="product_mrp_">MRP: <span>{{ home_discounted_price_new($product) }}</span></span> 
                                @endif
                            </div> 
                        </div> 
                    </div>
                    @if($key > 0)
                        @break
                    @endif
                @endforeach
                <div class="hover_content variant_preview_btn"> 
                    <div class="actionSection_1">
                        <button type="button" class="wishlist_button_text" onclick="addToWishList({{ $product->id }})">
                            <span><i class="ri-heart-line"></i></span>
                        </button>
                        <button type="button" class="preview_button">Preview Size</button>
                    </div>  
                </div>
                <div class="hover_content variant_add_to_cart_btn" style="display:none;">
                <div class="detail_and_addToCart">
                    <a href="{{ $product_url }}" class="view_detail_2"><button class="" type="button">View Details</button></a>
                    <button type="button" class="addToCart_button" onclick="addToCart({{ $product->id }})"><span>Add to Cart</span></button>
                </div>
                </div>  
                @else
                <div class="hover_content">
                <div class="detail_and_addToCart">
                    <a href="{{ $product_url }}" class="view_detail_2"><button class="" type="button">View Details</button></a>
                    <button type="button" class="addToCart_button" onclick="addToCart({{ $product->id }})"><span>Add to Cart</span></button>
                </div>
                </div>
                @endif    
           </div>
        </div> 
    </div>
</form>

                            