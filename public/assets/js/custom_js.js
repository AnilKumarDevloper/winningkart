
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
    let review_url = ` ${app_url}api/get-all-review-of-product/3`;   
     
     try{
        let response = await fetch(review_url).then((data) => data.json());
        if(!response.status) return; 

        let responseData = response.data;
        console.log(responseData);
    
     }catch(error){
        console.log(error)
     }
      
 };
 
 

 
  
  
 


 


 







 