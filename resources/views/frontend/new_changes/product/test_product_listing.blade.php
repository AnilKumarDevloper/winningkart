
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
                                    <!-- <li class="list-group-item list-groupitem2 list_elements"> 
                                        <div class="form-check d-flex justify-content-between align-items-center itemFilter"> 
                                            <label class="form-check-label" for="filter1">
                                                Popularity
                                            </label> 
                                            <span> <input class="form-check-input filterCheckbox" type="checkbox" value="" id="filter1"> </span>
                                        </div> 
                                    </li> -->
                                    <li class="list-group-item list-groupitem2"> 
                                        <div class="form-check d-flex justify-content-between align-items-center itemFilter"> 
                                            <label class="form-check-label" for="filter2">
                                                Discount
                                            </label> 
                                            <span> <input class="form-check-input filterCheckbox filterWith_sortDiscount" type="checkbox" value="discount" id="filter2"> </span>
                                        </div> 
                                    </li>
                                    
                                    <li class="list-group-item list-groupitem2"> 
                                        <div class="form-check d-flex justify-content-between align-items-center itemFilter"> 
                                            <label class="form-check-label" for="filter4">
                                                Customer Top Rated
                                            </label> 
                                            <span> <input class="form-check-input filterCheckbox filterWith_sortDiscount" type="checkbox" value="topRated" id="filter4"> </span>
                                        </div> 
                                    </li>
                                    <!-- <li class="list-group-item list-groupitem2"> 
                                        <div class="form-check d-flex justify-content-between align-items-center itemFilter"> 
                                            <label class="form-check-label" for="filter5">
                                                New Arrivals
                                            </label> 
                                            <span> <input class="form-check-input filterCheckbox" type="checkbox" value="" id="filter5"> </span>
                                        </div> 
                                    </li> -->
                                    <li class="list-group-item list-groupitem2"> 
                                        <div class="form-check d-flex justify-content-between align-items-center itemFilter"> 
                                            <label class="form-check-label" for="filter6">
                                                Price: High To Low
                                            </label> 
                                            <span><input class="form-check-input filterCheckbox filterWith_sortDiscount" type="checkbox" value="priceHighToLow" > </span>
                                        </div> 
                                    </li>
                                    <li class="list-group-item list-groupitem2"> 
                                        <div class="form-check d-flex justify-content-between align-items-center itemFilter"> 
                                            <label class="form-check-label" for="filter7">
                                                Price: Low To High
                                            </label> 
                                            <span> <input class="form-check-input filterCheckbox filterWith_sortDiscount" type="checkbox" value="priceLowToHigh"  > </span>
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
                                                    <label class="form-check-label">Rs. 500 - Rs. 999 </label>
                                                    <span>
                                                        <input class="form-check-input checkboxFilter filterWith_price filterWith_element" 
                                                            type="checkbox" 
                                                            value="500-999"
                                                            data-value="Rs. 500 - Rs. 999" 
                                                            >
                                                    </span>
                                                </div> 
                                            </li>
                                            <li class="filterPadding">
                                                <div class="form-check p-0 d-flex justify-content-between"> 
                                                    <label class="form-check-label">Rs. 1000 - Rs. 2999 </label>
                                                    <span>
                                                        <input class="form-check-input checkboxFilter filterWith_price filterWith_element" 
                                                            type="checkbox" 
                                                            value="1000-2999"
                                                            data-value="Rs. 1000 - Rs. 2999"  
                                                            >
                                                    </span>
                                                </div> 
                                            </li>
                                            <li class="filterPadding">
                                                <div class="form-check p-0 d-flex justify-content-between"> 
                                                    <label class="form-check-label">Rs. 4000 & Above 
                                                        <!-- <span class="productIttem">12</span> -->
                                                    </label>
                                                    <span>
                                                        <input class="form-check-input checkboxFilter filterWith_price filterWith_element"  
                                                            type="checkbox" 
                                                            value="4000" 
                                                            >
                                                    </span>
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
                                        <ul class="listStyles p-0" id="color_container"> 
    
                                        </ul>
                                    </div>  
                                </div>  
                        </div>
                    </div> 
                    <!--- new sidebar filter end ---> 
                </div> 
                <div class="col-xl-9">
                    
                    <div class="row" id="products"> 
                         
                            <!-- <div class="col-md-4" id="loader">
                                <div class="movie--isloading" >
                                    <div class="loading-image"></div>
                                    <div class="loading-content d-flex flex-column justify-content-center align-items-center"> 
                                        <div class="loading-main-text"></div>
                                        <div class="loading-main-text w-25"></div>
                                        <div class="loading-sub-text mt-2"></div>  
                                    </div>
                                </div>
                            </div>  -->
                            
                        
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
 
    function getProductLoaderTemplate() {
        return `
            <div class="col-md-4 col-sm-6 mb-4 loader">
                <div class="movie--isloading">
                    <div class="loading-image"></div>
                    <div class="loading-content d-flex flex-column justify-content-center align-items-center"> 
                        <div class="loading-main-text"></div>
                        <div class="loading-main-text w-25"></div>
                        <div class="loading-sub-text mt-2"></div>  
                    </div>
                </div>
            </div>
        `;
     } 
   

          // color filter append
        const colorappend = async () =>{

            let colorUrl = "{{route('get_all_color_list')}}";
            let color_container = document.getElementById("color_container");
             color_container.innerHTML = '';
             colorHTML = '';
            try{
                let response = await fetch(colorUrl);
                let responseData = await response.json();
                if(responseData.status != "success") return;
                console.log(responseData.data);

                responseData.data.forEach((colorElement) => { 
                    colorHTML += ` 
                         <li class="filterPadding">
                            <div class="form-check p-0 d-flex justify-content-between"> 
                                <div class="d-flex align-items-center">
                                    <span class="colorFilters" style="background:${colorElement.value}"></span>
                                    <label class="form-check-label" >
                                        ${colorElement.value}
                                    </label>
                                </div>
                                <span><input class="form-check-input checkboxFilter filterWith_color filterWith_element" type="checkbox" value="${colorElement.value}" ></span>
                            </div> 
                        </li> `   
                });
                   
                color_container.innerHTML = colorHTML;
                 document.querySelectorAll('.filterWith_color').forEach(checkBox => {
                    checkBox.addEventListener('change', filterByuser);
                });
                
            }catch (error){
                console.log(error);
            }

        }  
     
       colorappend();  
 
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
                let stockOutText = "Out of Stock";
                let addCartText = "Add to Cart";
                let stockText ="";
                if (element.choice_options.length > 0) { 
                    
                    let sizeColor_select = element.choice_options[0].values; 
                    selectText = element.choice_options[0].attribute_name;  

                    let selected_after_discount=""; 
                    let selected_parcent_discount = "";
                    let selected_after_discount_price = "";
                    let selected_discount_percentage_By_amount ="";
                    let selected_discount = element.discount;  
                    let firstPrice = "";
                    let selected_price ="";
                    let select_zeroindex_mainPrice = "";
                    let select_zeroindex_parcent_discount = "";
                    let qty = "";
                    let disabledQty = "";
                    let allZero = true;  

                    // index check if qut > 0 
                    let ischeckedArray =  new Array(sizeColor_select.length).fill("");
                    
                    if(sizeColor_select[0].qty > 0 && sizeColor_select[0]?.qty > 0){
                        ischeckedArray[0] = "checked";
                    }else{
                        for(let check = 1; check < sizeColor_select.length; check++){
                            if(sizeColor_select[check]?.qty > 0){
                                ischeckedArray[check] = "checked";
                                break;
                            }
                        }
                    }  
                     

                     sizeColor_select.forEach((each, index) =>{   

                        let ischecked = ischeckedArray[index]; 
                      
                         selected_price = each.price;   
                         // qty check values
                         qty = each.qty; 
                         disabledQty = qty <= 0 ? "disabled" : ""; 
                        
                        if(each.qty && each.qty >= 0){
                            allZero = false;  
                        }  
                       

                         selected_after_discount_price = selected_price - selected_discount;  

                        if(discount > 0){
                             if(element.discount_type === "amount"){   
                                selected_parcent_discount = Math.round(selected_discount / selected_price * 100);
                                selected_after_discount_price = selected_price - selected_discount;   

                            }else if(element.discount_type === "percent"){ 
                                selected_discount_percentage_By_amount =  Math.round((selected_discount / 100) * selected_price);  
                                selected_after_discount_price = selected_price - selected_discount_percentage_By_amount;   
                               selected_parcent_discount = discount;
                            } 
                        }

                         if(ischecked === "checked"){
                            firstPrice = selected_after_discount_price;  
                            select_zeroindex_mainPrice = selected_price;
                            select_zeroindex_parcent_discount = selected_parcent_discount;
                         }  

                         if(selected_parcent_discount == ''){
                            selected_parcent_discount = 0;
                         }
                         if(stockText == ''){
                            stockText = '';
                         } 
                      
                        select_sizeColorHtml += `
                            <li class="select_customSize_list" id="${each.id}">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input sizeWise" 
                                       type="radio" name="attribute_id_${element.id}"
                                       data-price="${selected_after_discount_price}"
                                        ${ischecked}
                                       value="" onchange="variantSelect(this, ${element.id}, ${selected_price}, '${selected_parcent_discount}', ${each.id}, '${qty}', ${stockText} )"
                                    > 
                                    <label class="form-check-label" for="sizeM"> ${each.sku}</label>
                                </div> 
                            </li> `
                     });  
                     
                     if(allZero){
                        stockText = stockOutText;
                        disabledQty = "disabled";

                     }else{
                          stockText = addCartText;  
                          disabledQty = "";
                     }
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
                                    <span class="product_mrp_">MRP: <span><del class="opacity-70 fs-16 mr-2" id="main_price_${element.id}">₹ ${select_zeroindex_mainPrice}</del></span></span>
                                    <span class="current_mrp mrp_m_${element.id}">₹ ${firstPrice}</span>     
                                    ${select_zeroindex_parcent_discount > 0 ? `<span class="price_off" id="selected_off_parcent_${element.id}"> ${select_zeroindex_parcent_discount} % Off</span>` : ''}      
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
                                <button type="button" class="addToCart_button" ${disabledQty} id="addToCart_btn_${element.id}" >${stockText}</button>
                            </div>
                        </div>  
                     `
                } else {  
                    let stockzero = element.current_stock <= 0 ? "disabled" : "";
                    stockText = element.current_stock <= 0 ? stockOutText : addCartText;
                     add_cart += `
                        <div class="hover_content variant_add_to_cart_btn">
                            <div class="detail_and_addToCart">
                                <a href="#" class="view_detail_2"><button class="" type="button">View Details</button></a>
                                <button type="button" class="addToCart_button" 
                                 ${stockzero}
                                ><span> ${stockText} </span></button>
                            </div>
                        </div>  
                     `
                }

                let single_p_url = "{{ route('product', [':slug']) }}";
                single_p_url = single_p_url.replace(':slug', element.slug);
                html += ` 
                    <div class="col-md-4" id="${element.id}">
                        <div class="pr_height bg-white">
                            <div class="productWrapper d-flex flex-column justify-content-between">
                                <div class="productDetails productDetail_element"> 
                                    <div class="bestsell"> 
                                        <a href="${single_p_url}">
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
          
   
           const $productsContainer = $('#products');
                $productsContainer.html(''); 
            for (let i = 0; i < 10; i++) {
                $productsContainer.append(getProductLoaderTemplate());
            }

            const filterByuser = () => { 

                let filteredProducts = [...AllProduct];

                let checkedPrice = Array.from(document.querySelectorAll('.filterWith_price:checked')).map(el => el.value);
                let checkedColor = Array.from(document.querySelectorAll('.filterWith_color:checked')).map(el => el.value);
                let checkedDiscount = Array.from(document.querySelectorAll('.filterWith_sortDiscount:checked')).map(el => el.value); 

                let filterList_container = document.getElementById('filterList');
                let filter_html = '';

                if (checkedPrice.length === 0 && checkedColor.length === 0 && checkedDiscount.length === 0) {
                    filterList_container.innerHTML = '';
                    renderProduct(AllProduct);
                    return;
                } 

                // ✅ Price filtering
                if (checkedPrice.length > 0) {
                    filteredProducts = filteredProducts.filter(productItem => {
                        return checkedPrice.some(priceRange => {
                            const [min, max] = priceRange.includes('-')
                                ? priceRange.split('-').map(Number)
                                : [Number(priceRange), Infinity];
                            return productItem.unit_price >= min && productItem.unit_price <= max;
                        });
                    });
                }

                // ✅ Color filtering
                if (checkedColor.length > 0) {
                    filteredProducts = filteredProducts.filter(productItem => {
                        const colorVariants = productItem.choice_options?.find(opt => opt.attribute_name === "Color")?.values || [];
                        const availableColors = colorVariants.map(val => val.variant);
                        return checkedColor.some(color => availableColors.includes(color));
                    });
                }

                 // ✅ Sort By : Discount filtering
                
                 if(checkedDiscount.includes('discount')){
                      filteredProducts = filteredProducts.filter(productItem => {
                            return productItem.discount > 0;
                      }); 
                 }

                 if(checkedDiscount.includes('topRated')){
                      filteredProducts = filteredProducts.filter(productItem => {
                            return productItem.rating >= 4.0;
                      }); 
                 }
               
                if (checkedDiscount.includes("priceHighToLow")){
                   filteredProducts = filteredProducts.sort((a, b) => b.unit_price - a.unit_price);
                }else if(checkedDiscount.includes("priceLowToHigh")){
                      filteredProducts = filteredProducts.sort((a, b) => a.unit_price - b.unit_price);
                } 

                // ✅ Render selected price filters
                checkedPrice.forEach(price => {
                    const display = price.includes('-') ? price : `${price}-above`;
                    filter_html += `
                        <li>
                            <span>Rs ${display}</span>
                            <span class="deleteItem delete_filter_items" data-type="price" data-value="${price}">
                                <i class="ri-close-circle-line"></i>
                            </span>
                        </li>
                    `;
                });

                // ✅ Render selected color filters
                checkedColor.forEach(color => {
                    filter_html += `
                        <li>
                            <span>${color}</span>
                            <span class="deleteItem delete_filter_items" data-type="color" data-value="${color}">
                                <i class="ri-close-circle-line"></i>
                            </span>
                        </li>
                    `;
                });

                // ✅ Render selected color filters
                checkedDiscount.forEach(discount =>{
                     filter_html += `
                        <li>
                            <span>${discount}</span>
                            <span class="deleteItem delete_filter_items" data-type="discount" data-value="${discount}">
                                <i class="ri-close-circle-line"></i>
                            </span>
                        </li>
                    `;
                })

                filterList_container.innerHTML = filter_html;

                // ✅ Remove filter logic
                document.querySelectorAll('.delete_filter_items').forEach(deleteItem => {
                    deleteItem.addEventListener('click', function (e) {
                        const valueToRemove = e.currentTarget.dataset.value;
                        const type = e.currentTarget.dataset.type;

                        // let selector = type === 'price' ? '.filterWith_price' : '.filterWith_color';
                        let selector ='';

                        if(type === 'price'){
                            selector =  '.filterWith_price'
                            
                        }else if(type === 'color'){
                            selector = '.filterWith_color'

                        }else if(type === 'discount'){
                             selector = '.filterWith_sortDiscount'
                        }

                        document.querySelectorAll(selector).forEach(cb => {
                            if (cb.value === valueToRemove) {
                                cb.checked = false;
                            }
                        });

                        filterByuser(); // Re-filter
                    });
                });

                renderProduct(filteredProducts);
            }; 
       
            document.querySelectorAll('.filterWith_price, .filterWith_sortDiscount').forEach(checkBox =>{
                checkBox.addEventListener('change', filterByuser);
            });  
       
        $(document).ready(function () { 
            fetchApiData();
        }); 
        
         function variantSelect(el, id, selected_price, selected_parcent_discount, selectId, qty, stockText){  
                let price = el.getAttribute('data-price');
                document.querySelector(`.mrp_m_${id}`).textContent = `₹ ${price}`;
                document.getElementById(`main_price_${id}`).textContent = `₹ ${selected_price}`; 

                if(selected_parcent_discount > 0){ 
                    document.getElementById(`selected_off_parcent_${id}`).textContent = `${selected_parcent_discount} % Off`; 
                }
                 
                let addToCart_btn = document.getElementById(`addToCart_btn_${id}`); 
                
                if(qty <= 0 ){ 
                    addToCart_btn.disabled= true;
                    addToCart_btn.textContent= "Out of Stock"
                }else{ 
                       addToCart_btn.disabled= false;
                       addToCart_btn.textContent= "Add to Cart" 
                }  
         }
     
  
         document.getElementById('clearAllFilter').addEventListener('click', function(){
                 document.querySelectorAll('.filterWith_sortDiscount, .filterWith_price, .filterWith_color').forEach(checkbox => {
                    checkbox.checked = false;
                });
                filterByuser();
         });

         $('#loading').hide();

 </script> 

@endsection
@endsection






 
