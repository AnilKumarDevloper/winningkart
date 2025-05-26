@extends('frontend.layouts.app')

@if (isset($category_id))
    @php
        $meta_title = $category->meta_title;
        $meta_description = $category->meta_description;
    @endphp
@elseif (isset($brand_id))
    @php
        $meta_title = get_single_brand($brand_id)->meta_title;
        $meta_description = get_single_brand($brand_id)->meta_description;
    @endphp
@else
    @php
        $meta_title         = get_setting('meta_title');
        $meta_description   = get_setting('meta_description');
    @endphp
@endif

@section('meta_title'){{ $meta_title }}@stop
@section('meta_description'){{ $meta_description }}@stop

@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $meta_title }}">
    <meta itemprop="description" content="{{ $meta_description }}">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
@endsection

@section('content')

    <section class="mb-4 pt-4" style="background: rgb(243 243 243);">
        <div class="container sm-px-0 pt-2">
            <form class="" id="search-form" action="" method="GET">
                <div class="row">

                    <!-- Sidebar Filters -->
                    <div class="col-xl-3">
                        <div class="aiz-filter-sidebar collapse-sidebar-wrap sidebar-xl sidebar-right z-1035y" style="display: none;">
                            <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" data-same=".filter-sidebar-thumb"></div>
                            <div class="collapse-sidebar c-scrollbar-light text-left">
                                <div class="d-flex d-xl-none justify-content-between align-items-center pl-3 border-bottom">
                                    <h3 class="h6 mb-0 fw-600">{{ translate('Filters') }}</h3>
                                    <button type="button" class="btn btn-sm p-2 filter-sidebar-thumb" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" >
                                        <i class="las la-times la-2x"></i>
                                    </button>
                                </div>

                                <!-- Categories -->
                                <div class="bg-white border mb-3">

                                    <div class="fs-16 fw-700 p-3">
                                        <a href="#collapse_1" class="dropdown-toggle filter-section text-dark d-flex align-items-center justify-content-between" data-toggle="collapse">
                                            {{ translate('Categories')}}
                                        </a>
                                    </div>

                                    <div class="collapse show" id="collapse_1">
                                        <ul class="p-3 mb-0 list-unstyled">
                                            @if (!isset($category_id))
                                                @foreach ($categories as $category)
                                                    <li class="mb-3 text-dark">
                                                        <a class="text-reset fs-14 hov-text-primary" href="{{ route('products.category', $category->slug) }}">
                                                            {{ $category->getTranslation('name') }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li class="mb-3">
                                                    <a class="text-reset fs-14 fw-600 hov-text-primary" href="{{ route('search') }}">
                                                        <i class="las la-angle-left"></i>
                                                        {{ translate('All Categories')}}
                                                    </a>
                                                </li>

                                                @if ($category->parent_id != 0)
                                                    <li class="mb-3">
                                                        <a class="text-reset fs-14 fw-600 hov-text-primary" href="{{ route('products.category', get_single_category($category->parent_id)->slug) }}">
                                                            <i class="las la-angle-left"></i>
                                                            {{ get_single_category($category->parent_id)->getTranslation('name') }}
                                                        </a>
                                                    </li>
                                                @endif
                                                <li class="mb-3">
                                                    <a class="text-reset fs-14 fw-600 hov-text-primary" href="{{ route('products.category', $category->slug) }}">
                                                        <i class="las la-angle-left"></i>
                                                        {{ $category->getTranslation('name') }}
                                                    </a>
                                                </li>
                                                @foreach ($category->childrenCategories as $key => $immediate_children_category)
                                                    <li class="ml-4 mb-3">
                                                        <a class="text-reset fs-14 hov-text-primary" href="{{ route('products.category', $immediate_children_category->slug) }}">
                                                            {{ $immediate_children_category->getTranslation('name') }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                                <!-- Price range -->
                                <div class="bg-white border mb-3">
                                    <div class="fs-16 fw-700 p-3">
                                        {{ translate('Price range')}}
                                    </div>
                                    <div class="p-3 mr-3">
                                        @php
                                            $product_count = get_products_count()
                                        @endphp
                                        <div class="aiz-range-slider">
                                            <div
                                                id="input-slider-range"
                                                data-range-value-min="@if($product_count < 1) 0 @else {{ get_product_min_unit_price() }} @endif"
                                                data-range-value-max="@if($product_count < 1) 0 @else {{ get_product_max_unit_price() }} @endif"
                                            ></div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <span class="range-slider-value value-low fs-14 fw-600 opacity-70"
                                                        @if (isset($min_price))
                                                            data-range-value-low="{{ $min_price }}"
                                                        @elseif($products->min('unit_price') > 0)
                                                            data-range-value-low="{{ $products->min('unit_price') }}"
                                                        @else
                                                            data-range-value-low="0"
                                                        @endif
                                                        id="input-slider-range-value-low"
                                                    ></span>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <span class="range-slider-value value-high fs-14 fw-600 opacity-70"
                                                        @if (isset($max_price))
                                                            data-range-value-high="{{ $max_price }}"
                                                        @elseif($products->max('unit_price') > 0)
                                                            data-range-value-high="{{ $products->max('unit_price') }}"
                                                        @else
                                                            data-range-value-high="0"
                                                        @endif
                                                        id="input-slider-range-value-high"
                                                    ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Hidden Items -->
                                    <input type="hidden" name="min_price" value="">
                                    <input type="hidden" name="max_price" value="">
                                </div>

                                <!-- Attributes -->
                                @foreach ($attributes as $attribute)
                                    <div class="bg-white border mb-3">
                                        <div class="fs-16 fw-700 p-3">
                                            <a href="#" class="dropdown-toggle text-dark filter-section collapsed d-flex align-items-center justify-content-between"
                                                data-toggle="collapse" data-target="#collapse_{{ str_replace(' ', '_', $attribute->name) }}" style="white-space: normal;">
                                                {{ $attribute->getTranslation('name') }}
                                            </a>
                                        </div>
                                        @php
                                            $show = '';
                                            foreach ($attribute->attribute_values as $attribute_value){
                                                if(in_array($attribute_value->value, $selected_attribute_values)){
                                                    $show = 'show';
                                                }
                                            }
                                        @endphp
                                        <div class="collapse {{ $show }}" id="collapse_{{ str_replace(' ', '_', $attribute->name) }}">
                                            <div class="p-3 aiz-checkbox-list">
                                                @foreach ($attribute->attribute_values as $attribute_value)
                                                    <label class="aiz-checkbox mb-3">
                                                        <input
                                                            type="checkbox"
                                                            name="selected_attribute_values[]"
                                                            value="{{ $attribute_value->value }}" @if (in_array($attribute_value->value, $selected_attribute_values)) checked @endif
                                                            onchange="filter()"
                                                        >
                                                        <span class="aiz-square-check"></span>
                                                        <span class="fs-14 fw-400 text-dark">{{ $attribute_value->value }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <!-- Color -->
                                @if (get_setting('color_filter_activation'))
                                    <div class="bg-white border mb-3">
                                        <div class="fs-16 fw-700 p-3">
                                            <a href="#" class="dropdown-toggle text-dark filter-section collapsed d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#collapse_color">
                                                {{ translate('Filter by color')}}
                                            </a>
                                        </div>
                                        @php
                                            $show = '';
                                            foreach ($colors as $key => $color){
                                                if(isset($selected_color) && $selected_color == $color->code){
                                                    $show = 'show';
                                                }
                                            }
                                        @endphp
                                        <div class="collapse {{ $show }}" id="collapse_color">
                                            <div class="p-3 aiz-radio-inline">
                                                @foreach ($colors as $key => $color)
                                                <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="{{ $color->name }}">
                                                    <input
                                                        type="radio"
                                                        name="color"
                                                        value="{{ $color->code }}"
                                                        onchange="filter()"
                                                        @if(isset($selected_color) && $selected_color == $color->code) checked @endif
                                                    >
                                                    <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                        <span class="size-30px d-inline-block rounded" style="background: {{ $color->code }};"></span>
                                                    </span>
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>   
                        <!--- new sidebar filter start --->
                        <div class="sticky-top z-0 topStickyfilter">  

                            <div class="filtersApplied card filterApplied">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="filterAppliedText">Filters Applied</span>
                                        <button class="filterClearAll" id="clearAllFilter">Clear All</button>
                                    </div>  
                                    <div class="filterList">
                                        <ul id="filterList" class="d-flex flex-wrap">
                                            <!-- <li>
                                                <span>Rs. 1000 - Rs. 1999</span>
                                                <button><i class="ri-close-circle-line"></i></button>
                                            </li> -->
                                        </ul>
                                    </div>     
                            </div>

                                <div> 
                                    <div class="fs-16 fw-700 bg-white border filterPadding">
                                        <a href="#categoryCollapse" class="dropdown-toggle filter-section text-dark d-flex align-items-center justify-content-between" data-toggle="collapse">
                                            Sort By : Discount
                                        </a>
                                    </div> 

                                    <div id="categoryCollapse" class="collapse">
                                        <ul class="list-group">
                                            <li class="list-group-item list-groupitem2"> 
                                                <div class="form-check d-flex justify-content-between align-items-center itemFilter"> 
                                                    <label class="form-check-label" for="filter1">
                                                        Popularity
                                                    </label> 
                                                    <span> <input class="form-check-input filterCheckbox" type="checkbox" value="" id="filter1"> </span>
                                                </div> 
                                            </li>
                                            <li class="list-group-item list-groupitem2"> 
                                                <div class="form-check d-flex justify-content-between align-items-center itemFilter"> 
                                                    <label class="form-check-label" for="filter2">
                                                        Discount
                                                    </label> 
                                                    <span> <input class="form-check-input filterCheckbox" type="checkbox" value="2" id="filter2"> </span>
                                                </div> 
                                            </li>
                                            <li class="list-group-item list-groupitem2"> 
                                                <div class="form-check d-flex justify-content-between align-items-center itemFilter"> 
                                                    <label class="form-check-label" for="filter3">
                                                        Name
                                                    </label> 
                                                    <span> <input class="form-check-input filterCheckbox" type="checkbox" value="" id="filter3"> </span>
                                                </div> 
                                            </li>
                                            <li class="list-group-item list-groupitem2"> 
                                                <div class="form-check d-flex justify-content-between align-items-center itemFilter"> 
                                                    <label class="form-check-label" for="filter4">
                                                        Customer Top Rated
                                                    </label> 
                                                    <span> <input class="form-check-input filterCheckbox" type="checkbox" value="" id="filter4"> </span>
                                                </div> 
                                            </li>
                                            <li class="list-group-item list-groupitem2"> 
                                                <div class="form-check d-flex justify-content-between align-items-center itemFilter"> 
                                                    <label class="form-check-label" for="filter5">
                                                        New Arrivals
                                                    </label> 
                                                    <span> <input class="form-check-input filterCheckbox" type="checkbox" value="" id="filter5"> </span>
                                                </div> 
                                            </li>
                                            <li class="list-group-item list-groupitem2"> 
                                                <div class="form-check d-flex justify-content-between align-items-center itemFilter"> 
                                                    <label class="form-check-label" for="filter6">
                                                        Price: High To Low
                                                    </label> 
                                                    <span> <input class="form-check-input filterCheckbox" type="checkbox" value="" id="filter6"> </span>
                                                </div> 
                                            </li>
                                            <li class="list-group-item list-groupitem2"> 
                                                <div class="form-check d-flex justify-content-between align-items-center itemFilter"> 
                                                    <label class="form-check-label" for="filter7">
                                                        Price: Low To High
                                                    </label> 
                                                    <span> <input class="form-check-input filterCheckbox" type="checkbox" value="" id="filter7"> </span>
                                                </div> 
                                            </li>  
                                        </ul>
                                    </div>  
                                </div>

                            <div class="mt-3"> 
                                    <div class="bg-white leftfilterItems">
                                        <div class="fs-16 bg-white border filterPadding filterBorders">
                                            <a href="#category1" onclick="handleOpenClose(this)" class="selectorElement filter-section text-dark d-flex align-items-center justify-content-between" data-toggle="collapse">
                                                <span> Price</span> 
                                                <span class="downArrowIcon"><i class="ri-arrow-down-s-line text-mute text-muted" style="font-size:27px; color:#666;"></i></span>
                                                <span style="display: none;" class="closesIcons"><i class="ri-close-circle-line"></i></span>
                                            </a>
                                        </div> 
                                        <div id="category1" class="collapse">
                                            <ul class="listStyles p-0">
                                                <li class="filterPadding">
                                                    <div class="form-check p-0 d-flex justify-content-between"> 
                                                        <label class="form-check-label" >
                                                           Rs. 500 - Rs. 999  <span class="productIttem">2</span>
                                                        </label>
                                                        <span><input class="form-check-input checkboxFilter filtercheckedBox" type="checkbox" value="Rs. 500 - Rs. 999"></span>
                                                    </div> 
                                                </li>
                                                <li class="filterPadding">
                                                    <div class="form-check p-0 d-flex justify-content-between"> 
                                                        <label class="form-check-label" >
                                                        Rs. 2000 - Rs. 3999  <span class="productIttem">9</span>
                                                        </label>
                                                        <span><input class="form-check-input checkboxFilter filtercheckedBox" type="checkbox" value="Rs. 2000 - Rs. 3999" ></span>
                                                    </div> 
                                                </li>

                                                <li class="filterPadding">
                                                    <div class="form-check p-0 d-flex justify-content-between"> 
                                                        <label class="form-check-label" >
                                                        Rs. 4000 & Above <span class="productIttem">12</span>
                                                        </label>
                                                        <span><input class="form-check-input checkboxFilter filtercheckedBox" type="checkbox" value="Rs. 4000 & Above" ></span>
                                                    </div> 
                                                </li>

                                            </ul>
                                        </div>  
                                    </div>
                                    
                                    <div class="bg-white leftfilterItems">
                                        <div class="fs-16 bg-white border filterPadding filterBorders">
                                            <a href="#category2" onclick="handleOpenClose(this)" class="selectorElement filter-section text-dark d-flex align-items-center justify-content-between" data-toggle="collapse">
                                                <span> Category</span>
                                                <span  class="downArrowIcon"> <i class="ri-arrow-down-s-line text-mute text-muted" style="font-size:27px; color:#666;"></i></span>
                                                <span style="display: none;" class="closesIcons"> <i class="ri-close-circle-line"></i></span>
                                            </a>
                                        </div> 

                                        <div id="category2" class="collapse">
                                            <ul class="listStyles p-0">
                                                <li class="filterPadding">
                                                    <!-- accorinary start --->
                                                    <div class="accordion" id="sublistFilter">
                                                            <div class="mainSubitem"> 
                                                                <div class="" >
                                                                    <a class="mb-0 sublistitem" onclick="handleOpenClose(this)" >
                                                                        <div class="selectorElement sublistClass d-flex justify-content-between align-items-center w-100" data-toggle="collapse" data-target="#collapseMakeup" aria-expanded="true" aria-controls="collapseMakeup">
                                                                            <span> Face</span>     
                                                                            <span class="downArrowIcon"> <i class="ri-arrow-down-s-line text-mute text-muted"></i></span>
                                                                            <span class="closeIcons2 closesIcons" style="display: none;"><i class="ri-close-circle-line"></i></span>
                                                                        </div> 
                                                                    </a>
                                                                </div>

                                                                <div id="collapseMakeup" class="collapse"  data-parent="#sublistFilter">
                                                                        <ul class="listStyles p-0">
                                                                            <li class="filterPadding">
                                                                                <div class="form-check p-0 d-flex justify-content-between"> 
                                                                                    <label class="form-check-label sublistItems" >
                                                                                         Blush  <span class="productIttem">12</span>
                                                                                    </label>
                                                                                    <span><input class="form-check-input checkboxFilter2 filtercheckedBox" type="checkbox" value="Blush"></span>
                                                                                </div> 
                                                                            </li> 

                                                                            <li class="filterPadding">
                                                                                <div class="form-check p-0 d-flex justify-content-between"> 
                                                                                    <label class="form-check-label sublistItems" >
                                                                                         Foundation  <span class="productIttem">12</span>
                                                                                    </label>
                                                                                    <span><input class="form-check-input checkboxFilter2 filtercheckedBox" type="checkbox" value="Foundation" ></span>
                                                                                </div> 
                                                                            </li> 

                                                                            <li class="filterPadding">
                                                                                <div class="form-check p-0 d-flex justify-content-between"> 
                                                                                    <label class="form-check-label sublistItems" >
                                                                                         Primer  <span class="productIttem">12</span>
                                                                                    </label>
                                                                                    <span><input class="form-check-input checkboxFilter2 filtercheckedBox" type="checkbox" value="Primer" ></span>
                                                                                </div> 
                                                                            </li> 

                                                                        </ul>
                                                                </div> 
                                                            </div>

                                                            <div class="mainSubitem"> 
                                                                <div class="" >
                                                                    <a  class="mb-0 sublistitem" >
                                                                        <div class="sublistClass d-flex justify-content-between align-items-center w-100" data-toggle="collapse" data-target="#collapseFragrance" aria-expanded="true" aria-controls="collapseFragrance">
                                                                            <span> Eyes</span>     
                                                                            <span id="openCollaps"> <i class="ri-arrow-down-s-line text-mute text-muted"></i></span>
                                                                            <span id="closeCollapse" class="closeIcons2" style="display: none;"> <i class="ri-close-circle-line"></i></span>
                                                                        </div> 
                                                                    </a>
                                                                </div>

                                                                <div id="collapseFragrance" class="collapse"  data-parent="#sublistFilter">
                                                                        <ul class="listStyles p-0">
                                                                            <li class="filterPadding">
                                                                                <div class="form-check p-0 d-flex justify-content-between"> 
                                                                                    <label class="form-check-label sublistItems">
                                                                                        Eye Shadow <span class="productIttem">2</span>
                                                                                    </label>
                                                                                    <span><input class="form-check-input checkboxFilter2 filtercheckedBox" type="checkbox" value="Eye Shadow" ></span>
                                                                                </div> 
                                                                            </li> 
                                                                            <li class="filterPadding">
                                                                                <div class="form-check p-0 d-flex justify-content-between"> 
                                                                                    <label class="form-check-label sublistItems">
                                                                                         Eyeliner & Kajal  <span class="productIttem">56</span>
                                                                                    </label>
                                                                                    <span><input class="form-check-input checkboxFilter2 filtercheckedBox" type="checkbox" value="Eyeliner & Kajal"  ></span>
                                                                                </div> 
                                                                            </li> 
                                                                        </ul>
                                                                </div> 
                                                            </div> 
                                                        
                                                    </div>
                                                    <!-- accorinary end --->
                                                </li> 

                                            </ul>
                                        </div>  
                                    </div>
                                    
                                    <!-- Avg customer rating --->
                                    <div class="bg-white leftfilterItems">
                                        <div class="fs-16 bg-white border filterPadding filterBorders">
                                            <a href="#customerRating" onclick="handleOpenClose(this)" class="selectorElement filter-section text-dark d-flex align-items-center justify-content-between" data-toggle="collapse">
                                                <span> Finish</span> 
                                                <span  class="downArrowIcon"><i class="ri-arrow-down-s-line text-mute text-muted" style="font-size:27px; color:#666;"></i></span>
                                                <span style="display: none;" class="closesIcons"><i class="ri-close-circle-line"></i></span>
                                            </a>
                                        </div> 
                                        <div id="customerRating" class="collapse">
                                            <ul class="listStyles p-0">
                                                <li class="filterPadding">
                                                    <div class="form-check p-0 d-flex justify-content-between"> 
                                                        <label class="form-check-label" >
                                                             Natural  <span class="productIttem">257</span>
                                                        </label>
                                                        <span><input class="form-check-input checkboxFilter filtercheckedBox" type="checkbox" value="Natural" ></span>
                                                    </div> 
                                                </li> 
                                                <li class="filterPadding">
                                                    <div class="form-check p-0 d-flex justify-content-between"> 
                                                        <label class="form-check-label" >
                                                           Luminous/Radiant  <span class="productIttem">160</span>
                                                        </label>
                                                        <span><input class="form-check-input checkboxFilter filtercheckedBox" type="checkbox" value="Luminous/Radiant" ></span>
                                                    </div> 
                                                </li> 
                                                <li class="filterPadding">
                                                    <div class="form-check p-0 d-flex justify-content-between"> 
                                                        <label class="form-check-label" >
                                                           Shimmer  <span class="productIttem">60</span>
                                                        </label>
                                                        <span><input class="form-check-input checkboxFilter filtercheckedBox" type="checkbox" value="Shimmer" ></span>
                                                    </div> 
                                                </li> 

                                                <li class="filterPadding">
                                                    <div class="form-check p-0 d-flex justify-content-between"> 
                                                        <label class="form-check-label" >
                                                           Glossy  <span class="productIttem">20</span>
                                                        </label>
                                                        <span><input class="form-check-input checkboxFilter filtercheckedBox" type="checkbox" value="Glossy" ></span>
                                                    </div> 
                                                </li> 

                                            </ul>
                                        </div>  
                                    </div>

                                    <!--- Color filter --->
                                    <div class="bg-white leftfilterItems">
                                        <div class="fs-16 bg-white border filterPadding filterBorders">
                                            <a href="#color" onclick="handleOpenClose(this)" class="selectorElement filter-section text-dark d-flex align-items-center justify-content-between" data-toggle="collapse">
                                                <span> Color</span> 
                                                <span  class="downArrowIcon"><i class="ri-arrow-down-s-line text-mute text-muted" style="font-size:27px; color:#666;"></i></span>
                                                <span style="display: none;" class="closesIcons"><i class="ri-close-circle-line"></i></span>
                                            </a>
                                        </div> 
                                        <div id="color" class="collapse">
                                            <ul class="listStyles p-0">
                                                <li class="filterPadding">
                                                    <div class="form-check p-0 d-flex justify-content-between"> 
                                                        <div class="d-flex align-items-center">
                                                            <span class="colorFilters bg-dark"></span>
                                                            <label class="form-check-label" >
                                                                Black  <span class="productIttem">2</span>
                                                            </label>
                                                        </div>
                                                        <span><input class="form-check-input checkboxFilter filtercheckedBox" type="checkbox" value="Black" ></span>
                                                    </div> 
                                                </li> 

                                                <li class="filterPadding">
                                                    <div class="form-check p-0 d-flex justify-content-between"> 
                                                        <div class="d-flex align-items-center">
                                                            <span class="colorFilters bg-danger"></span>
                                                            <label class="form-check-label" >
                                                                Red  <span class="productIttem">2</span>
                                                            </label>
                                                        </div>
                                                        <span><input class="form-check-input checkboxFilter filtercheckedBox" type="checkbox" value="Red" ></span>
                                                    </div> 
                                                </li> 

                                            </ul>
                                        </div>  
                                    </div>  

                            </div>

                        </div> 
                        <!--- new sidebar filter end ---> 
                    </div>

                    <!-- Contents -->
                    <div class="col-xl-9">

                        <!-- Breadcrumb -->
                        <ul class="breadcrumb bg-transparent py-0 px-1">
                            <li class="breadcrumb-item has-transition opacity-50 hov-opacity-100">
                                <a class="text-reset" href="{{ route('home') }}">{{ translate('Home')}}</a>
                            </li>
                            @if(!isset($category_id))
                                <li class="breadcrumb-item fw-700  text-dark">
                                    "{{ translate('All Categories')}}"
                                </li>
                            @else
                                <li class="breadcrumb-item opacity-50 hov-opacity-100">
                                    <a class="text-reset" href="{{ route('search') }}">{{ translate('All Categories')}}</a>
                                </li>
                            @endif
                            @if(isset($category_id))
                                <li class="text-dark fw-600 breadcrumb-item">
                                    "{{ $category->getTranslation('name') }}"
                                </li>
                            @endif
                        </ul>

                        <!-- Top Filters -->
                        <div class="text-left">
                            <div class="row gutters-5 flex-wrap align-items-center">
                                <div class="col-lg col-10">
                                    <h1 class="fs-20 fs-md-24 fw-700 text-dark">
                                        @if(isset($category_id))
                                            {{ $category->getTranslation('name') }}
                                        @elseif(isset($query))
                                            {{ translate('Search result for ') }}"{{ $query }}"
                                        @else
                                            {{ translate('All Products') }}
                                        @endif
                                    </h1>
                                    <input type="hidden" name="keyword" value="{{ $query }}">
                                </div>
                                <div class="col-2 col-lg-auto d-xl-none mb-lg-3 text-right">
                                    <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                        <i class="la la-filter la-2x"></i>
                                    </button>
                                </div>
                                {{-- <div class="col-6 col-lg-auto mb-3 w-lg-200px mr-xl-4 mr-lg-3">
                                    @if (Route::currentRouteName() != 'products.brand')
                                        <select class="form-control form-control-sm aiz-selectpicker rounded-0" data-live-search="true" name="brand" onchange="filter()">
                                            <option value="">{{ translate('Brands')}}</option>
                                            @foreach (get_all_brands() as $brand)
                                                <option value="{{ $brand->slug }}" @isset($brand_id) @if ($brand_id == $brand->id) selected @endif @endisset>{{ $brand->getTranslation('name') }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div> --}}
                                <div class="col-6 col-lg-auto mb-3 w-lg-200px">
                                    <select class="form-control form-control-sm aiz-selectpicker rounded-0" name="sort_by" onchange="filter()">
                                        <option value="">{{ translate('Sort by')}}</option>
                                        <option value="newest" @isset($sort_by) @if ($sort_by == 'newest') selected @endif @endisset>{{ translate('Newest')}}</option>
                                        <option value="oldest" @isset($sort_by) @if ($sort_by == 'oldest') selected @endif @endisset>{{ translate('Oldest')}}</option>
                                        <option value="price-asc" @isset($sort_by) @if ($sort_by == 'price-asc') selected @endif @endisset>{{ translate('Price low to high')}}</option>
                                        <option value="price-desc" @isset($sort_by) @if ($sort_by == 'price-desc') selected @endif @endisset>{{ translate('Price high to low')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Products -->
                        <div class="px-1"> 
                                    
                        <!--- new product design start --->
                            <!-- <div class="row">  

                                <div class="col-sm-4">
                                    <div class="pr_height bg-white">
                                        <div class="productWrapper d-flex flex-column justify-content-between">
                                                <div class="productDetails productDetail_element"> 
                                                        <div class="bestsell">
                                                            <a href="">
                                                                <div class="productImages">
                                                                        <img src="https://images-static.nykaa.com/media/catalog/product/tr:w-220,h-220,cm-pad_resize/8/8/881fe95DGAJRA00006177_1.jpg" alt="Gajra Gang Frida Farida Off White Georgette Poppy Placement Print Kurta" class="css-11gn9r6">
                                                                </div>
                                                                <div class="productAllDetails">
                                                                        <div class="productTitle">Gajra Gang Frida Farida Off White Georgette Poppy Placement ...</div>
                                                                        <div class="reviews_div">
                                                                            <span class="product_mrp_">MRP: <span>₹3499</span></span>
                                                                            <span class="current_mrp">₹2274</span>
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
                                              
                                                <div class="select_size_color hiddenCartElement">
                                                    <div class="header_select">
                                                            <span>Select a Size(6)</span>
                                                            <button type="button" class="close_selectseciton"><i class="ri-close-large-line"></i></button>
                                                    </div>
                                                    <div class="select_customSize">
                                                        <ul>
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

                                                <div class="actionSection"> 
                                                    <div class="actionSection_1">
                                                        <button type="button" class="wishlist_button_text">
                                                            <span><i class="ri-heart-line"></i></span>
                                                        </button>
                                                        <button type="button" class="preview_button">Preview Size</button>
                                                    </div>  
                                                </div>
                                                
                                                <div class="detail_and_addToCart hiddenCartElement">
                                                        <a href="" class="view_detail_2">
                                                            <button class="" type="button">
                                                                View Details
                                                            </button> 
                                                        </a>
                                                        <button type="button" class="addToCart_button">
                                                            <span>Add to Cart</span>
                                                        </button>
                                                </div>  
                                        </div>
                                    </div> 
                                </div>   

                            </div> -->
                        <!--- new product design end --->

                            <!-- <div class="row gutters-16 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-4 row-cols-md-3 row-cols-2 border-top1 border-left1"> -->
                                
                            <div class="row"> 
                                @foreach ($products as $key => $product)
                                    <!-- <div class="col border-right border-bottom has-transition hov-shadow-out z-1"> -->
                                    <div class="col-md-4 p-0"> 
                                        @include('frontend.'.get_setting('homepage_select').'.partials.product_box_3',['product' => $product, 'category_name' => $category->getTranslation('name')]) 
                                    <!-- </div> -->
                                    </div>
                                @endforeach  
                            </div>

                            <!-- </div> -->
                        </div>
                        <div class="aiz-pagination mt-4">
                            {{ $products->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('script')
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }
        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
    </script>

<script>
       function handleOpenClose(element) { 
            const parent = element.closest('.selectorElement');
            const downArrowIcon = parent.querySelector('.downArrowIcon');
            const closesIcons = parent.querySelector('.closesIcons');
            
            if (downArrowIcon.style.display === 'none') { 
                downArrowIcon.style.display = 'inline';
                closesIcons.style.display = 'none';
            } else { 
                downArrowIcon.style.display = 'none';
                closesIcons.style.display = 'inline';
            }
        } 
         $('.filterApplied').hide();
      
        document.querySelectorAll('.filtercheckedBox').forEach(function(selectItem) {
                selectItem.addEventListener('change', function() {
                let filterValue = this.value;
                let filterList = document.getElementById('filterList');
                $('.filterApplied').show();

                if(this.checked) {
                    let appendHtml = `
                        <li data-filter-value="${filterValue}">
                            <span>${filterValue}</span>
                            <span class="deleteItem"><i class="ri-close-circle-line"></i></span>
                        </li>
                    `;
                    filterList.innerHTML += appendHtml;
                } else {
                    let listItems = filterList.querySelectorAll('li');
                    listItems.forEach(item => {
                        let spanText = item.querySelector('span').innerText;
                        if (spanText === filterValue) {
                            item.remove(); // Remove the item when unchecked
                        }
                    });
                }
            });
        });

        $('#filterList').on('click', '.deleteItem', function() {
            let filterValue = $(this).closest('li').data('filter-value'); 
            $(this).closest('li').remove(); 
            document.querySelectorAll('.filtercheckedBox').forEach(function(checkbox) {
                if (checkbox.value === filterValue) {
                    checkbox.checked = false;
                }
            }); 

            if (document.querySelectorAll('#filterList li').length === 0) {
                $('.filterApplied').hide(); 
            }
        }); 
       
</script>


@endsection
