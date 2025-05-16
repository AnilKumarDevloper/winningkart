
@extends('frontend.layouts.app')

@section('content')

   <section> 
        <div class="container">
           <div class="row">
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
                                        <!-- <li >
                                            <span>Rs. 500 - Rs. 900</span>
                                            <span class="deleteItem"><i class="ri-close-circle-line"></i></span>
                                        </li>   -->

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
                                    <li class="list-group-item list-groupitem2 list_elements"> 
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
                                        <a href="#category1" class="selectorElement filter-section text-dark d-flex align-items-center justify-content-between" data-toggle="collapse">
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
                                                        <input class="form-check-input checkboxFilter filterWith_price" 
                                                            type="checkbox" 
                                                            value="500-999"
                                                            data-value="Rs. 500 - Rs. 999" 
                                                            >
                                                    </span>
                                                </div> 
                                            </li>
                                            <li class="filterPadding">
                                                <div class="form-check p-0 d-flex justify-content-between"> 
                                                    <label class="form-check-label">Rs. 1000 - Rs. 2999 <span class="productIttem">9</span></label>
                                                    <span>
                                                        <input class="form-check-input checkboxFilter filterWith_price" 
                                                            type="checkbox" 
                                                            value="1000-2999"
                                                            data-value="Rs. 1000 - Rs. 2999"  
                                                            >
                                                    </span>
                                                </div> 
                                            </li>
                                            <li class="filterPadding">
                                                <div class="form-check p-0 d-flex justify-content-between"> 
                                                    <label class="form-check-label">Rs. 4000 & Above <span class="productIttem">12</span></label>
                                                    <span>
                                                        <input class="form-check-input checkboxFilter filterWith_price"  
                                                            type="checkbox" 
                                                            value="4000" 
                                                            >
                                                    </span>
                                                </div> 
                                            </li> 
                                        </ul> 
                                    </div>  
                                </div>
                                
                                <div class="bg-white leftfilterItems">
                                    <div class="fs-16 bg-white border filterPadding filterBorders">
                                        <a href="#category2"  class="selectorElement filter-section text-dark d-flex align-items-center justify-content-between" data-toggle="collapse">
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
                                                                <a class="mb-0 sublistitem"   >
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
                                        <a href="#customerRating"  class="selectorElement filter-section text-dark d-flex align-items-center justify-content-between" data-toggle="collapse">
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
                                        <a href="#color"   class="selectorElement filter-section text-dark d-flex align-items-center justify-content-between" data-toggle="collapse">
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
                <div class="col-xl-9">
                    <div class="row" id="products"> 
                    </div>
                </div>
                <!-- <div class="col-3">
                    <div class="pr_height bg-white">
                        <div class="productWrapper d-flex flex-column justify-content-between">
                            <div class="productDetails productDetail_element"> 
                                <div class="bestsell"> 
                                    <a href=" #">
                                        <div class="productImages">
                                            <img src=" https://192.168.1.12/winningkart/public/uploads/all/Z4zBgfJDT4BTVqYnWQA5bScYhbnR3x6gO5mxdItS.webp"
                                            alt=" " class="css-11gn9r6">
                                        </div>
                                        <div class="productAllDetails">
                                            <div class="productTitle" id="grttest"> Sienna Petite Faux Suede Crossbody Tote</div>
                                                <div class="reviews_div d-flex justify-content-center flex-wrap">  
                                                        <span class="product_mrp_">MRP: 
                                                            <span><del> 454</del></span> 
                                                        </span>
                                                        <span class="current_mrp">₹5,00</span>  
                                                        <span class="price_off"> 45 % Off</span>  
                                                </div>
                                                <div class="row no-gutters mb-3">
                                                    <div class="col-12 relevents">  
                                                            <span class="rating rating-mr-1">
                                                                <i class="las la-star active"></i>
                                                                <i class="las la-star active"></i>
                                                                <i class="las la-star active"></i>
                                                                <i class="las la-star active"></i>
                                                                <i class="las la-star half"></i>
                                                                (11)
                                                            </span>
                                                    </div>
                                                </div> 
                                            </div>
                                        </a>
                                    </div>
                                </div>  
                                
                                    <div class="css-size">
                                        <div class="css-ijlamg"> 4 Size</div>
                                    </div>
                                    <div class="select_size_color hiddenCartElement"> 
                                        <div class="header_select">
                                            <span>Select a  dd</span>
                                            <button type="button" class="close_selectseciton"><i class="ri-close-large-line"></i></button> 
                                        </div> 
                                        <div class="select_customSize">
                                            <ul class="selectYourSize"> 
                                                <li class="select_customSize_list">
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input sizeWise" type="radio" name="attribute_id_ " value=" " id=" " >
                                                        <label class="form-check-label" for="sizeM"> S</label>
                                                    </div> 
                                                </li> 
                                                <li class="select_customSize_list">
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input sizeWise" type="radio" name="attribute_id_ " value=" " id=" " >
                                                        <label class="form-check-label" for="sizeM"> M</label>
                                                    </div> 
                                                </li> 
                                            </ul>
                                        </div>
                                    <div class="sizeContainer">
                                        <div class="productTitle selectedSize mb-2 mt-2"> 45</div>
                                        <div class="reviews_div d-flex justify-content-center flex-wrap"> 
                                                <span class="product_mrp_">MRP: <span><del class="opacity-70 fs-16 mr-2"> 878</del></span></span>
                                                <span class="current_mrp"> 5120</span>            
                                                    <span class="price_off"> 44 % Off</span> 
                                                <span class="product_mrp_">MRP: <span> 8747</span></span> 
                                        
                                        </div> 
                                    </div> 
                                </div>
                            
                        
                            <div class="hover_content variant_preview_btn"> 
                                <div class="actionSection_1">
                                    <button type="button" class="wishlist_button_text" >
                                        <span><i class="ri-heart-line"></i></span>
                                    </button>
                                    <button type="button" class="preview_button">Preview Size</button>
                                </div>  
                            </div>
                            <div class="hover_content variant_add_to_cart_btn" style="display:none;">
                                <div class="detail_and_addToCart">
                                    <a href="#" class="view_detail_2"><button class="" type="button">View Details</button></a>
                                    <button type="button" class="addToCart_button" ><span>Add to Cart</span></button>
                                </div>
                            </div>   
                        
                    </div>
                    </div> 
                </div> -->
          </div>
        </div>

   </section> 

   
