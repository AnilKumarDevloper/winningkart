 
  @php
        $total = 0;
        $total += $detailedProduct->reviews->count();
    @endphp
 
 {{-- 

<div class="bg-white border mb-4">
    <div class="p-3 p-sm-4">
        <h3 class="fs-16 fw-700 mb-0">
            <span class="mr-4">{{ translate('Reviews & Ratings') }}</span>
        </h3>
    </div>
    <!-- Ratting -->
    <div class="px-3 px-sm-4 mb-4">
        <div class="border border-secondary-base bg-soft-secondary-base p-3 p-sm-4">
            <div class="row align-items-center">
                <div class="col-md-8 mb-3">
                    <div class="d-flex align-items-center justify-content-between justify-content-md-start">
                        <div class="w-100 w-sm-auto">
                            <span class="fs-36 mr-3">{{ $detailedProduct->rating }}</span>
                            <span class="fs-14 mr-3">{{ translate('out of 5.0') }}</span>
                        </div>
                        <div class="mt-sm-3 w-100 w-sm-auto d-flex flex-wrap justify-content-end justify-content-md-start">
                            @php
                                $total = 0;
                                $total += $detailedProduct->reviews->count();
                            @endphp
                            <span class="rating rating-mr-1">
                                {{ renderStarRating($detailedProduct->rating) }}
                            </span>
                            <span class="ml-1 fs-14">({{ $total }}
                                {{ translate('reviews') }})</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <a  href="javascript:void(0);" onclick="product_review('{{ $detailedProduct->id }}')" 
                        class="btn btn-secondary-base fw-400 rounded-0 text-white">
                        <span class="d-md-inline-block"> {{ translate('Rate this Product') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Reviews -->
    @include('frontend.product_details.reviews')
</div>

 --}}

<!-- new review section start--->
 <section >
    <div class="productDescription">
         <h2 class="css-description">Product Description</h2> 
        <div class="card p-3">
             <div class="tab-container">
                    <div class="tabs bg-white">
                        <button class="tab-link tab_link" onclick="openTab(event, 'description')">Description</button>
                          <!-- <button class="tab-link tab_link" onclick="openTab(event, 'ingredients')">Ingredients</button>
                        <button class="tab-link tab_link" onclick="openTab(event, 'howToUse')">How To Use</button> -->
                    </div>  
                    <div class="detailsContainer">
                        <div class="tab-contents" id="description"> 
                            <div class="c-cons">
                                <div class="description-s h2hh" id="content_details">
                                    <img src="" class="w-100"> 
                                  <p> <?php echo $detailedProduct->getTranslation('description'); ?></p>
                                </div>
                                 <div class="p-2 d-flex justify-content-center">
                                        <span class="readMore"><span id="readMore">Read More</span> <i class="ri-arrow-down-s-line" id="arrow1"></i></span> 
                                </div>
                            </div>
                        </div>
                        <div class="tab-contents" id="ingredients">
                            <div class="description-s">
                                    <p>Vitamin E and Aloe</p>
                            </div>
                        </div>

                        <div class="tab-contents" id="howToUse"> 
                            <div class="description-s">
                                <ul>
                                    <li>To apply this longwear lipstick—simply shake, swipe and go.</li>
                                    <li>For the perfect vinyl lip, first shake up Maybelline Vinyl Ink Lipstick for at least 5 seconds before applying.</li>
                                    <li>Next apply to your lips using its precise flocked tip applicator. Lastly, let it dry and go! #shakeswipego
                                    </li>
                                </ul>
                            </div> 
                        </div>
                    </div> 
             </div>   
        </div>
    </div>
    <div class="customersalsoViewed">

    </div>

    <div class="productDetails-r ">
       <h2 class="css-description">Product Description</h2> 
       <div class="card p-3">
            <div class="tabs tabs2">
                <button class="active">Ratings & reviews</button> 
            </div>
            <div class="reviewSection p-3">
                <div class="row">
                    <div class="col-sm-5" style="border-right: 2px solid rgba(111, 121, 129, 0.22);">
                        <div class="d-flex align-items-center" style="gap:10px">
                            <span class="reatings"><b>{{ $detailedProduct->rating }}/</b>5</span>
                            <div>
                                <strong class="css-hi" style="display: block;">Overall Rating</strong>
                                <span class="css-c">{{ $total }} verified ratings</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7"> 
                           <span class="css-c">{{ $total }} verified ratings</span>
                           <button type="button" class="write_review mt-2" id="review_login"  onclick="product_review('{{ $detailedProduct->id }}')" >Write Review</button>
                    </div>
                </div>
            </div>

            @if(count($reviews) > 0)
            <div class="customerallreviews">
            <div class="photosFromCustomers p-3">
                    <div class="photoscustomerstext">Photos From Customers</div>
                    <div class="row">
                        <ul class="revSection main_parent_review_element" id="reviewImages" > 
                            @foreach ($all_reviews_images as $index => $photo)
                                <li class="parant_review_element">
                                    <div class="review_img rew_3">
                                        <img class="img-fit h-100 lazyload border customerImages customerReviewIMG customerReview" src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                        data-src="{{ uploaded_asset($photo->photos) }}"
                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                    </div>
                                </li>
                                @if($index == 8)
                                @break
                                @endif
                            @endforeach 
                       @if(count($all_reviews_images) > 8)
                        <li>
                            <div class="review_img">
                                 <div class="morereviews">
                                    <a href="{{ route('product.review_images', [$detailedProduct->slug]) }}" class="text-white">
                                          <h4 class="text-center m-0" >+ {{ count($all_reviews_images)-8 }} More</h4>
                                    </a>
                                 </div>
                            </div>
                        </li>
                        @endif
                        </ul> 
                    </div>
            </div>


            @foreach ($reviews as $key => $review)
            <div class="photosFromCustomers p-3">
                <div class="photoscustomerstext">Photos From Customers</div>
                    <div class="row">
                        <div class="col-sm-4 col-12">
                            <div class="d-flex align-items-center" style="gap:5px">
                            <img class="lazyload mw-100 size-60px mx-auto border p-1 customerImage"
                            src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ uploaded_asset($review->user->avatar_original) }}"
                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                <div>
                                    <div class="css-c customerName">{{ $review->user->name }}</div>
                                    <div class="verifytx"><i class="ri-verified-badge-line"></i> Verified Buyers</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="customerReview- "> {{ $review->rating }} <i class="ri-star-line"></i></span>
                                <span class="verifytx">{{ date('d-m-Y', strtotime($review->created_at)) }}</span>
                            </div>
                            <div class="customerComments">
                                <!-- <h6 class="mt-3">"Best"</h6> -->
                                <p class="css-c">{{ $review->comment }}</p> 
                                @if($review->photos != null)
                                 <ul class="revSection main_parent_review_element">
                                 @foreach (explode(',', $review->photos) as $index =>  $photo)
                                        <li class="parant_review_element">
                                            <div class="review_img rew_3">
                                                <img class="img-fit h-100 lazyload border customerImages customerReviewIMG customerReview" src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                data-src="{{ uploaded_asset($photo) }}"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                            </div>
                                        </li>
                                        @if($index == 4)
                                            @break
                                              @endif   
                                        @endforeach 
                                  </ul> 
                                  @endif
                                  <!-- <div class="d-flex gap-2 align-items-center ">
                                       <button type="button" class="write_review mt-2"><i class="ri-thumb-up-line"></i> Helpful </button>
                                       <span class="people_rev"><b>11 </b>people found this helpful</span>
                                  </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
          
            <div class="p-2 d-flex justify-content-center" style="border-top: 1px solid rgba(111, 121, 129, 0.22);;">
                     <a href="{{ route('frontend.view_all_review', [$detailedProduct->slug] )}}" class="readMore"><span >Read More Reviews</span> <i class="ri-arrow-right-s-line"></i></a> 
            </div>
        </div>
        @endif
        
       </div>
    </div>
 </section>

