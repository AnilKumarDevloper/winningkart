<div class="text-left h-100 heightProducts d-flex flex-column justify-content-between ">
    <div class="productallDetails">
    <div class="singleproductTitle mb-2">
        <h1>{{ $detailedProduct->getTranslation('name') }}</h1>
    </div>
     
    <!-- Review -->
    @if ($detailedProduct->auction_product != 1)
        <div class="row no-gutters mb-3 ">
            <div class="col-12 relevents">
                @php
                    $total = 0;
                    $total += $detailedProduct->reviews->count();
                @endphp
                <span class="rating rating-mr-1">
                    {{ renderStarRating($detailedProduct->rating) }} 
                     <div class="ratinghoverBox">
                        <div> 
                            <div class="reviewRatings">
                                <p>Rating(s)</p>
                                <p>{{ $detailedProduct->rating }} out of 5 stars</p>
                            </div>
                            <div class="d-flex align-items-center progress-container">
                                <span class="d-flex">5<i class="las la-star active"></i></span>
                                <div class="progress progressBar w-100"> 
                                    <div class="progress-bar progressbars" role="progressbar {{ $total }}" style="width: {{$total > 0 ? ($five_star/$total)*100 : 0}}%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="0"></div>
                                </div>
                                <span> {{ $five_star }}</span>
                            </div>
                            <div class="d-flex align-items-center progress-container">
                                <span class="d-flex">4<i class="las la-star active"></i></span>
                                <div class="progress progressBar w-100"> 
                                    <div class="progress-bar progressbars" role="progressbar" style="width: {{ $total > 0 ? ($four_star/$total)*100 : 0}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                                 <span> {{ $four_star }}</span>
                            </div>
                            <div class="d-flex align-items-center progress-container">
                                <span class="d-flex">3<i class="las la-star active"></i></span>
                                <div class="progress progressBar w-100">
                                    <div class="progress-bar progressbars" role="progressbar" style="width: {{ $total > 0 ? ($three_star/$total)*100 : 0}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span> {{ $three_star }}</span>
                            </div>
                            <div class="d-flex align-items-center progress-container">
                                <span class="d-flex">2<i class="las la-star active"></i></span>
                                <div class="progress progressBar w-100">
                                    <div class="progress-bar progressbars" role="progressbar" style="width: {{ $total > 0 ? ($two_star/$total)*100 : 0}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span> {{ $two_star }}</span>
                            </div>
                            <div class="d-flex align-items-center progress-container">
                                <span class="d-flex">1<i class="las la-star active"></i></span>
                                <div class="progress progressBar w-100">
                                    <div class="progress-bar progressbars" role="progressbar" style="width: {{ $total > 0 ? ($one_star/$total)*100 : 0}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span> {{ $one_star }}</span>
                            </div>
                        </div>
                     </div>
                </span> 
                <span class="ml-1 opacity-50 fs-14">{{ $detailedProduct->rating }}/5</span>
                <span class="ml-1 opacity-50 fs-14">|</span>
                <span class="ml-1 opacity-50 fs-14">{{ $total }} {{ translate('rating') }}</span>
                <span class="ml-1 opacity-50 fs-14">&</span> 
                <span class="ml-1 opacity-50 fs-14">{{ $total }} {{ translate('review') }}</span>
            </div> 
        </div>
    @endif
 
    <!-- Seller Info  if product is added by seller then this section is visible with seller shop name -->
    <div class="d-flex flex-wrap align-items-center">
        <div class="d-flex align-items-center mr-4">
            <!-- Shop Name -->
            @if ($detailedProduct->added_by == 'seller' && get_setting('vendor_system_activation') == 1)
                <span class="text-secondary fs-14 fw-400 mr-4 w-50px">{{ translate('Sold by') }}</span>
                <a href="{{ route('shop.visit', $detailedProduct->user->shop->slug) }}" class="text-reset hov-text-primary fs-14 fw-700">{{ $detailedProduct->user->shop->name }}</a>
            @endif
        </div>
        <!-- Size guide  -->
        @php
            $sizeChartId = ($detailedProduct->main_category && $detailedProduct->main_category->sizeChart) ? $detailedProduct->main_category->sizeChart->id : 0;
            $sizeChartName = ($detailedProduct->main_category && $detailedProduct->main_category->sizeChart) ? $detailedProduct->main_category->sizeChart->name : null;
        @endphp
         
         

        @if($sizeChartId != 0)
            <div class=" ml-4">
                <a href="javascript:void(1);" onclick='showSizeChartDetail({{ $sizeChartId }}, "{{ $sizeChartName }}")' class="animate-underline-primary">{{ translate('Show size guide') }}</a>
            </div>
        @endif
    </div>
    <!-- <hr> -->
    @if($detailedProduct->wholesale_product == 1)
        <!-- Wholesale -->
        <table class="table mb-3">
            <thead>
                <tr>
                    <th class="border-top-0">{{ translate('Min Qty') }}</th>
                    <th class="border-top-0">{{ translate('Max Qty') }}</th>
                    <th class="border-top-0">{{ translate('Unit Price') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailedProduct->stocks->first()->wholesalePrices as $wholesalePrice)
                    <tr>
                        <td>{{ $wholesalePrice->min_qty }}</td>
                        <td>{{ $wholesalePrice->max_qty }}</td>
                        <td>{{ single_price($wholesalePrice->price) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <!-- Without Wholesale -->
    @if (home_price_new($detailedProduct) != home_discounted_price_new($detailedProduct))
        <div class="row no-gutters mb-lg-3 mb-sm-0">
            <div class="col-sm-10">
                <div class="align-items-center">
                    <span class="opacity-70 fs-16 mr-2 fw-500">{{ translate('MRP') }}: </span>
                    <del class="opacity-70 fs-16 mr-2">{{ home_price_new($detailedProduct) }}</del>
                    <!-- Home Price -->
                    <!-- Discount Price -->
                    <strong class="fs-20 fw-700" id="product_unit_price">{{ home_discounted_price_new($detailedProduct) }}</strong>
                    <!-- Unit -->
                    <!-- Discount percentage -->
                    @if(discount_in_percentage($detailedProduct) > 0)
                        <span class="ml-2 fs-16 fw-700 text-center p-1" style="padding-top:2px;padding-bottom:2px; color:green;">{{ discount_in_percentage($detailedProduct) }}% OFF</span>
                    @endif  
                    <p class="fs-16 fw-400 opacity-60">exclusive of all taxes</p> 
                    <!-- Club Point --> 
                </div>
            </div>
        </div>
    @else
        <div class="row no-gutters mb-3">
            <div class="col-sm-10">
                <div class="align-items-center">
                <!-- Discount Price -->
                    <span class="opacity-70 fs-16 mr-2 fw-500">{{ translate('MRP') }}: </span>
                    <strong class="fs-20 fw-700" id="product_unit_price">{{ home_discounted_price_new($detailedProduct) }}</strong>
                    <p class="fs-16 fw-400 opacity-60">exclusive of all taxes</p>
                </div>
            </div> 
            <!-- Unit --> 
        </div>
    @endif
@endif
    <form id="option-choice-form_{{ $detailedProduct->id }}" class="option-choice-form">
        @csrf
        <input type="hidden" name="id" id="p_id" value="{{ $detailedProduct->id }}">
            @if($detailedProduct->digital == 0)
                <!-- Choice Options -->
                @if($detailedProduct->choice_options != null)
                    @foreach(json_decode($detailedProduct->choice_options) as $key => $choice)
                        <div class="row no-gutters mb-3">
                            <div class="col-sm-10">
                                <div class="aiz-radio-inline">
                                    @foreach ($choice->values as $key => $value)
                                        <label class="aiz-megabox pl-0 mr-2 mb-0">
                                            <input type="radio" name="attribute_id_{{ $choice->attribute_id }}" value="{{ $value }}"
                                                @if ($key == 0) checked @endif>
                                            <span class="aiz-megabox-elem rounded-0 d-flex align-items-center justify-content-center py-1 px-3" style="border-radius:30px !important;">{{ $value }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!-- Color Options -->
                @if($detailedProduct->colors != null && count(json_decode($detailedProduct->colors)) > 0)
                    <div class="row no-gutters mb-3">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                 <select class="selectColor12" name="color" id="color_dropdown">
                                    <option value="">Selected item</option>
                                    @foreach (json_decode($detailedProduct->colors) as $key => $color)
                                    <option value="{{ get_single_color_name($color) }}"  @if ($key == 0) selected @endif>{{ get_single_color_name($color) }}</option> 
                                    @endforeach
                                 </select>
                                 <div><button class="buttonsElement">All Shades ({{ count(json_decode($detailedProduct->colors)) }})</button></div>
                            </div>
                        </div>
                        <div class="col-12 d-flex" style="gap:15px">
                            <div class="selectedcolor" style="background:;" ></div>
                                <div class="w-100 p-3" style="border: 1px solid rgba(111, 121, 129, 0.22);">
                                    <div class="aiz-radio-inline">
                                        @foreach (json_decode($detailedProduct->colors) as $key => $color)
                                            <label class="aiz-megabox pl-0 mr-2 mb-0" data-toggle="tooltip" data-title="{{ get_single_color_name($color) }}">
                                                <input type="radio" name="color" value="{{ get_single_color_name($color) }}"
                                                @if ($key == 0) checked @endif>
                                                <span class="aiz-megabox-elem rounded-0 d-flex align-items-center justify-content-center coloractive" style="border: none;">
                                                    <span class="size-25px d-inline-block rounded thiscolor" data-label="{{ $color }}" data-color-name="{{ get_single_color_name($color) }}" style="background: {{ $color }};"></span>
                                                </span>
                                            </label>
                                    @endforeach
                                </div>
                            </div> 
                        </div>  
                    </div>
                @endif

                <!-- Quantity + Add to cart -->
                <div class="row no-gutters mb-3">
                    <div class="col-sm-10">
                        <div class="product-quantity d-flex align-items-center">
                            <input type="hidden" name="quantity" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="{{ $detailedProduct->min_qty }}" min="{{ $detailedProduct->min_qty }}" max="10" lang="en">
                            @php
                                $qty = 0;
                                    $qty += $detailedProduct->stocks[0]->qty;
                                
                            @endphp
                             <div class="avialable-amount opacity-60">
                                @if($detailedProduct->stock_visibility_state == 'quantity')
                                    (<span id="available-quantity">{{ $qty }}</span>
                                    {{ translate('available') }})
                                @elseif($detailedProduct->stock_visibility_state == 'text' && $qty >= 1)
                                    (<span id="available-quantity">{{ translate('In Stock') }}</span>)
                                @endif
                            </div> 
                        </div>
                    </div>
                </div>
            @else
            <!-- Quantity -->
            <input type="hidden" name="quantity" value="1">
        @endif
            <!-- Total Pric e -->
    </form>
        <!-- Add to cart & Buy now Buttons -->
        <div class="mt-3">
            @if ($detailedProduct->digital == 0)
                @if ($detailedProduct->external_link != null)
                    <a type="button" class="btn btn-primary buy-now fw-600 add-to-cart px-4 rounded-0" href="{{ $detailedProduct->external_link }}">
                        <i class="la la-share"></i> {{ translate($detailedProduct->external_link_btn) }}
                    </a>
                @else
                <div class="row revercerow">
                    <div class="col-sm-5 col-xs-5 d-flex justify-content-center align-items-center margin575">
                
                        <button type="button" class="AddToCart add-to-cart {{ $qty < 1 ? "d-none":""}}" onclick="addToCart({{ $detailedProduct->id }})" >Add To Cart</button>
                
                        <button type="button" class="btn btn-secondary out-of-stock fw-600 {{ $qty > 0 ? "d-none":""}}" disabled><i class="la la-cart-arrow-down"></i> {{ translate('Out of Stock') }}</button>
                
                    </div>  
                    <div class="col-sm-7 col-xs-7" style="border-left: 1px solid rgb(111 121 129 / 22%);">
                        <div class="delivery-container">
                            <div id="deliveryPincode" style="display: nne;">
                                <div class="areaDetails pincodeDetails textsizeisSame">
                                    <span style="margin-right: 0.25rem;"><i class="ri-map-pin-line"></i></span>
                                    <span>Delivery options for <span style="color:#f60;" id="userPincode"></span></span>
                                    <button class="changepincode" id="changepincode">Change</button>
                                </div> 
                                <div class="shipping-2">
                                    <div class="mtmb2" id="notShipping_pincode">
                                        <span class="textsizeisSame d-flex align-items-center">
                                            <span class="text-danger" style="font-size: 16px;"><b><i class="ri-close-fill"></i></b></span>Does not ship to pincode
                                        </span>
                                    </div> 
                                    <div class="mtmb2" id="Shipping_thisPincode">
                                        <div class="textsizeisSame">
                                            <span class="text-success" style="font-size: 16px;"><b><i class="ri-check-line"></i></b></span>Shipping to: <span id="placeName"> </span>
                                        </div>
                                        <div class="textsizeisSame">
                                            <span class="text-success" style="font-size: 16px;"><b><i class="ri-check-line"></i></b></span>Delivery by: <span>Sun, 23 Mar</span>
                                        </div>
                                        <div class="textsizeisSame">
                                            <span class="text-success" style="font-size: 16px;"><b><i class="ri-check-line"></i></b></span>Free delivery above <span>₹299</span>
                                        </div>
                                        <div class="textsizeisSame">
                                            <span class="text-success" style="font-size: 16px;"><b><i class="ri-check-line"></i></b></span>COD available 
                                        </div> 
                                    </div>
                                </div>

                                <div class="textsizeisSame tooltiptext">
                                    <span class="textsizeisSame d-flex align-items-center">
                                        <span  style="font-size: 19px; margin-right: 3px; cursor: pointer;" data-toggle="tooltip" title="Some tooltip text!"><i class="ri-information-line"></i></span> Moro info</span> 
                                        <div class="tooltip bs-tooltip-top" role="tooltip">
                                            <div class="arrow"></div>
                                            <div class="tooltip-inner bgwhite">Some tooltip text!</div>
                                        </div>
                                </div>
                            </div>
                            <div class="inputPincode" id="pincode_element"> 
                                <div><span class="d-2002"><i class="ri-map-pin-line"></i> Delivery Options</span></div>
                                    <form id="delivery_option_pincode">
                                        <div class="areaCheckWith_pincode"> 
                                            <input type="number" placeholder="Enter Pincode" required id="delivery_pincode">
                                            <button id="delivery_option" type="submit">Check</button>
                                        </div>
                                        <p class="text-danger validPincode" id="validPincode" style="display: none;">Please enter valid pincode</p>
                                    </form>  
                                </div>
                            </div>
                        </div>
                    </div> 
                @endif 
            @endif
        </div>
        <!-- Promote Link --> 
    </div>
</div>

<!--- new cart section start --> 
<div class="cartDetails-newAdd d-flex align-items-end w-100">
    <div class="Return_Policy mt-4 w-100">
        <div class="row thisrelative">
            <div class="col-md-4 thisone"> 
                <div class="genuineProducts d-flex gap-2 align-items-center w-100">
                    <span class="h-21h"><i class="ri-text-wrap"></i></span>
                    <span class="genuineProducts" style="display:inline-block">100% Genuine Products</span>
                </div>
                <div class="GenuineProducts">100% Authentic, directly purchased from Kay Beauty.</div> 
            </div>
            <div class="col-sm-4 thisone">
                <div class="genuineProducts d-flex gap-2 align-items-center">
                    <span class="h-21h"><i class="ri-text-wrap"></i></span>
                    <span class="genuineProducts">Return Policy</span>
                </div>
                <div class="GenuineProducts">
                    Returns/replacements are accepted for unused products only in case of defects,
                    damages during delivery, missing, or wrong products delivered. 
                    Return requests can be raised on the 'My Order' section within 15 days of delivery.
                </div>
            </div> 
            <div class="col-md-4">
                <div><span class="genuineProducts">Sold by: Winningkart</span></div>
            </div> 
        </div>
    </div>
</div>
</div>

    <!-- Size chart show Modal -->
    @include('modals.size_chart_show_modal')