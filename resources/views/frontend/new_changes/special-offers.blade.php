
@extends('frontend.layouts.app') 
@section('content') 
<!-- <section>
        <div class="image-wrapper_offer">
            <a href="">
                <img src="https://images-static.nykaa.com/uploads/d2a744d2-a722-4149-91b6-49dae9b91f0c.gif" class="offer_Banner">
            </a>
        </div>
</section>  -->
<!-- <section class="proVideoSec pb-4">
    <div class="container" style="max-width: 90%;">
            <h2 class="offer_title">Top-To-Toe Treats</h2>

        <div class="aiz-carousel aiz-carousel1 sm-gutters-17" data-items="5" data-xxl-items="5" data-xl-items="5"
                data-lg-items="5" data-md-items="4" data-sm-items="2" data-xs-items="1" data-arrows="true"
                data-dots="false" data-autoplay="false" data-infinite="true">

            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt"> 
                        <a href="">
                        <img class="col-md-12 vd_radius23 toeTreats_img" 
                            src="https://images-static.nykaa.com/uploads/5543fae2-62ed-4acd-a105-9bd82c02b3ca.jpg?tr=cm-pad_resize,w-300"
                            alt="Product 1" width="100%" height="100%">
                        </a>
                        <div class="title_wraps">
                            <span class="title-text">Eyeshadows</span>
                            <div class="description_text">Under ₹499</div>
                        </div> 
                </div>
            </div> 
            <div class="carousel-box position-relative p-0 has-transition">
                <a href="">
                <img class="col-md-12 vd_radius23 toeTreats_img" 
                    src="https://images-static.nykaa.com/uploads/1b526a64-61fd-4bcf-b492-737945e9d2c8.jpg?tr=cm-pad_resize,w-300" 
                    alt="Product 1" width="100%" height="100%">
                </a>
                <div class="title_wraps">
                        <span class="title-text">Eyeshadows</span>
                        <div class="description_text">Under ₹499</div>
                </div> 
            </div> 
            <div class="carousel-box position-relative p-0 has-transition">
                <a href="">
                <img class="col-md-12 vd_radius23 toeTreats_img" 
                    src="https://images-static.nykaa.com/uploads/3bf933d7-818b-4eb1-bdba-5e8b0d80143e.jpg?tr=cm-pad_resize,w-300"
                    alt="Product 1" width="100%" height="100%">
                </a> 
                <div class="title_wraps">
                        <span class="title-text">Eyeshadows</span>
                        <div class="description_text">Under ₹499</div>
                </div> 
            </div>  

            <div class="carousel-box position-relative p-0 has-transition">
                <a href="">
                <img class="col-md-12 vd_radius23 toeTreats_img" 
                    src="https://images-static.nykaa.com/uploads/5109c5d0-416d-4f82-b7b1-e4efcdfbde8d.jpg?tr=cm-pad_resize,w-300"
                    alt="Product 1" width="100%" height="100%">
                </a> 
                <div class="title_wraps">
                        <span class="title-text">Eyeshadows</span>
                        <div class="description_text">Under ₹499</div>
                </div> 
            </div>  

            <div class="carousel-box position-relative p-0 has-transition">
                <a href="">
                <img class="col-md-12 vd_radius23 toeTreats_img" 
                    src="https://images-static.nykaa.com/uploads/622f0dc1-cd37-4cf1-a46a-d19c3ff3a51e.jpg?tr=cm-pad_resize,w-300"
                    alt="Product 1" width="100%" height="100%">
                </a> 
                <div class="title_wraps">
                        <span class="title-text">Eyeshadows</span>
                        <div class="description_text">Under ₹499</div>
                </div> 
            </div>  

            <div class="carousel-box position-relative p-0 has-transition">
                <a href="">
                <img class="col-md-12 vd_radius23 toeTreats_img" 
                    src="https://images-static.nykaa.com/uploads/33444c24-d045-44c0-be2e-35253d8ef0f5.jpg?tr=cm-pad_resize,w-300"
                    alt="Product 1" width="100%" height="100%">
                </a> 
                <div class="title_wraps">
                        <span class="title-text">Eyeshadows</span>
                        <div class="description_text">Under ₹499</div>
                </div> 
            </div>  

            <div class="carousel-box position-relative p-0 has-transition">
                <a href="">
                <img class="col-md-12 vd_radius23 toeTreats_img" 
                    src="https://images-static.nykaa.com/uploads/5543fae2-62ed-4acd-a105-9bd82c02b3ca.jpg?tr=cm-pad_resize,w-300" alt="Product 1" width="100%" height="100%">
                </a> 
                <div class="title_wraps">
                        <span class="title-text">Eyeshadows</span>
                        <div class="description_text">Under ₹499</div>
                </div> 
            </div>  

        </div>
    </div>
