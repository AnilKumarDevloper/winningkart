@extends('frontend.layouts.app')
@php
        $total = 0;
        $total += $detailedProduct->reviews->count();
    @endphp
 
@section('content')

<section>
    <div class="container">
        <div class="mt-2">
            <nav aria-label="breadcrumb">  
                <ol class="breadcrumb d-flex bg-white mb-0 pt-0 pb-0 p-0" style="display: block; font-weight: 600;"> 
                    <li class=" text-black"><a href="#" class="text-dark">Home <i class="ri-arrow-right-s-line"></i></a></li>
                    <li><a href="#" class="text-dark">Product</a> <i class="ri-arrow-right-s-line"></i></li>
                    <li class="active" aria-current="page"><a href="#">Product Detail</a> </li>
                </ol>
            </nav> 
        </div>
        <h2 class="allReview-description">{{ $detailedProduct->name }} - All Reviews</h2>

        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <div class="infoReiew d-flex">
                                <span class="rev-w"><i class="ri-chat-smile-line"></i></span>
                            <span>Winning Kart is committed to showing genuine and verified reviews.</span>
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
                    <div class="findBy">
                          <div class="photoscustomerstext">Refine Reviews By</div>
                          <div class="size">
                                <ul class="itemSize ">
                                    <li class="itemSizeList findThis" id="finb">Verified Buyers</li>
                                    <li class="itemSizeList findby">With Images</li>
                                    <li class="itemSizeList findby">5 Star</li>
                                    <li class="itemSizeList findby">4 Star</li>
                                    <li class="itemSizeList findby">3 Star</li>
                                    <li class="itemSizeList findby">2 Star</li>
                                    <li class="itemSizeList findby">1 Star</li>
                                </ul>
                         </div>
                         <div class="mostusefull mt-4">
                                <div class="d-flex" style="gap: 10px;">
                                    <div class="filter-box d-flex justify-content-between align-items-center" id="openFilter_shade">
                                            <span>Filter shade</span>
                                            <span class="qtyitem">2 </span>
                                            <span><i class="ri-arrow-down-s-line"></i></span>
                                    </div>
                                    <div class="filter-box d-flex justify-content-between" id="openSortReviewBy">
                                            <span><i class="ri-filter-3-line"></i></span>
                                            <span>Most Useful</span> 
                                    </div>
                                </div>

                                <div class="find_box" id="filter_shade_element">
                                     <div class="filterHeader">
                                        <div class="d-flex justify-content-between align-items-xxl-stretch">
                                            <span>Filter shade (2)</span>
                                            <span id="closeFilter_shade"><i class="ri-close-large-line"></i></span>
                                        </div>
                                        <ul class="dilterDataReview p-0 mb-0">
                                            <li>
                                                <span class="colorFind"></span>
                                                <span>SOAR</span>
                                                <span><i class="ri-close-large-line"></i></span>
                                            </li>
                                            <li>
                                                <span class="colorFind"></span>
                                                <span>SOAR</span>
                                                <span><i class="ri-close-large-line"></i></span>
                                            </li> 
                                        </ul>
                                     </div>

                                     <div class="w012r">
                                        <ul class="">
                                            <li class="d-flex justify-content-between align-items-center">
                                               <div class="d-flex gap-2">
                                                    <span class="colorFind" style="background: rebeccapurple;"></span>
                                                    <span>SOAR</span>
                                               </div>
                                               <span ><i class="ri-check-line"></i></span>
                                            </li>
                                            <li class="d-flex justify-content-between align-items-center">
                                               <div class="d-flex gap-2">
                                                    <span class="colorFind" style="background: red;"></span>
                                                    <span>SOAR</span>
                                               </div>
                                               <span ><i class="ri-check-line"></i></span>
                                            </li>
                                            <li class="d-flex justify-content-between align-items-center">
                                               <div class="d-flex gap-2">
                                                    <span class="colorFind" style="background: blue;"></span>
                                                    <span>SOAR</span>
                                               </div>
                                               <span ><i class="ri-check-line"></i></span>
                                            </li>
                                            <li class="d-flex justify-content-between align-items-center">
                                               <div class="d-flex gap-2">
                                                    <span class="colorFind"></span>
                                                    <span>SOAR</span>
                                               </div>
                                               <span ><i class="ri-check-line"></i></span>
                                            </li>
                                            <li class="d-flex justify-content-between align-items-center">
                                               <div class="d-flex gap-2">
                                                    <span class="colorFind"></span>
                                                    <span>SOAR</span>
                                               </div>
                                               <span ><i class="ri-check-line"></i></span>
                                            </li>
                                            <li class="d-flex justify-content-between align-items-center">
                                               <div class="d-flex gap-2">
                                                    <span class="colorFind"></span>
                                                    <span>SOAR</span>
                                               </div>
                                               <span ><i class="ri-check-line"></i></span>
                                            </li>
                                        </ul>
                                     </div>
                                </div>

                                <div class="sortReviewBy"> 
                                    <p class="">Sort Reviews By</p>

                                    <ul class="mostfullReview"> 
                                        <li>
                                            <input class="form-check-input mostHelpfullFilter" type="radio" name="mostUseful" id="mostUseful" value="option1" >
                                            <label class="form-check-label pt-1 pl-3" for="mostUseful">
                                                Most Useful
                                            </label>
                                        </li> 
                                        <li>
                                            <input class="form-check-input mostHelpfullFilter" type="radio" name="mostHelpful" id="mostHelpful" value="option1" >
                                            <label class="form-check-label pt-1 pl-3" for="mostHelpful">
                                                Most Helpful
                                            </label>
                                        </li> 
                                        <li>
                                            <input class="form-check-input mostHelpfullFilter" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >
                                            <label class="form-check-label pt-1 pl-3" for="exampleRadios1">
                                                 Most Recent
                                            </label>
                                        </li> 
                                        <li>
                                            <input class="form-check-input mostHelpfullFilter" type="radio" name="mostRecent" id="mostRecent" value="option1" >
                                            <label class="form-check-label pt-1 pl-3" for="mostRecent">
                                                Positive First
                                            </label>
                                        </li> 
                                        <li>
                                            <input class="form-check-input mostHelpfullFilter" type="radio" name="negativeFirst" id="negativeFirst" value="option1" >
                                            <label class="form-check-label pt-1 pl-3" for="negativeFirst">
                                                Negative First
                                            </label>
                                        </li> 
                                    </ul>
                                </div>
                                <div class="reviewOverlay"> </div>

                         </div>
                    </div>

                    <div class="customerallreviews">
                    @foreach ($reviews as $key => $review)   
                        <div class="photosFromCustomers p-3"> 
                                <div class="row">
                                    <div class="col-sm-4 col-12">
                                            <div class="d-flex align-items-center" style="gap:5px" >
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
                                            <span class="customerReview- "> {{ $review->rating }}  <i class="ri-star-line"></i></span>
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
                                                                <img class="img-fit h-100 lazyload border customerReview" src="{{ static_asset('assets/img/placeholder.jpg') }}"
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
                    </div> 
                    @endif
                    
               </div>
            </div>
            <div class="col-sm-3">
                <div class="d-lg-block">
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
                                    <button type="button" class="AddToCart w-100" onclick="addToCart()" fdprocessedid="63dumo">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</section>

 <!-- Product Review Modal -->
 <div class="modal fade" id="product-review-modal">
        <div class="modal-dialog">
            <div class="modal-content" id="product-review-modal-content">

            </div>
        </div>
</div>

@include('frontend.new_changes.customer_review_modal')



@section('script')
<script>
     function product_review(product_id) {
         @if (isCustomer())
         @if ($review_status == 1)
         $.post('{{ route('product_review_modal') }}', {
             _token: '{{ @csrf_token() }}',
             product_id: product_id
            }, function(data) {
                $('#product-review-modal-content').html(data);
                $('#product-review-modal').modal('show', {
                    backdrop: 'static'
                });
                AIZ.extra.inputRating();
            });
            @else
            AIZ.plugins.notify('warning', '{{ translate("Sorry, You need to buy this product to give review.") }}');
            @endif
           
            @elseif (Auth::check() && !isCustomer())
                AIZ.plugins.notify('warning', '{{ translate("Sorry, Only customers can give review.") }}');
            @else
                let url = "{{ route('user.login') }}";
                window.location.href = url;
                // $('#login_modal').modal('show');
            @endif
        }  
</script>

<script> 
        let is_reviews_page = true; 
</script>

@endsection
 
@endsection