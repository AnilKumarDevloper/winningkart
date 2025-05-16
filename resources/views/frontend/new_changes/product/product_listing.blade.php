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
            <form class="" id="search-form" method="GET">
                <div class="row"> 
                    <!-- Sidebar Filters -->
                    <div class="col-xl-3"> 
                        <!--- new sidebar filter start --->
                        <div class="sticky-top z-0 topStickyfilter"> 
                            <div class="filtersApplied card filterAppliedd">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="filterAppliedText">Filters Applied</span>
                                        <button class="filterClearAll" id="clearAllFilter">Clear All</button>
                                    </div>
                                    <div class="filterList">
                                        <ul id="filterList" class="d-flex flex-wrap"> 
                                            @if(is_array(request()->get('price_range')) && in_array('500-999', request()->get('price_range')))
                                            <li data-filter-value="${filterValue}">
                                                <span>Rs. 500 - Rs. 900</span>
                                                <span class="deleteItem"><i class="ri-close-circle-line"></i></span>
                                            </li>
                                            @endif

                                            @if(is_array(request()->get('price_range')) && in_array('2000-3999', request()->get('price_range')))
                                            <li data-filter-value="${filterValue}">
                                                <span>Rs. 2000 - Rs. 3900</span>
                                                <span class="deleteItem"><i class="ri-close-circle-line"></i></span>
                                            </li>
                                            @endif

                                            @if(is_array(request()->get('price_range')) && in_array('4000', request()->get('price_range')))
                                            <li data-filter-value="${filterValue}">
                                                <span>Rs. 4000 & Above</span>
                                                <span class="deleteItem"><i class="ri-close-circle-line"></i></span>
                                            </li>
                                            @endif

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
                                                    <label class="form-check-label">Rs. 500 - Rs. 999 <span class="productIttem">2</span></label>
                                                    <span>
                                                        <input class="form-check-input checkboxFilter filtercheckedBox" 
                                                            name="price_range[]" 
                                                            type="checkbox" 
                                                            value="500-999" 
                                                            {{ is_array(request()->get('price_range')) && in_array('500-999', request()->get('price_range')) ? 'checked' : '' }}>
                                                    </span>
                                                </div> 
                                            </li>
                                            <li class="filterPadding">
                                                <div class="form-check p-0 d-flex justify-content-between"> 
                                                    <label class="form-check-label">Rs. 2000 - Rs. 3999 <span class="productIttem">9</span></label>
                                                    <span>
                                                        <input class="form-check-input checkboxFilter filtercheckedBox" 
                                                            name="price_range[]" 
                                                            type="checkbox" 
                                                            value="2000-3999" 
                                                            {{ is_array(request()->get('price_range')) && in_array('2000-3999', request()->get('price_range')) ? 'checked' : '' }}>
                                                    </span>
                                                </div> 
                                            </li>
                                            <li class="filterPadding">
                                                <div class="form-check p-0 d-flex justify-content-between"> 
                                                    <label class="form-check-label">Rs. 4000 & Above <span class="productIttem">12</span></label>
                                                    <span>
                                                        <input class="form-check-input checkboxFilter filtercheckedBox" 
                                                            name="price_range[]" 
                                                            type="checkbox" 
                                                            value="4000" 
                                                            {{ is_array(request()->get('price_range')) && in_array('4000', request()->get('price_range')) ? 'checked' : '' }}>
                                                    </span>
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
                                     
                                </div>
                                <div class="col-2 col-lg-auto d-xl-none mb-lg-3 text-right">
                                    <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                        <i class="la la-filter la-2x"></i>
                                    </button>
                                </div> 
                                <div class="col-6 col-lg-auto mb-3 w-lg-200px">
                                </div>
                            </div>
                        </div> 
                        <!-- Products -->
                        <div class="px-1">  
                            <div class="row"> 
                            @include('frontend.new_changes.partials.product_listing', ['products' => $products]) 
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
                // filter();
                filter_product_listing();
                // let filterValue = this.value;
                // let filterList = document.getElementById('filterList');
                // $('.filterApplied').show();

                // if(this.checked) {
                //     let appendHtml = `
                //         <li data-filter-value="${filterValue}">
                //             <span>${filterValue}</span>
                //             <span class="deleteItem"><i class="ri-close-circle-line"></i></span>
                //         </li>
                //     `;
                //     filterList.innerHTML += appendHtml;
                // } else {
                //     let listItems = filterList.querySelectorAll('li');
                //     listItems.forEach(item => {
                //         let spanText = item.querySelector('span').innerText;
                //         if (spanText === filterValue) {
                //             item.remove();  
                //         }
                //     });
                // }
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

        function filter_product_listing(){
            let url = "{{ route('products.filter_product_listing') }}";
            let price_range = 999;
            $.post('{{ route('products.filter_product_listing') }}', {
                _token: '{{ @csrf_token() }}',
                price_range: price_range
            }, function(data) {
                 console.log(data);
            });
            }
       
</script>


@endsection
