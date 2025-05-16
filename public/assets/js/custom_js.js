

// document.addEventListener('DOMContentLoaded', function () { 


//     let customSize = ['M', 'XL', 'L', 'S', 'XS', '2XL'];
//     let selectYourSize = document.querySelectorAll('.selectYourSize');
  
//     let selectYourSizeContant = '';  
//     customSize.forEach((size) => { 
//        selectYourSizeContant += ` 
//             <li class="select_customSize_list"">
//                 <div class="form-check d-flex align-items-center">
//                     <input class="form-check-input sizeWise customerselectedSize" 
//                         type="radio" 
//                         name="customSize" 
//                         value="${size}" 
//                         id="size${size}" 
//                         >
//                     <label class="form-check-label" for="sizeM">
//                         ${size}
//                     </label>
//                 </div> 
//             </li>  
//           `
//       }); 

//       selectYourSize.forEach((element) =>{ 
//         element.innerHTML += selectYourSizeContant;
//       });

//  }); 


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

// all image function 

/// product filter js start  // 
// document.addEventListener('DOMContentLoaded', function () { 
//     let productApiUrl = "{{route('api_test_product_list')}}";
//     console.log(productApiUrl);
//     const products = async () =>{
//         try{
//             const response = await  fetch(productApiUrl);
//             console.log(response);
//         }catch(error){
//             console.log(error)
//         }
//     }
//     products() 
//  })
 
  
  
 


 


 







 