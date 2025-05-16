@extends('frontend.layouts.app')

@section('content')


 <section style="background-color: #f3f3f3;">
    <div class="container">
             <h2 class="allReview-description">{{ $detailedProduct->name }}- All Reviews</h2>
             <div class="row">
                <div class="col-md-9">
                    <div class="all_review_container bg-white"> 
                        <ul class="p-0 m-0 d-flex flex-wrap main_parent_review_element">
                            @if(count($detailedProduct->reviews) > 0)
                                @foreach($all_reviews_images as $review_image)
                                    @if($review_image->photos != null)
                                        @foreach (explode(',', $review_image->photos) as $index =>  $photo)
                                            <li class="parant_review_element">
                                                <div class="review_img rew_3">
                                                    <img class="img-fit h-100 lazyload border customerImages customerReviewIMG customerReview" src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ uploaded_asset($photo) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                    <input type="hidden" class="review_user_name" value="{{ $review_image->user->name ?? '' }}">
                                                    <p class="review_comment">{{ $review_image->comment ?? '' }}</p>
                                                    <p class="review_rating">{{ $review_image->rating ?? '' }}</p>
                                                    <p class="review_created_at">{{ Carbon\Carbon::parse($review_image->created_at)->format('d M, Y')}}</p>
                                                </div>
                                            </li>
                                        @endforeach  
                                    @endif
                                @endforeach
                            @endif  
                        </ul>
                    </div>
                </div>
                 <div class="col-sm-3">
                    <div class="d-lg-block bg-white">
                        <div class="bg-white border ">  
                            <div class="addExtrapProduct">
                                <div class="addExtrapProduct-s">
                                    <a href="javascript:void(0)">
                                        <div class="productImg mb-2">
                                            @if($detailedProduct->digital == 0)
                                                @foreach($detailedProduct->stocks as $key => $stock)
                                                    @if($stock->image != null)
                                                        <div class="carousel-box c-pointer rounded-0" data-variation="{{ $stock->variant }}">
                                                            <img class="lazyload w-100" src="{{ static_asset('assets/img/placeholder.jpg') }}" data-src="{{ uploaded_asset($stock->image) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                        </div>
                                                    @endif
                                                    @if($key >= 0)
                                                    @break
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div> 
                                        <h5 class="productTitle">{{ $detailedProduct->name }}</h5>
                                        @if (home_price_new($detailedProduct) != home_discounted_price_new($detailedProduct))
                                        <div class="d-flex justify-content-center align-items-center">
                                                <span class="mrpText">MRP:</span>
                                                <del class="fw-600 text-secondary d-inline">{{ home_price_new($detailedProduct) }}</del>
                                                <span class="productMrp">{{ home_discounted_price_new($detailedProduct) }}</span>
                                        </div> 
                                        <h6 class="text-center itemoff">{{ discount_in_percentage($detailedProduct) }}% off</h6>
                                        @else
                                        <div class="d-flex justify-content-center align-items-center">
                                                <span class="mrpText">MRP:</span> 
                                                <span class="productMrp">{{ home_discounted_price_new($detailedProduct) }}</span>
                                        </div>
                                        @endif
                                    </a>
                                </div>
                                @php
                                $product_url = route('product', $detailedProduct->slug);
                                if ($detailedProduct->auction_product == 1) {
                                    $product_url = route('auction-product', $product->slug);
                                }
                            @endphp
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <a href="{{ $product_url }}" type="button" class="AddToCart w-100" fdprocessedid="63dumo">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
             </div>
    </div>
 </section>

 @include('frontend.new_changes.customer_review_modal')
@endsection

@section('script')
 

@endsection