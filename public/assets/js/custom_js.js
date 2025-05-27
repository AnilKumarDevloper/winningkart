


   // product detail function check address with pinchod
    document.getElementById('delivery_option_pincode').addEventListener('submit', async function(e){
        
        e.preventDefault();
        const delivery_pincode = document.getElementById('delivery_pincode').value;
        const response = await fetch(`https://api.zippopotam.us/IN/${delivery_pincode}`); 
        delivery_pincode.value 

        if(delivery_pincode.length === 6){
            try{
                if(!response.ok){ 
                    $('#validPincode').show();
                    $('#validPincode').text('Please enter valid pincode');
                    $('#notShipping_pincode').show();
                    $('#pincode_element').hide();
                    $('#Shipping_thisPincode').hide();
                    $('.pincodeDetails').show();
                    $('.tooltiptext').show();
                    $('#userPincode').text(delivery_pincode);
                }else{
                    $('#validPincode').hide();
                    const responseData = await response.json();
                    $('#Shipping_thisPincode').show();
                    $('#pincode_element').hide();
                    $('.pincodeDetails').show();
                    $('.tooltiptext').show();
                    $('#placeName').text(responseData.places[0]['place name']+', '+ responseData.places[0].state)
                    $('#userPincode').text(delivery_pincode);
                }
    
            }catch(error){
                console.log(error)
            }
        }else{
            $('#validPincode').show();
            $('#validPincode').text('Please enter valid pincode');
        }

    }); 
    /// change pincode function 
    document.getElementById('changepincode').addEventListener('click', function(){
        // console.log('change function work..!')
        $('.pincodeDetails').hide();
        $('.tooltiptext').hide();
        $('#notShipping_pincode').hide();
        $('#Shipping_thisPincode').hide();
        $('#pincode_element').show();
    }); 



// product customer image view function\

let arraysource = [];

document.querySelectorAll('.customerReview').forEach(function(currentReview){
    currentReview.addEventListener('click', function(){
        currentReview.classList.remove('active');
        arraysource = [];
        let currentReviewSrc = currentReview.src;
        const main_parent_review_element = currentReview.closest('.main_parent_review_element');
        const all_reviews  = main_parent_review_element.querySelectorAll('.customerReview');
        const customer_review_images = document.getElementById('customer_review_images');
       document.getElementById('review_bgimg').style.backgroundImage = `linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(${currentReviewSrc})`
       all_reviews.forEach((allSrc) =>{
        const imgsource = allSrc.src;
        arraysource.push({'image': imgsource});
       });
       let append_customer_review_images = '';
       if(arraysource.length > 0){
            $('#customerReview_modal').modal('show');
            arraysource.forEach((element) => {
                let isactive = element.image === currentReviewSrc ? 'active activeModalImg' : '';
                append_customer_review_images += `
                    <div class="carousel-item ${isactive}">
                          <img class="d-block w-100 modalSource" src="${element.image}" alt="First slide">
                    </div>`;
            });
       };
       customer_review_images.innerHTML = append_customer_review_images; 
    });
});


document.querySelectorAll('.nextPrevBtn').forEach(function(prev_nex_btn){
    prev_nex_btn.addEventListener('click', function () {
        let modalSource = document.querySelector('.active .modalSource').src;
        document.getElementById('review_bgimg').style.backgroundImage = `linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(${modalSource})`
     });
});


/// review page scripts functions start....