<!-- /// product filter js start  // 

  -->
 @section('script')

 <script>

  /// list element append #  
  
        // // let productApiUrl = "{{route('api_test_product_list', [$category_slug])}}";   
         // let allProduct = [];  

        //   const fetchAndRenderProducts = async () =>{   
        //         try{
        //             const response = await  fetch(productApiUrl); 
        //             if(!response.ok){
        //                 throw new Error(`HTTP error ${response.status}`)
        //             } 
        //             const responseData = await response.json();  
        //             allProduct = responseData.data;
        //             renderProducts(allProduct); 

        //         }catch(error){
        //             console.log(error)
        //         } 
        //     };  

        //     // rander products
        //     const renderProducts = (products) =>{
        //                let product_container = document.getElementById('products');  
        //                product_container.innerHTML = '';
        //                 let html = '';
        //                products.forEach(element => {     
                           
        //                     let parcentage_discount;
        //                     let unit_price = element.unit_price;
        //                     let discount = element.discount;  
        //                     let discount_price = unit_price - discount;
        //                     let product_img = element.photos[0];
        //                     const product_url = document.querySelector('meta[name="app-url"]').getAttribute('content'); 
                            
        //                     if(element.discount > 0){  
        //                         parcentage_discount =  Math.round((discount / unit_price) * 100);   
        //                     }
                            
        //                 // reating #
        //                 let starHTML = '';
        //                     for(i = 1; i <= 5; i++){
        //                         if(element.rating >= i){
        //                             starHTML += '<i class="las la-star active"></i>' 
        //                         }else if(element.rating >= 0.5){
        //                             starHTML += '<i class="las la-star half"></i>'
        //                         }else{
        //                             starHTML += '<i class="las la-star"></i>'
        //                         }
        //                     }  

        //                 html += `
        //                     <div class="col-md-4">
        //                         <div class="pr_height bg-white">
        //                             <div class="productWrapper d-flex flex-column justify-content-between">
        //                                 <div class="productDetails productDetail_element"> 
        //                                     <div class="bestsell"> 
        //                                         <a href=" #">
        //                                             <div class="productImages">
        //                                                 <img src="${product_url}/public/${product_img}"
        //                                                 alt=" " class="css-11gn9r6">
        //                                             </div>
        //                                             <div class="productAllDetails">
        //                                                 <div class="productTitle" id="grttest">${element.name}</div>
        //                                                     <div class="reviews_div d-flex justify-content-center flex-wrap">  
        //                                                             <span class="product_mrp_">MRP: 
        //                                                                 ${element.discount > 0 ? `<span><del>₹${unit_price}</del></span>` : ''}  
        //                                                             </span>
        //                                                             <span class="current_mrp">₹${discount_price}</span>   
        //                                                             ${parcentage_discount > 0 ? `<span class="price_off"> ${parcentage_discount + '% Off'} </span>` : ''}
        //                                                     </div>
        //                                                     <div class="row no-gutters mb-3">
        //                                                         <div class="col-12 relevents">  
        //                                                                 <span class="rating rating-mr-1"> 
        //                                                                     ${starHTML} (${element.reviews})
        //                                                                 </span>
        //                                                         </div>
        //                                                     </div> 
        //                                                 </div>
        //                                             </a>
        //                                         </div>
        //                                     </div>  
                                            
        //                                         <div class="css-size">
        //                                             <div class="css-ijlamg"> 4 Size</div>
        //                                         </div>
        //                                         <div class="select_size_color hiddenCartElement"> 
        //                                             <div class="header_select">
        //                                                 <span>Select a  dd</span>
        //                                                 <button type="button" class="close_selectseciton"><i class="ri-close-large-line"></i></button> 
        //                                             </div> 
        //                                             <div class="select_customSize">
        //                                                 <ul class="selectYourSize"> 
                                                            
        //                                                     <li class="select_customSize_list">
        //                                                         <div class="form-check d-flex align-items-center">
        //                                                             <input class="form-check-input sizeWise" type="radio" name="attribute_id_ " value=" "  >
        //                                                             <label class="form-check-label" for="sizeM"> S</label>
        //                                                         </div> 
        //                                                     </li> 
        //                                                     <li class="select_customSize_list">
        //                                                         <div class="form-check d-flex align-items-center">
        //                                                             <input class="form-check-input sizeWise" type="radio" name="attribute_id_ " value=" "  >
        //                                                             <label class="form-check-label" for="sizeM"> M</label>
        //                                                         </div> 
        //                                                     </li> 
        //                                                 </ul>
        //                                             </div>
        //                                         <div class="sizeContainer">
        //                                             <div class="productTitle selectedSize mb-2 mt-2"> 45</div>
        //                                             <div class="reviews_div d-flex justify-content-center flex-wrap"> 
        //                                                     <span class="product_mrp_">MRP: <span><del class="opacity-70 fs-16 mr-2"> 878</del></span></span>
        //                                                     <span class="current_mrp"> 5120</span>            
        //                                                         <span class="price_off"> 44 % Off</span> 
        //                                                     <span class="product_mrp_">MRP: <span> 8747</span></span> 
                                                    
        //                                             </div> 
        //                                         </div> 
        //                                     </div> 
                                    
        //                                 <div class="hover_content variant_preview_btn"> 
        //                                     <div class="actionSection_1">
        //                                         <button type="button" class="wishlist_button_text" >
        //                                             <span><i class="ri-heart-line"></i></span>
        //                                         </button>
        //                                         <button type="button" class="preview_button">Preview Size</button>
        //                                     </div>  
        //                                 </div>
        //                                 <div class="hover_content variant_add_to_cart_btn" style="display:none;">
        //                                     <div class="detail_and_addToCart">
        //                                         <a href="#" class="view_detail_2"><button class="" type="button">View Details</button></a>
        //                                         <button type="button" class="addToCart_button" ><span>Add to Cart</span></button>
        //                                     </div>
        //                                 </div>   
                                    
        //                         </div>
        //                         </div> 
        //                     </div>
        //             ` 
        //             }); 

        //              product_container.innerHTML = html; 
        //     }; 
                 

        //     // filterByUser dunctions start like call back function
        //     const filterByUser = () =>{ 
        //         const checkedPrices = Array.from(document.querySelectorAll('.filterWith_price:checked'))
        //         .map(cb => cb.value); 

        //             if(checkedPrices.length === 0){
        //                      renderProducts(allProduct);
        //                      return;
        //             };

        //          const filteredProducts = allProduct.filter(productItem => {
        //             return checkedPrices.some(priceRange =>{
        //                 const [min, max] = priceRange.includes('-') ? priceRange.split('-').map(Number) : [Number(priceRange), Infinity];
        //                 return productItem.unit_price >= min && productItem.unit_price <= max;
        //             })
        //          })

        //         renderProducts(filteredProducts);
        //     }   
             

        //     document.querySelectorAll('.filterWith_price').forEach(checkbox => {
        //         checkbox.addEventListener('change', filterByUser);
        //     }); 
         
        //     document.addEventListener('DOMContentLoaded', () => {
        //         fetchAndRenderProducts();
        //     }); 


    //////////////////////////////////////////////////////////
        // new functions starts

 
        let productApiUrl = "{{route('api_test_product_list', [$category_slug])}}"; 
        let AllProduct = [];
        
        const fetchApiData = async () => {  
            try{
                let response = await fetch(productApiUrl);
                if(!response){
                    console.log('your response is not ok!');
                }
                let responseData = await response.json();  
                AllProduct = responseData.data;
                console.log(AllProduct);
                renderProduct(AllProduct);
               
            }catch(error){
                console.log(error)
            } 
        } 

        // render product function
        const renderProduct = (product) =>{
            
            let product_container = document.getElementById('products'); 
            product_container.innerHTML = '';
            
            let html = '';
            product.forEach((element) => {
                
                const product_url = document.querySelector('meta[name="app-url"]').getAttribute('content');
                const product_img = element.photos[0]; 
                let unit_total_price = element.unit_price;
                let discount = element.discount;
              
                let after_discount = "";
                let parcent_discount;
                let discount_percentage_By_amount= "";  

                if(discount > 0){
                    if(element.discount_type === "amount"){ 
                       parcent_discount = Math.round(discount / unit_total_price * 100);
                       after_discount = unit_total_price - discount; 
                    }else if(element.discount_type === "percent"){ 
                        discount_percentage_By_amount =  Math.round((discount / 100) * unit_total_price);  
                        after_discount = unit_total_price - discount_percentage_By_amount;  
                        parcent_discount = discount; 
                    } 
                }else{
                    after_discount = unit_total_price; 
                }

                let ratingHtml = ''; 
                for(let i=1; i<=5; i++){
                    if(element.rating >= i){
                        ratingHtml += '<i class="las la-star active"></i>'
                    }else if(element.rating >= 0.5){
                        ratingHtml += '<i class="las la-star half"></i>'
                    }else{
                        ratingHtml += '<i class="las la-star"></i>'
                    } 
                } 

              
                let select_sizeColor = "";
                let add_cart = "";
                let colorSize_elemetHtml = "";
                let select_sizeColorHtml = ""; 
                let selectText = "";
               
                if (element.choice_options.length > 0) { 
                    
                    let sizeColor_select = element.choice_options[0].values; 
                    selectText = element.choice_options[0].attribute_name; 
                  
                    let selected_discount = element.discount;   
                  
              
                    let firstPrice = "";

                     sizeColor_select.forEach((each, index) =>{   
                        let selected_price = each.price;  
                        console.log(parcent_discount) 
                        after_discount = selected_price - 500;  
                        
                        let ischecked =  index === 0 ? "checked" : ""; 
                         price_after_discount_sizeColor = selected_price - selected_discount; 


                        if(discount > 0){
                             if(element.discount_type === "amount"){

                                console.log("amount discount ");
                            }else if(element.discount_type === "percent"){
                                console.log("percent discount");
                            } 
                        }else{
                            console.log("else discounts ");
                        }
                       
                        
                        // let selected_discount_parcentage =  Math.round((selected_discount / selected_price )* 100);
                        //  console.log(selected_discount_parcentage, "selected_discount_parcentage");
                  


                         if(index === 0){
                            firstPrice = price_after_discount_sizeColor;
                         } 
                      
                        select_sizeColorHtml += `
                            <li class="select_customSize_list" id="${each.id}">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input sizeWise" 
                                       type="radio" name="attribute_id_${element.id}"
                                        value="" onchange="variantSelect(this, ${element.id})"
                                        data-price="${price_after_discount_sizeColor}" ${ischecked}
                                        >
                                    <label class="form-check-label" for="sizeM"> ${each.sku}</label>
                                </div> 
                            </li> `
                     });

                    /// size color select option elements start 
                    colorSize_elemetHtml = `
                         <div> 
                            <div class="header_select">
                                <span>Select a ${selectText}</span>
                                <button type="button" class="close_selectseciton"><i class="ri-close-large-line"></i></button> 
                            </div> 
                            <div class="select_customSize">
                                <ul class="selectYourSize">  
                                        ${select_sizeColorHtml}
                                </ul>
                            </div>
                            <div class="sizeContainer"> 
                                <div class="reviews_div d-flex justify-content-center flex-wrap"> 
                                    <span class="product_mrp_">MRP: <span><del class="opacity-70 fs-16 mr-2"> 878</del></span></span>
                                    <span class="current_mrp mrp_m_${element.id}">₹ ${firstPrice}</span>            
                                    <span class="price_off"> 44 % Off</span>   
                                </div> 
                            </div> 
                        </div>
                    ` 
                    /// size color select option elements end  

                   select_sizeColor += `  
                        <div class="hover_content variant_preview_btn "  > 
                            <div class="actionSection_1">
                                <button type="button" class="wishlist_button_text" >
                                    <span><i class="ri-heart-line"></i></span>
                                </button>
                                <button type="button" class="preview_button">Preview Size</button>
                            </div>  
                        </div> 
                        <div class="hover_content variant_add_to_cart_btn" style="display:none">
                            <div class="detail_and_addToCart">
                                <a href="#" class="view_detail_2"><button class="" type="button">View Details</button></a>
                                <button type="button" class="addToCart_button" ><span>Add to Cart</span></button>
                            </div>
                        </div>  
                     `
                } else {
                     add_cart += `
                        <div class="hover_content variant_add_to_cart_btn">
                            <div class="detail_and_addToCart">
                                <a href="#" class="view_detail_2"><button class="" type="button">View Details</button></a>
                                <button type="button" class="addToCart_button" ><span>Add to Cart</span></button>
                            </div>
                        </div>  
                     `
                }  
               
                html += ` 
                    <div class="col-md-4" id="${element.id}">
                        <div class="pr_height bg-white">
                            <div class="productWrapper d-flex flex-column justify-content-between">
                                <div class="productDetails productDetail_element"> 
                                    <div class="bestsell"> 
                                        <a href=" #">
                                            <div class="productImages">
                                                <img src="${product_url}/public/${product_img}"
                                                alt=" " class="css-11gn9r6">
                                            </div>
                                            <div class="productAllDetails">
                                                <div class="productTitle" id="grttest">${element.name}</div>
                                                    <div class="reviews_div d-flex justify-content-center flex-wrap">  
                                                            <span class="product_mrp_">MRP: 
                                                                ${discount ? `<span><del>₹ ${unit_total_price}</del></span> ` : ''} 
                                                            </span>
                                                            <span class="current_mrp">₹${after_discount}</span>   
                                                             ${parcent_discount ? `<span class="price_off">${parcent_discount}% Off </span>` : ''}
                                                    </div>
                                                    <div class="row no-gutters mb-3">
                                                        <div class="col-12 relevents">  
                                                                <span class="rating rating-mr-1"> 
                                                                     ${ratingHtml} (${element.reviews})
                                                                </span>
                                                        </div>
                                                    
                                                </div> 
                                            </div>
                                         </a>
                                    </div>
                                </div>    
                                         
                                    <div class="select_size_color hiddenCartElement"> 
                                            ${colorSize_elemetHtml}
                                    </div>  
                                        
                                        ${select_sizeColor}
                                        ${add_cart} 
                                
                           </div>
                        </div> 
                    </div>
                `
            });  
            product_container.innerHTML = html;
        }


        // filter product functions

        const filterByuser = () =>{  
             let checkedPrice = Array.from( document.querySelectorAll('.filterWith_price:checked')).map(pri => pri.value); 
             let filterList_container = document.getElementById('filterList');
             let filter_html = '';
               console.log(filterList_container);
            
             if(checkedPrice.length === 0){
                filter_html  = ''; 
                 filterList_container.innerHTML = filter_html;
                renderProduct(AllProduct);
                return true;
             }

             let filterByPrice = AllProduct.filter(productItem => {
                return checkedPrice.some(priceRange =>{
                    const [min, max] = priceRange.includes('-') ? priceRange.split('-').map(Number) : [Number(priceRange),  Infinity];
                    return productItem.unit_price >= min && productItem.unit_price <= max; 
                }) 
             }); 

            /// filter child eleemnts start 
             let filter_result = checkedPrice.map(price =>{
                 if(price.includes('-')){  
                    return {'between_mrp': price};
                }else{
                    return { between_mrp: `${price}-above` };
                }
             });  

             filter_result.forEach(childs =>{ 
                filter_html += `
                    <li >
                        <span>Rs ${childs.between_mrp} </span>
                        <span class="deleteItem delete_filter_items" data-value="${childs.between_mrp}"><i class="ri-close-circle-line"></i></span>
                    </li> 
                `
             }) 
             filterList_container.innerHTML = filter_html; 
            /// filter child eleemnts end  
             
            /// deleteFilter_item function 
            document.querySelectorAll('.delete_filter_items').forEach(deleteItem =>{
                deleteItem.addEventListener('click', function (e) { 
                    const valueToRemove = e.currentTarget.dataset.value;

                        // Convert '1000-above' format to get the checkbox value
                        let checkboxValue = valueToRemove.includes('-above') 
                            ? valueToRemove.replace('-above', '') 
                            : valueToRemove; 
                      
                        document.querySelectorAll('.filterWith_price').forEach(cb => {
                            console.log(cb)
                            if (cb.value === checkboxValue) {
                                cb.checked = false;
                            }
                        });

                        // Re-trigger filtering
                        filterByuser();
                 });
            }); 

             renderProduct(filterByPrice);
         } 

        document.querySelectorAll('.filterWith_price').forEach(checkBox =>{
            checkBox.addEventListener('change', filterByuser);
        }); 
       
        $(document).ready(function () { 
            fetchApiData();
        });
     

        
        function variantSelect(el, id, selected_discount_parcentage){  
           let price = el.getAttribute('data-price');
           document.querySelector(`.mrp_m_${id}`).textContent = `₹ ${price}`;
           console.log(selected_discount_parcentage)
        }
     


 </script> 

@endsection
@endsection






 
