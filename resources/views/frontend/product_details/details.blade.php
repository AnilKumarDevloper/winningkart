<div class="text-left h-100  d-flex flex-column justify-content-between ">
    <div class="productallDetails">
    <!-- Product Name -->
    <div class="singleproductTitle mb-2">
        <h1>{{ $detailedProduct->getTranslation('name') }}</h1>
    </div>
    
    {{-- 
        Commented By DeveloperAK
    <div class="row align-items-center mb-3"> 
        <!-- Estimate Shipping Time --> 
        <!-- Commented By DeveloperAK
        @if ($detailedProduct->est_shipping_days)
            <div class="col-auto fs-14 mt-1">
                <small class="mr-1 opacity-50 fs-14">{{ translate('Estimate Shipping Time') }}:</small>
                <span class="fw-500">{{ $detailedProduct->est_shipping_days }} {{ translate('Days') }}</span>
            </div>
        @endif -->

        <!-- In stock -->
        <!-- Commented By DeveloperAK (if digital is set 1 in product table)
        @if ($detailedProduct->digital == 1)
            <div class="col-12 mt-1">
                <span class="badge badge-md badge-inline badge-pill badge-success">{{ translate('In stock') }}</span>
            </div>
        @endif -->
    </div> --}}

    {{-- Commented By DeveloperAK 
        <div class="row align-items-center">
        <!-- Ask about this product - Commented by DeveloperAK  -->
        <!-- @if(get_setting('product_query_activation') == 1)
            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 mb-3">
                <a href="javascript:void();" onclick="goToView('product_query')" class="text-primary fs-14 fw-600 d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
                        <g id="Group_25571" data-name="Group 25571" transform="translate(-975 -411)">
                            <g id="Path_32843" data-name="Path 32843" transform="translate(975 411)" fill="#fff">
                                <path
                                    d="M 16 31 C 11.9933500289917 31 8.226519584655762 29.43972969055176 5.393400192260742 26.60659980773926 C 2.560270071029663 23.77347946166992 1 20.00665092468262 1 16 C 1 11.9933500289917 2.560270071029663 8.226519584655762 5.393400192260742 5.393400192260742 C 8.226519584655762 2.560270071029663 11.9933500289917 1 16 1 C 20.00665092468262 1 23.77347946166992 2.560270071029663 26.60659980773926 5.393400192260742 C 29.43972969055176 8.226519584655762 31 11.9933500289917 31 16 C 31 20.00665092468262 29.43972969055176 23.77347946166992 26.60659980773926 26.60659980773926 C 23.77347946166992 29.43972969055176 20.00665092468262 31 16 31 Z"
                                    stroke="none" />
                                <path
                                    d="M 16 2 C 12.26045989990234 2 8.744749069213867 3.456249237060547 6.100500106811523 6.100500106811523 C 3.456249237060547 8.744749069213867 2 12.26045989990234 2 16 C 2 19.73954010009766 3.456249237060547 23.2552490234375 6.100500106811523 25.89949989318848 C 8.744749069213867 28.54375076293945 12.26045989990234 30 16 30 C 19.73954010009766 30 23.2552490234375 28.54375076293945 25.89949989318848 25.89949989318848 C 28.54375076293945 23.2552490234375 30 19.73954010009766 30 16 C 30 12.26045989990234 28.54375076293945 8.744749069213867 25.89949989318848 6.100500106811523 C 23.2552490234375 3.456249237060547 19.73954010009766 2 16 2 M 16 0 C 24.8365592956543 0 32 7.163440704345703 32 16 C 32 24.8365592956543 24.8365592956543 32 16 32 C 7.163440704345703 32 0 24.8365592956543 0 16 C 0 7.163440704345703 7.163440704345703 0 16 0 Z"
                                    stroke="none" fill="{{ get_setting('secondary_base_color', '#ffc519') }}" />
                            </g>
                            <path id="Path_32842" data-name="Path 32842"
                                d="M28.738,30.935a1.185,1.185,0,0,1-1.185-1.185,3.964,3.964,0,0,1,.942-2.613c.089-.095.213-.207.361-.344.735-.658,2.252-2.032,2.252-3.555a2.228,2.228,0,0,0-2.37-2.37,2.228,2.228,0,0,0-2.37,2.37,1.185,1.185,0,1,1-2.37,0,4.592,4.592,0,0,1,4.74-4.74,4.592,4.592,0,0,1,4.74,4.74c0,2.577-2.044,4.432-3.028,5.333l-.284.255a1.89,1.89,0,0,0-.243.948A1.185,1.185,0,0,1,28.738,30.935Zm0,3.561a1.185,1.185,0,0,1-.835-2.026,1.226,1.226,0,0,1,1.671,0,1.061,1.061,0,0,1,.148.184,1.345,1.345,0,0,1,.113.2,1.41,1.41,0,0,1,.065.225,1.138,1.138,0,0,1,0,.462,1.338,1.338,0,0,1-.065.219,1.185,1.185,0,0,1-.113.207,1.06,1.06,0,0,1-.148.184A1.185,1.185,0,0,1,28.738,34.5Z"
                                transform="translate(962.004 400.504)" fill="{{ get_setting('secondary_base_color', '#ffc519') }}" />
                        </g>
                    </svg>
                    <span class="ml-2 text-primary animate-underline-blue">{{ translate('Product Inquiry') }}</span>
                </a>
            </div>
        @endif -->
        <div class="col mb-3">
            <!-- @if ($detailedProduct->auction_product != 1)  Commented By DeveloperAK (we have removed auction system permanently form this project)-->
                <div class="d-flex">
                    <!-- Add to wishlist button -->
                    <!-- Commented By DeveloperAK
                     <a href="javascript:void(0)" onclick="addToWishList({{ $detailedProduct->id }})"
                        class="mr-3 fs-14 text-dark opacity-60 has-transitiuon hov-opacity-100">
                        <i class="la la-heart-o mr-1"></i>
                        {{ translate('Add to Wishlist') }}
                    </a> -->
                    <!-- Add to compare button -->
                    <!-- Commented By DeveloperAK
                     <a href="javascript:void(0)" onclick="addToCompare({{ $detailedProduct->id }})"
                        class="fs-14 text-dark opacity-60 has-transitiuon hov-opacity-100">
                        <i class="las la-sync mr-1"></i>
                        {{ translate('Add to Compare') }}
                    </a> -->
                </div>
            <!-- @endif  Commented By DeveloperAK (we have removed auction system permanently form this project)-->
        </div>
    </div> --}}

     <!-- Review -->
        @if ($detailedProduct->auction_product != 1)
        <div class="row no-gutters mb-3">
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
                                <p>{{ $total }} out of 5 stars</p>
                            </div>
                            <div class="d-flex align-items-center progress-container">
                                <span>5<i class="ri-star-s-fill"></i></span>
                                <div class="progress progressBar w-100"> 
                                    <div class="progress-bar progressbars" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                                 <span> 50</span>
                            </div>

                            <div class="d-flex align-items-center progress-container">
                                <span>4<i class="ri-star-s-fill"></i></span>
                                <div class="progress progressBar w-100"> 
                                    <div class="progress-bar progressbars" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                 </div>
                                 <span> 50</span>
                            </div>
                           
                            <div class="d-flex align-items-center progress-container">
                                <span>3<i class="ri-star-s-fill"></i></span>
                                <div class="progress progressBar w-100">
                                    <div class="progress-bar progressbars" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span> 40</span>
                            </div>

                            <div class="d-flex align-items-center progress-container">
                                <span>2<i class="ri-star-s-fill"></i></span>
                                <div class="progress progressBar w-100">
                                    <div class="progress-bar progressbars" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span> 30</span>
                            </div>

                            <div class="d-flex align-items-center progress-container">
                                <span>1<i class="ri-star-s-fill"></i></span>
                                <div class="progress progressBar w-100">
                                    <div class="progress-bar progressbars" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span> 20</span>
                            </div>
                        </div>
                     </div>
                </span>  

                <span class="ml-1 opacity-50 fs-14">{{ $detailedProduct->rating }}/5</span>
                <span class="ml-1 opacity-50 fs-14">|</span>
                <span class="ml-1 opacity-50 fs-14">{{ $total }}
                    {{ translate('rating') }}</span>
                <span class="ml-1 opacity-50 fs-14">&</span> 
                    <span class="ml-1 opacity-50 fs-14">{{ $total }}
                    {{ translate('review') }}</span>
            </div> 
        </div>
        @endif

    <!-- Brand Logo & Name -->
    <!-- Commented By DeveloperAK (brand name and logo is not visible in naykaa thats why removed from here)
    @if ($detailedProduct->brand != null)
        <div class="d-flex flex-wrap align-items-center mb-3">
            <span class="text-secondary fs-14 fw-400 mr-4 w-50px">{{ translate('Brand') }}</span><br>
            <a href="{{ route('products.brand', $detailedProduct->brand->slug) }}"
                class="text-reset hov-text-primary fs-14 fw-700">{{ $detailedProduct->brand->name }}</a>
        </div>
    @endif -->

    <!-- Seller Info  if product is added by seller then this section is visible with seller shop name -->
    <div class="d-flex flex-wrap align-items-center">
        <div class="d-flex align-items-center mr-4">
            <!-- Shop Name -->
            @if ($detailedProduct->added_by == 'seller' && get_setting('vendor_system_activation') == 1)
                <span class="text-secondary fs-14 fw-400 mr-4 w-50px">{{ translate('Sold by') }}</span>
                <a href="{{ route('shop.visit', $detailedProduct->user->shop->slug) }}"
                    class="text-reset hov-text-primary fs-14 fw-700">{{ $detailedProduct->user->shop->name }}</a>
            {{-- Commented By DeveloperAK
                    @else
                <p class="mb-0 fs-14 fw-700">{{ translate('Inhouse product') }}</p> --}}
            @endif
        </div>
        <!-- Messase to seller Comment by DeveloperAK-->
        <!-- @if (get_setting('conversation_system') == 1)
            <div class="">
                <button class="btn btn-sm btn-soft-secondary-base btn-outline-secondary-base hov-svg-white hov-text-white rounded-4"
                    onclick="show_chat_modal()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                        class="mr-2 has-transition">
                        <g id="Group_23918" data-name="Group 23918" transform="translate(1053.151 256.688)">
                            <path id="Path_3012" data-name="Path 3012"
                                d="M134.849,88.312h-8a2,2,0,0,0-2,2v5a2,2,0,0,0,2,2v3l2.4-3h5.6a2,2,0,0,0,2-2v-5a2,2,0,0,0-2-2m1,7a1,1,0,0,1-1,1h-8a1,1,0,0,1-1-1v-5a1,1,0,0,1,1-1h8a1,1,0,0,1,1,1Z"
                                transform="translate(-1178 -341)" fill="{{ get_setting('secondary_base_color', '#ffc519') }}" />
                            <path id="Path_3013" data-name="Path 3013"
                                d="M134.849,81.312h8a1,1,0,0,1,1,1v5a1,1,0,0,1-1,1h-.5a.5.5,0,0,0,0,1h.5a2,2,0,0,0,2-2v-5a2,2,0,0,0-2-2h-8a2,2,0,0,0-2,2v.5a.5.5,0,0,0,1,0v-.5a1,1,0,0,1,1-1"
                                transform="translate(-1182 -337)" fill="{{ get_setting('secondary_base_color', '#ffc519') }}" />
                            <path id="Path_3014" data-name="Path 3014"
                                d="M131.349,93.312h5a.5.5,0,0,1,0,1h-5a.5.5,0,0,1,0-1"
                                transform="translate(-1181 -343.5)" fill="{{ get_setting('secondary_base_color', '#ffc519') }}" />
                            <path id="Path_3015" data-name="Path 3015"
                                d="M131.349,99.312h5a.5.5,0,1,1,0,1h-5a.5.5,0,1,1,0-1"
                                transform="translate(-1181 -346.5)" fill="{{ get_setting('secondary_base_color', '#ffc519') }}" />
                        </g>
                    </svg> 
                    {{ translate('Message Seller') }}
                </button>
            </div>
        @endif -->

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

    @if ($detailedProduct->wholesale_product == 1)
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
    @if (home_price($detailedProduct) != home_discounted_price($detailedProduct))
        <div class="row no-gutters mb-3">
            <!-- <div class="col-sm-1">
                <div class="text-secondary fs-14 fw-400">{{ translate('MRP') }}:</div>
            </div> -->
            <div class="col-sm-10">
                <div class="align-items-center">
                    <span class="opacity-70 fs-16 mr-2 fw-500">{{ translate('MRP') }}: </span>
                    <del class="opacity-70 fs-16 mr-2">
                        {{ home_price($detailedProduct) }}
                    </del>
                 
                    <!-- Home Price -->
                 
                    <!-- Discount Price -->
                    <strong class="fs-20 fw-700">
                        {{ home_discounted_price($detailedProduct) }}
                    </strong>
                    
                    <!-- Unit -->
                    <!-- Commented By DeveloperAK
                     @if ($detailedProduct->unit != null)
                        <span class="opacity-70 ml-1">/{{ $detailedProduct->getTranslation('unit') }}</span>
                    @endif -->
                    <!-- Discount percentage -->
                    @if(discount_in_percentage($detailedProduct) > 0)
                        <span class="ml-2 fs-16 fw-700 text-center p-1"
                            style="padding-top:2px;padding-bottom:2px; color:green;">{{ discount_in_percentage($detailedProduct) }}% OFF</span>
                    @endif  

                    <p class="fs-16 fw-400 opacity-60">exclusive of all taxes</p> 
                    <!-- Club Point -->
                    <!-- Commented By DeveloperAK
                    @if (addon_is_activated('club_point') && $detailedProduct->earn_point > 0)
                        <div class="ml-2 bg-secondary-base d-flex justify-content-center align-items-center px-3 py-1"
                                    style="width: fit-content;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        viewBox="0 0 12 12">
                                        <g id="Group_23922" data-name="Group 23922" transform="translate(-973 -633)">
                                            <circle id="Ellipse_39" data-name="Ellipse 39" cx="6"
                                                cy="6" r="6" transform="translate(973 633)"
                                                fill="#fff" />
                                            <g id="Group_23920" data-name="Group 23920"
                                                transform="translate(973 633)">
                                                <path id="Path_28698" data-name="Path 28698"
                                                    d="M7.667,3H4.333L3,5,6,9,9,5Z" transform="translate(0 0)"
                                                    fill="#f3af3d" />
                                                <path id="Path_28699" data-name="Path 28699"
                                                    d="M5.33,3h-1L3,5,6,9,4.331,5Z" transform="translate(0 0)"
                                                    fill="#f3af3d" opacity="0.5" />
                                                <path id="Path_28700" data-name="Path 28700"
                                                    d="M12.666,3h1L15,5,12,9l1.664-4Z" transform="translate(-5.995 0)"
                                                    fill="#f3af3d" />
                                            </g>
                                        </g>
                                    </svg>
                                    <small class="fs-11 fw-500 text-white ml-2">{{ translate('Club Point') }}:
                                        {{ $detailedProduct->earn_point }}</small>
                        </div>
                    @endif -->
                </div>
            </div>
        </div>
    @else

    <div class="row no-gutters mb-3">
        <!-- <div class="col-sm-2">
        <span class="opacity-70 fs-16 mr-2 fw-500">{{ translate('MRP') }}: </span>
        </div> -->
        <div class="col-sm-10">
        <div class="align-items-center">
              <!-- Discount Price -->
        <span class="opacity-70 fs-16 mr-2 fw-500">{{ translate('MRP') }}: </span>
        <strong class="fs-20 fw-700">
                    {{ home_discounted_price($detailedProduct) }}
                </strong>
                <p class="fs-16 fw-400 opacity-60">exclusive of all taxes</p>
        </div>
    
    </div> 
                
                <!-- Unit -->
                <!-- Commented By DeveloperAK
                @if ($detailedProduct->unit != null)
                    <span class="opacity-70">/{{ $detailedProduct->getTranslation('unit') }}</span>
                @endif -->

                <!-- Club Point -->
                <!-- Commented By DeveloperAK
                @if (addon_is_activated('club_point') && $detailedProduct->earn_point > 0)
                    <div class="ml-2 bg-secondary-base d-flex justify-content-center align-items-center px-3 py-1"
                        style="width: fit-content;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                            viewBox="0 0 12 12">
                            <g id="Group_23922" data-name="Group 23922" transform="translate(-973 -633)">
                                <circle id="Ellipse_39" data-name="Ellipse 39" cx="6"
                                    cy="6" r="6" transform="translate(973 633)"
                                    fill="#fff" />
                                <g id="Group_23920" data-name="Group 23920"
                                    transform="translate(973 633)">
                                    <path id="Path_28698" data-name="Path 28698"
                                        d="M7.667,3H4.333L3,5,6,9,9,5Z" transform="translate(0 0)"
                                        fill="#f3af3d" />
                                    <path id="Path_28699" data-name="Path 28699"
                                        d="M5.33,3h-1L3,5,6,9,4.331,5Z" transform="translate(0 0)"
                                        fill="#f3af3d" opacity="0.5" />
                                    <path id="Path_28700" data-name="Path 28700"
                                        d="M12.666,3h1L15,5,12,9l1.664-4Z" transform="translate(-5.995 0)"
                                        fill="#f3af3d" />
                                </g>
                            </g>
                        </svg>
                        <small class="fs-11 fw-500 text-white ml-2">{{ translate('Club Point') }}:
                            {{ $detailedProduct->earn_point }}</small>
                    </div>
                @endif -->

            
    </div>
    @endif
    @endif
 
  
        <form id="option-choice-form">
            @csrf
            <input type="hidden" name="id" value="{{ $detailedProduct->id }}">

            @if ($detailedProduct->digital == 0)
                <!-- Choice Options -->
                <!-- <div class="c0l-12 mt-3">
                    <div class="size">
                        <ul class="itemSize selectSize">
                            <li class="itemSizeList active">M</li>
                            <li class="itemSizeList">L</li>
                            <li class="itemSizeList">XL</li>
                            <li class="itemSizeList 4">S</li>
                            <li class="itemSizeList">2XL</li>
                            <li class="itemSizeList">XS</li>
                        </ul>
                            </div>
                </div> -->
                @if ($detailedProduct->choice_options != null)
                    @foreach (json_decode($detailedProduct->choice_options) as $key => $choice)
                        <div class="row no-gutters mb-3">
                            <!-- <div class="col-sm-2">
                                <div class="text-secondary fs-14 fw-400 mt-2 ">
                                    {{ get_single_attribute_name($choice->attribute_id) }}
                                </div>
                            </div> -->
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
                @if ($detailedProduct->colors != null && count(json_decode($detailedProduct->colors)) > 0)
                    <div class="row no-gutters mb-3">
                        <!-- <div class="col-2">
                            <div class="text-secondary fs-14 fw-400 mt-2">{{ translate('Color') }}</div> 
                        </div> -->
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                 <select class="selectColor12">
                                    <option>Selected item</option>
                                    <option>Selected item 1</option>
                                    <option>Selected item 2</option>
                                    <option>Selected item 3</option>
                                    <option>Selected item 4</option>
                                 </select>
                                 <div>
                                        <button class="buttonsElement">All Shades (4)</button>
                                 </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex" style="gap:15px">
                            <div class="selectedcolor" style="background:;" ></div>
                            <div class="w-100 p-3" style="border: 1px solid rgba(111, 121, 129, 0.22);">
                                <div class="aiz-radio-inline"> 
                                    @foreach (json_decode($detailedProduct->colors) as $key => $color)
                                        <label class="aiz-megabox pl-0 mr-2 mb-0" data-toggle="tooltip"
                                            data-title="{{ get_single_color_name($color) }}">
                                            <input type="radio" name="color"
                                                value="{{ get_single_color_name($color) }}"
                                                @if ($key == 0) checked @endif>
                                             <span class="aiz-megabox-elem rounded-0 d-flex align-items-center justify-content-center coloractive" style="border: none;">
                                                <span class="size-25px d-inline-block rounded thiscolor" data-label="{{ $color }}"
                                                    style="background: {{ $color }};"></span>
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
                    <!--  Commented By DeveloperAK
                <div class="col-sm-2">
                        <div class="text-secondary fs-14 fw-400 mt-2">{{ translate('Quantity') }}</div>
                    </div> -->
                    <div class="col-sm-10">
                        <div class="product-quantity d-flex align-items-center">
                            <!-- Commented By DeveloperAK
                                <div class="row no-gutters align-items-center aiz-plus-minus mr-3" style="width: 130px;">
                                        Commented By DeveloperAK
                                        <button class="btn col-auto btn-icon btn-sm btn-light rounded-0" type="button"
                                            data-type="minus" data-field="quantity" disabled="">
                                            <i class="las la-minus"></i>
                                        </button>  
                                        <input type="hidden" name="quantity"
                                            class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1"
                                            value="{{ $detailedProduct->min_qty }}" min="{{ $detailedProduct->min_qty }}"
                                            max="10" lang="en">
                                        Commented By DeveloperAK
                                            <button class="btn col-auto btn-icon btn-sm btn-light rounded-0" type="button"
                                                data-type="plus" data-field="quantity">
                                                <i class="las la-plus"></i>
                                            </button>  
                                    </div> -->

                            <input type="hidden" name="quantity"
                                    class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1"
                                    value="{{ $detailedProduct->min_qty }}" min="{{ $detailedProduct->min_qty }}"
                                    max="10" lang="en">
                            @php
                                $qty = 0;
                                foreach ($detailedProduct->stocks as $key => $stock) {
                                    $qty += $stock->qty;
                                }
                            @endphp
                            
                             <div class="avialable-amount opacity-60">
                                @if ($detailedProduct->stock_visibility_state == 'quantity')
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

            <!-- Total Price -->
            <!--  Commented By DeveloperAK
            <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                <div class="col-sm-2">
                    <div class="text-secondary fs-14 fw-400 mt-1">{{ translate('Total Price') }}</div>
                </div>
                <div class="col-sm-10">
                    <div class="product-price">
                        <strong id="chosen_price" class="fs-20 fw-700 text-primary">

                        </strong>
                    </div>
                </div>
            </div> -->

        </form>
    
        <!-- Add to cart & Buy now Buttons -->
        <div class="mt-3">
            @if ($detailedProduct->digital == 0)
                @if ($detailedProduct->external_link != null)
                    <a type="button" class="btn btn-primary buy-now fw-600 add-to-cart px-4 rounded-0"
                        href="{{ $detailedProduct->external_link }}">
                        <i class="la la-share"></i> {{ translate($detailedProduct->external_link_btn) }}
                    </a>
                @else
                <div class="row">
            <div class="col-sm-5 d-flex justify-content-center align-items-center">
                <button type="button"
                  class="AddToCart add-to-cart"
                  @if (Auth::check() || get_Setting('guest_checkout_activation') == 1) onclick="addToCart()" @else onclick="showLoginModal()" @endif
                  >Add To Cart</button>
                  <button type="button" class="btn btn-secondary out-of-stock fw-600 d-none" disabled>
                    <i class="la la-cart-arrow-down"></i> {{ translate('Out of Stock') }}
                </button>
            </div> 

            <div class="col-sm-7" style="border-left: 1px solid rgb(111 121 129 / 22%);">
                 <div class="delivery-container">
                        <div id="deliveryPincode" style="display: nne;">
                            <div class="areaDetails pincodeDetails textsizeisSame">
                                <span style="margin-right: 0.25rem;"><i class="ri-map-pin-line"></i></span>
                                <span>
                                     Delivery options for
                                    <span style="color:#f60;" id="userPincode"></span>
                                </span>
                                <button class="changepincode" id="changepincode">Change</button>
                            </div>

                            <div class="shipping-2">
                                <div class="mtmb2" id="notShipping_pincode">
                                    <span class="textsizeisSame d-flex align-items-center">
                                        <span class="text-danger" style="font-size: 16px;"><b>
                                            <i class="ri-close-fill"></i></b></span>
                                             Does not ship to pincode
                                    </span>
                                </div>

                                <div class="mtmb2" id="Shipping_thisPincode">
                                    <div class="textsizeisSame">
                                       <span class="text-success" style="font-size: 16px;"><b><i class="ri-check-line"></i></b></span>
                                        Shipping to: <span id="placeName"> </span>
                                     </div>
                                    <div class="textsizeisSame">
                                        <span class="text-success" style="font-size: 16px;"><b><i class="ri-check-line"></i></b></span>
                                        Delivery by: <span>Sun, 23 Mar</span>
                                     </div>
                                    <div class="textsizeisSame">
                                        <span class="text-success" style="font-size: 16px;"><b><i class="ri-check-line"></i></b></span>
                                        Free delivery above <span>₹299</span>
                                     </div>
                                    <div class="textsizeisSame">
                                       <span class="text-success" style="font-size: 16px;"><b><i class="ri-check-line"></i></b></span>
                                        COD available 
                                    </div> 
                                </div>
                            </div>

                            <div class="textsizeisSame tooltiptext">
                                <span class="textsizeisSame d-flex align-items-center">
                                    <span 
                                          style="font-size: 19px; margin-right: 3px; cursor: pointer;"
                                          data-toggle="tooltip" title="Some tooltip text!">
                                           <i class="ri-information-line"></i>
                                     </span> Moro info</span> 
                                    <div class="tooltip bs-tooltip-top" role="tooltip">
                                        <div class="arrow"></div>
                                        <div class="tooltip-inner bgwhite" >
                                            Some tooltip text!
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="inputPincode" id="pincode_element"> 
                                <div>
                                    <span class="d-2002"><i class="ri-map-pin-line"></i> Delivery Options</span>
                                </div>

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

        <!-- Commented By DeveloperAK
        <button type="button"
            class="btn btn-primary mb-3 mb-sm-0 btn-block rounded-0"
            @if (Auth::check() || get_Setting('guest_checkout_activation') == 1) onclick="addToCart()" @else onclick="showLoginModal()" @endif>
            <i class="las la-shopping-bag"></i> {{ translate('Add to cart') }}
        </button> -->
        <!-- Commented By DeveloperAK
         <button type="button" class="btn btn-primary mb-3 mb-sm-0 btn-block rounded-0"
            @if (Auth::check() || get_Setting('guest_checkout_activation') == 1) onclick="addToCart()" @else onclick="showLoginModal()" @endif>
            <i class="la la-shopping-cart"></i> {{ translate('Buy Now') }}
        </button> -->
        @endif
        
                <!-- 
                Commented By DeveloperAK (if digital product is 1 the show this)
                 @elseif ($detailedProduct->digital == 1)
                <button type="button"
                    class="btn btn-secondary-base mr-2 add-to-cart fw-600 min-w-150px rounded-0 text-white"
                    @if (Auth::check() || get_Setting('guest_checkout_activation') == 1) onclick="addToCart()" @else onclick="showLoginModal()" @endif>
                    <i class="las la-shopping-bag"></i> {{ translate('Add to cart') }}
                </button>
                <button type="button" class="btn btn-primary buy-now fw-600 add-to-cart min-w-150px rounded-0"
                    @if (Auth::check() || get_Setting('guest_checkout_activation') == 1) onclick="addToCart()" @else onclick="showLoginModal()" @endif>
                    <i class="la la-shopping-cart"></i> {{ translate('Buy Now') }}
                </button>
                 -->
            @endif
        </div>
        <!-- Promote Link -->
        <!--  Commented By DeveloperAK
        <div class="d-table width-100 mt-3">
            <div class="d-table-cell">
                @if (Auth::check() &&
                        addon_is_activated('affiliate_system') &&
                        get_affliate_option_status() &&
                        Auth::user()->affiliate_user != null &&
                        Auth::user()->affiliate_user->status)
                    @php
                        if (Auth::check()) {
                            if (Auth::user()->referral_code == null) {
                                Auth::user()->referral_code = substr(Auth::user()->id . Str::random(10), 0, 10);
                                Auth::user()->save();
                            }
                            $referral_code = Auth::user()->referral_code;
                            $referral_code_url = URL::to('/product') . '/' . $detailedProduct->slug . "?product_referral_code=$referral_code";
                        }
                    @endphp
                    <div>
                        <button type="button" id="ref-cpurl-btn" class="btn btn-secondary w-200px rounded-0"
                            data-attrcpy="{{ translate('Copied') }}" onclick="CopyToClipboard(this)"
                            data-url="{{ $referral_code_url }}">{{ translate('Copy the Promote Link') }}</button>
                    </div>
                @endif
            </div>
        </div> -->

        <!-- Refund -->
        <!--  Commented By DeveloperAK
        @php
            $refund_sticker = get_setting('refund_sticker');
        @endphp
        @if (addon_is_activated('refund_request'))
            <div class="row no-gutters mt-3">
                <div class="col-sm-2">
                    <div class="text-secondary fs-14 fw-400 mt-2">{{ translate('Refund') }}</div>
                </div>
                <div class="col-sm-10">
                    @if ($detailedProduct->refundable == 0)
                        <a href="{{ route('returnpolicy') }}" target="_blank">
                            @if ($refund_sticker != null)
                                <img src="{{ uploaded_asset($refund_sticker) }}" height="36">
                            @else
                                <img src="{{ static_asset('assets/img/refund-sticker.jpg') }}" height="36">
                            @endif
                        </a>
                        <a href="{{ route('returnpolicy') }}" class="text-blue hov-text-primary fs-14 ml-3"
                            target="_blank">{{ translate('View Policy') }}</a>
                    @else
                        <div class="text-dark fs-14 fw-400 mt-2">{{ translate('Not Applicable') }}</div>
                    @endif
                </div>
            </div>
        @endif -->

        <!-- Seller Guarantees -->
        <!--  Commented By DeveloperAK
        @if ($detailedProduct->digital == 1)
            @if ($detailedProduct->added_by == 'seller')
                <div class="row no-gutters mt-3">
                    <div class="col-2">
                        <div class="text-secondary fs-14 fw-400">{{ translate('Seller Guarantees') }}</div>
                    </div>
                    <div class="col-10">
                        @if ($detailedProduct->user->shop->verification_status == 1)
                            <span class="text-success fs-14 fw-700">{{ translate('Verified seller') }}</span>
                        @else
                            <span class="text-danger fs-14 fw-700">{{ translate('Non verified seller') }}</span>
                        @endif
                    </div>
                </div>
            @endif
        @endif -->
    
    <!-- Share -->
    <!-- Commentedn By DeveloperAK
    <div class="row no-gutters mt-4">
        <div class="col-sm-2">
            <div class="text-secondary fs-14 fw-400 mt-2">{{ translate('Share') }}</div>
        </div>
        <div class="col-sm-10">
            <div class="aiz-share"></div>
        </div>
    </div> -->


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
                <div class="GenuineProducts">
                     100% Authentic, directly purchased from Kay Beauty.
                </div> 
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
                 <div>
                    <span class="genuineProducts">Sold by: Winningkart</span>
                 </div>
            </div>

        </div>
    </div>
</div>

</div>