document.addEventListener("DOMContentLoaded", function () { 
   customer_reviewsApi();
 }); 
 
  
 const customer_reviewsApi = async () =>{
    
    const app_url = document.querySelector('meta[name="app-url"]').getAttribute('content');
    let review_url = `${app_url}api/get-all-review-of-product/3`;
    
     try{
        let response = await fetch(review_url).then((data) => data.json());
        if(!response.status) return;  

        let responseData = response.data; 
        allData = responseData;
        
        // console.log(responseData, "responseData");

         customerallreviews_elements(responseData);  
    
     }catch(error){
        console.error(error)
     }
 };
 


 // all_customer functions

 const customerallreviews_elements = (responseData) =>{
    let base_url = document.querySelector('meta[name="app-url"]').getAttribute('content');

    const customer_allreview_elements = document.getElementById("customer_allreview_elements");
    let customer_allreview_elements_html = ""; 

    let data = responseData;
   
    
    // all_customer image elements start   
    let customers_review_length = responseData.slice(0, 11); 
    let allreview_links = "";
    if(customers_review_length.length === 11){
       allreview_links = `
            <li>
                <div class="review_img">
                    <div class="morereviews">
                        <a href="" class="text-white">
                            <h4 class="text-center m-0" >+  More</h4>
                        </a>
                    </div>
                </div>
            </li> 
        `
    }

    let all_customer_img = customers_review_length.map((allcustomer) =>{
        let customer_img = allcustomer.photos[0].file_name; 
        return `
            <li class="parant_review_element">
                <div class="review_img rew_3">
                    <img class="img-fit h-100 lazyload border" src="${base_url}public/${customer_img}" onclick="handleCustomerReviewClick(${data}, ${allcustomer.id})">
                </div>
            </li>
        `
    }).join("");  


     let read_more = ""; 
     let reviewlenth = "";

     if(is_reviews_page === false){
        reviewlenth = responseData.slice(0, 3);
     }else{
          reviewlenth = responseData;
     } 

    if(reviewlenth.length === 3){
        read_more = `<a href="" class="readMore"><span >Read More Reviews</span> <i class="ri-arrow-right-s-line"></i></a>`
    } 

    let user_profile_img = "";
    let customers_reviews = reviewlenth.map((reviews) =>{  

         if(reviews.user_profile == ""){ 
            user_profile_img = `${base_url}public/assets/img/placeholder.jpg`; 
        
        }else{
            user_profile_img = `${base_url}public/${reviews.user_profile}` 
        };

        let review_all_photos = reviews.photos;
     
        return `
             <div class="photosFromCustomers p-3">
                <div class="photoscustomerstext">Photos From Customers</div>
                <div class="row">
                    <div class="col-sm-4 col-12">
                        <div class="d-flex align-items-center" style="gap:5px">
                        <img class="lazyload mw-100 size-60px mx-auto border p-1 customerImage"
                            src="${user_profile_img}" alt="profile image" >
                            <div>
                                <div class="css-c customerName">${reviews.user} </div>
                                <div class="verifytx"> <i class="ri-verified-badge-line"></i> Verified Buyers</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="customerReview- ">${reviews.rating} <i class="ri-star-line"></i></span>
                            <span class="verifytx">${reviews.created_at}</span>
                        </div>
                        <div class="customerComments">
                            
                            <p class="css-c"> ${reviews.review}</p> 
                            <ul class="revSection main_parent_review_element"> 
                                ${
                                    review_all_photos.map((photo) =>{
                                        return `
                                         <li class="parant_review_element">
                                            <div class="review_img rew_3">
                                                <img class="img-fit h-100 lazyload border"
                                                 src="${base_url}public/${photo.file_name}"
                                                 alt="reviews image">
                                            </div>
                                        </li> 
                                        `
                                    }).join("")
                                 }   
                            </ul>  
                        </div>
                    </div>
                </div>
            </div> 
        `
    }).join("");

 
    customer_allreview_elements_html = 
    `
        <div class="element_container"> 
           
                <div class="photosFromCustomers p-3">
                        <div class="photoscustomerstext" >Photos From Customers </div>
                        <div class="row">
                            <ul class="revSection" id="all_customer" >  
                                ${all_customer_img}
                                ${allreview_links} 
                            </ul> 
                        </div>
                </div>
             
                <div class="customer_reviews_container">
                    ${customers_reviews}
                </div>

                <div class="p-2 d-flex justify-content-center" style="border-top: 1px solid rgba(111, 121, 129, 0.22);;">
                    ${read_more}
                </div>

       </div>
    `
    customer_allreview_elements.innerHTML += customer_allreview_elements_html;
 }



 // customer_review_modal 
 const handleCustomerReviewClick = (data, id) =>{
 
    console.log(data, "data is")
    console.log(id)
 }

 
 

 
  
  
 


 


 







 