{{-- 
<div class="modal fade bd-example-modal-lg" id="customerImgView" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modalDilogbox modal-dialog-centered ">  
    <div class="modal-content modalcontentHeight">
        <div class="d-flex h-100" >
            <div class="col8 d-flex align-items-center backgroundimg" id="customerImgBG">
                <div id="customerReviewImg" class="carousel slide crouselControls" data-ride="false" >
                    <div class="carousel-inner" id="modalAllReviewImage">

                        <!-- <div class="carousel-item active">
                          <img class="d-block w-100" src="https://images-static.nykaa.com/prod-review/1741979077544_433fd8b1-3862-4c97-9a8a-a09779546535_1.jpeg?tr=w-145,h-145,cm-pad_resize"
                           alt="First slide">
                        </div> -->

                    </div>

                        <a class="carousel-control-prev nextPrevBtn" href="#customerReviewImg" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon prevAndNext" aria-hidden="true">
                            
                            </span>
                            <span class="sr-only">Previous</span>
                        </a>

                        <a class="carousel-control-next nextPrevBtn"  href="#customerReviewImg" role="button" data-slide="next">
                            <span class="carousel-control-next-icon prevAndNext " aria-hidden="true"> </span>
                            <span class="sr-only">Next</span>
                        </a> 
                    
                </div>
            </div>
            <div class="col4 p-4" style="width: 40%;"> 
                
                 <div class="d-flex align-items-center" style="gap:5px">
                    <img src="https://images-static.nykaa.com/prod-review/pro_review_profile_image.png" class="customerImage">
                    <div>
                            <div class="css-c customerName">Ramakrishnan</div>
                            <div class="verifytx"><i class="ri-verified-badge-line"></i> Verified Buyers</div>
                    </div>
                </div>
                <div class="d-flex mt-4 justify-content-between align-items-center">
                    <span class="customerReview- "> 5 <i class="ri-star-line"></i></span>
                    <span class="verifytx">23/10/2021</span>
                 </div>
                 <h6 class="mt-3">"Best"</h6>
                 <p class="css-c">This product is best duraline makeup mixing . This use professional also put in gel liner if liner is
                                     dry and mix any makeup products.Its very usable product</p>

                <button type="button" class="write_review mt-2 mb-4"><i class="ri-thumb-up-line"></i> Helpful </button>

                <div class="d-none d-lg-block w-75 m-auto">
                    <div class="bg-white border "> 
                        <div class="addExtrapProduct">
                            <div class="addExtrapProduct-s">
                                <a href="">
                                    <div class="productImg mb-2">
                                            <img src="https://images-static.nykaa.com/media/catalog/product/tr:h-800,w-800,cm-pad_resize/4/c/4cb9e6fTP053042_1.jpg" class="w-100" alt="">
                                    </div> 
                                    <h5 class="productTitle">Yves Saint Laurent Loveshine Lipstick - 44</h5>
                                    <div class="d-flex justify-content-center align-items-center">
                                            <span class="mrpText">MRP:</span>
                                            <del class="fw-600 text-secondary d-inline">₹1,000 </del>
                                            <span class="productMrp">₹4000</span>
                                    </div> 
                                    <h6 class="text-center itemoff">60% off</h6>
                                </a>
                            </div>
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                    <button type="button" class="AddToCart w-100" onclick="addToCart()">Add To Cart</button>
                            </div>
                        </div> 
                    </div> 
                </div> 

            </div>
        </div>
    </div> 
  </div>
</div>
 --}}

@include('frontend.new_changes.customer_review_modal')

<!-- new review section start--->