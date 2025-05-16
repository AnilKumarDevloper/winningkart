 
  @php
        $total = 0;
        $total += $detailedProduct->reviews->count();
    @endphp
  
 <section >
    <div class="productDescription">
         <h2 class="css-description">Product Description</h2> 
        <div class="card p-3">
             <div class="tab-container">
                    <div class="tabs bg-white">
                        <button class="tab-link tab_link" onclick="openTab(event, 'description')">Description</button> 
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
                                  <div class="d-flex gap-2 align-items-center ">
                                       <button type="button" class="write_review mt-2"><i class="ri-thumb-up-line"></i> Helpful </button>
                                       <span class="people_rev"><b>11 </b>people found this helpful</span>
                                  </div>
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
  
@include('frontend.new_changes.customer_review_modal') 
 