</section> -->
 @if(count($flash_deals) > 0)
@foreach($flash_deals as $flash_deal)
    <section>
        <div class="image-wrapper_offer">
            <a href="">
                <img src="{{ uploaded_asset($flash_deal->banner) }}" class="offer_Banner">
            </a>
        </div>
    </section> 
    <section class="proVideoSec pb-4">
        <div class="container" style="max-width: 98%;"> 
            <!-- <div class="aiz-carousel aiz-carousel1 sm-gutters-17" data-items="3" data-xxl-items="3" data-xl-items="3"
                    data-lg-items="3" data-md-items="2" data-sm-items="2" data-xs-items="1" data-arrows="true"
                    data-dots="false" data-autoplay="false" data-infinite="true"> 
                <div class="carousel-box position-relative p-0 has-transition">
                    <div class="full_elemnt"> 
                            <a href="">
                            <img class="col-md-12 vd_radius23" 
                                src="https://images-static.nykaa.com/uploads/f35b5e01-75ae-496b-99b3-4222ece98d1c.jpg?tr=cm-pad_resize,w-500"
                                alt="Product 1" width="100%" height="100%">
                            </a> 
                    </div>
                </div> 
                <div class="carousel-box position-relative p-0 has-transition">
                    <a href="">
                    <img class="col-md-12 vd_radius23" 
                        src="https://images-static.nykaa.com/uploads/15f2baaa-3108-4b84-8c3c-411cd8031668.jpg?tr=cm-pad_resize,w-500" 
                        alt="Product 1" width="100%" height="100%">
                    </a> 
                </div> 
                <div class="carousel-box position-relative p-0 has-transition">
                    <a href="">
                    <img class="col-md-12 vd_radius23" 
                        src="https://images-static.nykaa.com/uploads/6d0763a6-01c9-47c0-8498-4033cf28a59e.jpg?tr=cm-pad_resize,w-500"
                        alt="Product 1" width="100%" height="100%">
                    </a>  
                </div>   
                <div class="carousel-box position-relative p-0 has-transition">
                    <a href="">
                    <img class="col-md-12 vd_radius23" 
                        src="https://images-static.nykaa.com/uploads/f1b5e72b-9753-4424-ad84-6bccaa472004.jpg?tr=cm-pad_resize,w-500"
                        alt="Product 1" width="100%" height="100%">
                    </a>  
                </div>   
            </div> -->
        </div>
    </section> 
    <section class="proVideoSec pb-4">
        <div class="container" style="max-width: 90%;">  
            <div class="aiz-carousel aiz-carousel1 sm-gutters-17" data-items="4" data-xxl-items="4" data-xl-items="4"
                    data-lg-items="4" data-md-items="4" data-sm-items="2" data-xs-items="1" data-arrows="true"
                    data-dots="true" data-autoplay="true" data-infinite="true">  
                @foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product)
                    @php
                        $product = get_single_product($flash_deal_product->product_id);
                    @endphp
                    @if ($product != null && $product->published != 0)
                        @php
                            $product_url = route('product', $product->slug);
                            if($product->auction_product == 1) {
                                $product_url = route('auction-product', $product->slug);
                            }
                        @endphp
                        <div class="carousel-box position-relative p-0 has-transition"> 
                            @include('frontend.new_changes.partials.single_product_box',['product' => $product])
                        </div>
                    @endif
                @endforeach   
            </div>
        </div>
    </section> 
@endforeach
@else
<section>
        <div class="image-wrapper_offer">
            <a href="">
                <img src="https://images-static.nykaa.com/uploads/d2a744d2-a722-4149-91b6-49dae9b91f0c.gif" class="offer_Banner">
            </a>
        </div>
</section> 
@endif
 
@endsection 
@section('script') 
@endsection