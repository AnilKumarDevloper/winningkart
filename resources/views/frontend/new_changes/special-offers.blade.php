
@extends('frontend.layouts.app')

@section('content')
 
<section>
        <div class="image-wrapper_offer">
            <a href="">
                <img src="https://images-static.nykaa.com/uploads/d2a744d2-a722-4149-91b6-49dae9b91f0c.gif" class="offer_Banner">
            </a>
        </div>
</section>



@foreach($flash_deals as $flash_deal)
<section class="mb-5 mt-3">
        <div class="container">
            <!-- Top Section -->
            <div class="pt-2 pt-lg-4 mb-2 mb-lg-4">
                <!-- Title -->
                <h1 class="fw-700 fs-20 fs-md-24 text-dark">{{ $flash_deal->title }}</h1>
            </div>

            <div class="row gutters-16">
                <!-- Flash Deals Baner & Countdown -->
                <div class="col-xxl-4 col-lg-5">
                    <div class="z-3 sticky-top-flash-deal py-3 py-lg-0 h-400px h-md-570px h-lg-400px h-xl-475px">
                        <div class="h-100 w-100 w-xl-auto" style="background-image: url('{{ uploaded_asset($flash_deal->banner) }}'); background-size: cover; background-position: center center;">
                            <div class="py-5 px-2 px-lg-3 px-xl-5">
                                <div class="bg-white">
                                    <div class="aiz-count-down-circle" end-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Flash Deals Products -->
                <div class="col-xxl-8 col-lg-7">
                    @if($flash_deal->status == 1 && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date) 
                        <div class="px-3 z-5">
                            <div class="row row-cols-xxl-4 row-cols-xl-3 row-cols-md-3 row-cols-sm-2 row-cols-2 gutters-16 border-top border-left">
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
                                        <div class="col text-center border-right border-bottom has-transition hov-shadow-out z-1">
                                            @include('frontend.'.get_setting('homepage_select').'.partials.product_box_1',['product' => $product])
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="text-center text-dark">
                            <h1 class="h3 my-4">{{ $flash_deal->title }}</h1>
                            <p class="h4">{{  translate('This offer has been expired.') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endforeach



 
<section class="proVideoSec pb-4">
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
</section>

<section>
        <div class="image-wrapper_offer">
            <a href="">
                <img src="https://images-static.nykaa.com/uploads/df8cea9f-65a9-479e-bc36-9dba008cb01f.jpg?tr=cm-pad_resize,w-1200" class="offer_Banner">
            </a>
        </div>
</section>
  
<section class="proVideoSec pb-4">
    <div class="container" style="max-width: 98%;"> 
        <div class="aiz-carousel aiz-carousel1 sm-gutters-17" data-items="3" data-xxl-items="3" data-xl-items="3"
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

        </div>
    </div>
</section>

<section class="proVideoSec pb-4">
    <div class="container" style="max-width: 90%;"> 

        <div class="aiz-carousel aiz-carousel1 sm-gutters-17" data-items="6" data-xxl-items="6" data-xl-items="6"
                data-lg-items="6" data-md-items="4" data-sm-items="2" data-xs-items="1" data-arrows="true"
                data-dots="false" data-autoplay="false" data-infinite="true">

            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt p-2"> 
                         <div class="i_container">
                            <a href="">  
                                    <div class="foo_img">  
                                    <span class="css-discribe">BESTSELLER</span>
                                        <img class="col-md-12 vd_radius23 bestsellerImg" 
                                            src="https://images-static.nykaa.com/media/catalog/product/f/5/f530dd8ANAST00000080_1.jpg?tr=cm-pad_resize,w-500,h-500"
                                            alt="Product 1" width="100%"  >
                                        <div class="css-offerPrice">
                                                <span class="actual-rating"> 4.4★</span>
                                                <span class="rating-count"> /5  (76k)</span>
                                        </div>
                                    </div> 
                            </a> 
                         </div> 
                         <div>
                            <div class="header_name">
                                 <p class="product-name mb-0">Anastasia Beverly Hills Dipbrow Pomade</p>
                            </div>
                             <div class="css-4">8 Shades</div>
                             <div class="css-19qana0">
                                <div class="sale-price">₹2480</div>
                            </div> 
                        </div>
                </div>
            </div> 
            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt p-2"> 
                         <div class="i_container">
                            <a href="">  
                                    <div class="foo_img">  
                                    <span class="css-discribe">BESTSELLER</span>
                                        <img class="col-md-12 vd_radius23 bestsellerImg" 
                                            src="https://images-static.nykaa.com/media/catalog/product/0/0/0060d708901030561924-new_1.jpg?tr=cm-pad_resize,w-500,h-500"
                                            alt="Product 1" width="100%"  >
                                        <div class="css-offerPrice">
                                                <span class="actual-rating"> 4.4★</span>
                                                <span class="rating-count"> /5  (76k)</span>
                                        </div>
                                    </div> 
                            </a> 
                         </div> 
                         <div>
                            <div class="header_name">
                                 <p class="product-name mb-0">Anastasia Beverly Hills Dipbrow Pomade</p>
                            </div>
                             <div class="css-4">8 Shades</div>
                             <div class="css-19qana0">
                                <div class="sale-price">₹2480</div>
                            </div> 
                        </div>
                </div>
            </div> 
            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt p-2"> 
                         <div class="i_container">
                            <a href="">  
                                    <div class="foo_img">  
                                    <span class="css-discribe">BESTSELLER</span>
                                        <img class="col-md-12 vd_radius23 bestsellerImg" 
                                            src="https://images-static.nykaa.com/media/catalog/product/8/9/8904052433514-1_1.png?tr=cm-pad_resize,w-500,h-500"
                                            alt="Product 1" width="100%"  >
                                        <div class="css-offerPrice">
                                                <span class="actual-rating"> 4.4★</span>
                                                <span class="rating-count"> /5  (76k)</span>
                                        </div>
                                    </div> 
                            </a> 
                         </div> 
                         <div>
                            <div class="header_name">
                                 <p class="product-name mb-0">Anastasia Beverly Hills Dipbrow Pomade</p>
                            </div>
                             <div class="css-4">8 Shades</div>
                             <div class="css-19qana0">
                                <div class="sale-price">₹2480</div>
                            </div> 
                        </div>
                </div>
            </div>
            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt p-2"> 
                         <div class="i_container">
                            <a href="">  
                                    <div class="foo_img">  
                                    <span class="css-discribe">BESTSELLER</span>
                                        <img class="col-md-12 vd_radius23 bestsellerImg" 
                                            src="https://images-static.nykaa.com/media/catalog/product/2/3/23292eaNYPAC00001123-new1.jpg?tr=cm-pad_resize,w-500,h-500"
                                            alt="Product 1" width="100%"  >
                                        <div class="css-offerPrice">
                                                <span class="actual-rating"> 4.4★</span>
                                                <span class="rating-count"> /5  (76k)</span>
                                        </div>
                                    </div> 
                            </a> 
                         </div> 
                         <div>
                            <div class="header_name">
                                 <p class="product-name mb-0">Anastasia Beverly Hills Dipbrow Pomade</p>
                            </div>
                             <div class="css-4">20ml</div>
                             <div class="css-19qana0">
                                <div class="sale-price">₹240</div>
                            </div> 
                        </div>
                </div>
            </div>
            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt p-2"> 
                         <div class="i_container">
                            <a href="">  
                                    <div class="foo_img">  
                                    <span class="css-discribe">BESTSELLER</span>
                                        <img class="col-md-12 vd_radius23 bestsellerImg" 
                                            src="https://images-static.nykaa.com/media/catalog/product/7/b/7b8686c8904245710958_1.jpg?tr=cm-pad_resize,w-500,h-500"
                                            alt="Product 1" width="100%"  >
                                        <div class="css-offerPrice">
                                                <span class="actual-rating"> 4.4★</span>
                                                <span class="rating-count"> /5  (76k)</span>
                                        </div>
                                    </div> 
                            </a> 
                         </div> 
                         <div>
                            <div class="header_name">
                                 <p class="product-name mb-0">Anastasia Beverly Hills Dipbrow Pomade</p>
                            </div>
                             <div class="css-4">8 Shades</div>
                             <div class="css-19qana0">
                                <div class="sale-price">₹480</div>
                            </div> 
                        </div>
                </div>
            </div>
            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt p-2"> 
                         <div class="i_container">
                            <a href="">  
                                    <div class="foo_img">  
                                    <span class="css-discribe">BESTSELLER</span>
                                        <img class="col-md-12 vd_radius23 bestsellerImg" 
                                            src="https://images-static.nykaa.com/media/catalog/product/2/3/23292eaNYPAC00001123-new1.jpg?tr=cm-pad_resize,w-500,h-500"
                                            alt="Product 1" width="100%"  >
                                        <div class="css-offerPrice">
                                                <span class="actual-rating"> 4.4★</span>
                                                <span class="rating-count"> /5  (76k)</span>
                                        </div>
                                    </div> 
                            </a> 
                         </div> 
                         <div>
                            <div class="header_name">
                                 <p class="product-name mb-0">Anastasia Beverly Hills Dipbrow Pomade</p>
                            </div>
                             <div class="css-4">8 Shades</div>
                             <div class="css-19qana0">
                                <div class="sale-price">₹2480</div>
                            </div> 
                        </div>
                </div>
            </div>
            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt p-2"> 
                         <div class="i_container">
                            <a href="">  
                                    <div class="foo_img">  
                                    <span class="css-discribe">BESTSELLER</span>
                                        <img class="col-md-12 vd_radius23 bestsellerImg" 
                                            src="https://images-static.nykaa.com/media/catalog/product/8/9/8904052433514-1_1.png?tr=cm-pad_resize,w-500,h-500"
                                            alt="Product 1" width="100%"  >
                                        <div class="css-offerPrice">
                                                <span class="actual-rating"> 4.4★</span>
                                                <span class="rating-count"> /5  (76k)</span>
                                        </div>
                                    </div> 
                            </a> 
                         </div> 
                         <div>
                            <div class="header_name">
                                 <p class="product-name mb-0">Anastasia Beverly Hills Dipbrow Pomade</p>
                            </div>
                             <div class="css-4">8 Shades</div>
                             <div class="css-19qana0">
                                <div class="sale-price">₹240</div>
                            </div> 
                        </div>
                </div>
            </div>
             

        </div>
    </div>
</section>
 

<section>
        <div class="image-wrapper_offer">
            <a href="">
                <img src="https://images-static.nykaa.com/uploads/ac8f8bcb-ee10-4b9b-94e0-b8c681c23fbb.jpg?tr=cm-pad_resize,w-1200" class="offer_Banner">
            </a>
        </div>
</section>

<section class="proVideoSec pb-4">
    <div class="container" style="max-width: 98%;"> 
        <div class="aiz-carousel aiz-carousel1 sm-gutters-17" data-items="3" data-xxl-items="3" data-xl-items="3"
                data-lg-items="3" data-md-items="2" data-sm-items="2" data-xs-items="1" data-arrows="true"
                data-dots="false" data-autoplay="false" data-infinite="true">

            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt"> 
                        <a href="">
                        <img class="col-md-12 vd_radius23" 
                            src="https://images-static.nykaa.com/uploads/a929c4bb-927c-4eb2-96fb-1beace2fe70e.jpg?tr=cm-pad_resize,w-500"
                            alt="Product 1" width="100%" height="100%">
                        </a> 
                </div>
            </div> 
            <div class="carousel-box position-relative p-0 has-transition">
                <a href="">
                <img class="col-md-12 vd_radius23" 
                    src="https://images-static.nykaa.com/uploads/b4be8215-aaec-4249-87d4-ccf676fa5fdf.jpg?tr=cm-pad_resize,w-500" 
                    alt="Product 1" width="100%" height="100%">
                </a> 
            </div> 
            <div class="carousel-box position-relative p-0 has-transition">
                <a href="">
                <img class="col-md-12 vd_radius23" 
                    src="https://images-static.nykaa.com/uploads/d3891448-12f5-4d72-a07d-3d1a83550881.jpg?tr=cm-pad_resize,w-500"
                    alt="Product 1" width="100%" height="100%">
                </a>  
            </div>  

            <div class="carousel-box position-relative p-0 has-transition">
                <a href="">
                <img class="col-md-12 vd_radius23" 
                    src="https://images-static.nykaa.com/uploads/0456153c-7214-4ad9-8648-3ed66226538e.jpg?tr=cm-pad_resize,w-500"
                    alt="Product 1" width="100%" height="100%">
                </a>  
            </div>   

        </div>
    </div>
</section>

<section class="proVideoSec pb-4">
    <div class="container" style="max-width: 90%;"> 

        <div class="aiz-carousel aiz-carousel1 sm-gutters-17" data-items="6" data-xxl-items="6" data-xl-items="6"
                data-lg-items="6" data-md-items="4" data-sm-items="2" data-xs-items="1" data-arrows="true"
                data-dots="false" data-autoplay="false" data-infinite="true">

            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt p-2"> 
                         <div class="i_container">
                            <a href="">  
                                    <div class="foo_img">  
                                    <span class="css-discribe">BESTSELLER</span>
                                        <img class="col-md-12 vd_radius23 bestsellerImg" 
                                            src="https://images-static.nykaa.com/media/catalog/product/e/3/e3f8a3cNEUTR00000124_1030524.jpg?tr=cm-pad_resize,w-500,h-500"
                                            alt="Product 1" width="100%"  >
                                        <div class="css-offerPrice">
                                                <span class="actual-rating"> 4.4★</span>
                                                <span class="rating-count"> /5  (76k)</span>
                                        </div>
                                    </div> 
                            </a> 
                         </div> 
                         <div>
                            <div class="header_name">
                                 <p class="product-name mb-0">Neutrogena Ultrasheer SPF50+ PA+++ Ultra Li</p>
                            </div>
                             <div class="css-4">2 Pcs</div>
                             <div class="css-19qana0">
                                <div class="sale-price">₹598</div>
                            </div> 
                        </div>
                </div>
            </div> 
            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt p-2"> 
                         <div class="i_container">
                            <a href="">  
                                    <div class="foo_img">  
                                    <span class="css-discribe">BESTSELLER</span>
                                        <img class="col-md-12 vd_radius23 bestsellerImg" 
                                            src="https://images-static.nykaa.com/media/catalog/product/2/7/2704ab7THEDE00000088_1.jpg?tr=cm-pad_resize,w-500,h-500"
                                            alt="Product 1" width="100%"  >
                                        <div class="css-offerPrice">
                                                <span class="actual-rating"> 4.4★</span>
                                                <span class="rating-count"> /5  (76k)</span>
                                        </div>
                                    </div> 
                            </a> 
                         </div> 
                         <div>
                            <div class="header_name">
                                 <p class="product-name mb-0">Anastasia Beverly Hills Dipbrow Pomade</p>
                            </div>
                             <div class="css-4">30ml</div>
                             <div class="css-19qana0">
                                <div class="sale-price">₹2480</div>
                            </div> 
                        </div>
                </div>
            </div> 
            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt p-2"> 
                         <div class="i_container">
                            <a href="">  
                                    <div class="foo_img">  
                                    <span class="css-discribe">BESTSELLER</span>
                                        <img class="col-md-12 vd_radius23 bestsellerImg" 
                                            src="https://images-static.nykaa.com/media/catalog/product/3/6/368f5ad12205_H-8901030902413.jpg?tr=cm-pad_resize,w-500,h-500"
                                            alt="Product 1" width="100%"  >
                                        <div class="css-offerPrice">
                                                <span class="actual-rating"> 4.4★</span>
                                                <span class="rating-count"> /5  (76k)</span>
                                        </div>
                                    </div> 
                            </a> 
                         </div> 
                         <div>
                            <div class="header_name">
                                 <p class="product-name mb-0">Anastasia Beverly Hills Dipbrow Pomade</p>
                            </div>
                             <div class="css-4">4 Size</div>
                             <div class="css-19qana0">
                                <div class="sale-price">₹440</div>
                            </div> 
                        </div>
                </div>
            </div>
            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt p-2"> 
                         <div class="i_container">
                            <a href="">  
                                    <div class="foo_img">  
                                    <span class="css-discribe">BESTSELLER</span>
                                        <img class="col-md-12 vd_radius23 bestsellerImg" 
                                            src="https://images-static.nykaa.com/media/catalog/product/e/3/e3f8a3cNEUTR00000124_1030524.jpg?tr=cm-pad_resize,w-500,h-500"
                                            alt="Product 1" width="100%"  >
                                        <div class="css-offerPrice">
                                                <span class="actual-rating"> 4.4★</span>
                                                <span class="rating-count"> /5  (76k)</span>
                                        </div>
                                    </div> 
                            </a> 
                         </div> 
                         <div>
                            <div class="header_name">
                                 <p class="product-name mb-0">Neutrogena Ultrasheer SPF50+ PA+++ Ultra Li</p>
                            </div>
                             <div class="css-4">2 Pcs</div>
                             <div class="css-19qana0">
                                <div class="sale-price">₹598</div>
                            </div> 
                        </div>
                </div>
            </div> 
            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt p-2"> 
                         <div class="i_container">
                            <a href="">  
                                    <div class="foo_img">  
                                    <span class="css-discribe">BESTSELLER</span>
                                        <img class="col-md-12 vd_radius23 bestsellerImg" 
                                            src="https://images-static.nykaa.com/media/catalog/product/7/b/7b8686c8904245710958_1.jpg?tr=cm-pad_resize,w-500,h-500"
                                            alt="Product 1" width="100%"  >
                                        <div class="css-offerPrice">
                                                <span class="actual-rating"> 4.4★</span>
                                                <span class="rating-count"> /5  (76k)</span>
                                        </div>
                                    </div> 
                            </a> 
                         </div> 
                         <div>
                            <div class="header_name">
                                 <p class="product-name mb-0">Anastasia Beverly Hills Dipbrow Pomade</p>
                            </div>
                             <div class="css-4">8 Shades</div>
                             <div class="css-19qana0">
                                <div class="sale-price">₹480</div>
                            </div> 
                        </div>
                </div>
            </div>
            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt p-2"> 
                         <div class="i_container">
                            <a href="">  
                                    <div class="foo_img">  
                                    <span class="css-discribe">BESTSELLER</span>
                                        <img class="col-md-12 vd_radius23 bestsellerImg" 
                                            src="https://images-static.nykaa.com/media/catalog/product/2/3/23292eaNYPAC00001123-new1.jpg?tr=cm-pad_resize,w-500,h-500"
                                            alt="Product 1" width="100%"  >
                                        <div class="css-offerPrice">
                                                <span class="actual-rating"> 4.4★</span>
                                                <span class="rating-count"> /5  (76k)</span>
                                        </div>
                                    </div> 
                            </a> 
                         </div> 
                         <div>
                            <div class="header_name">
                                 <p class="product-name mb-0">Anastasia Beverly Hills Dipbrow Pomade</p>
                            </div>
                             <div class="css-4">8 Shades</div>
                             <div class="css-19qana0">
                                <div class="sale-price">₹2480</div>
                            </div> 
                        </div>
                </div>
            </div>
            <div class="carousel-box position-relative p-0 has-transition">
                <div class="full_elemnt p-2"> 
                         <div class="i_container">
                            <a href="">  
                                    <div class="foo_img">  
                                    <span class="css-discribe">BESTSELLER</span>
                                        <img class="col-md-12 vd_radius23 bestsellerImg" 
                                            src="https://images-static.nykaa.com/media/catalog/product/e/3/e3f8a3cNEUTR00000124_1030524.jpg?tr=cm-pad_resize,w-500,h-500"
                                            alt="Product 1" width="100%"  >
                                        <div class="css-offerPrice">
                                                <span class="actual-rating"> 4.4★</span>
                                                <span class="rating-count"> /5  (76k)</span>
                                        </div>
                                    </div> 
                            </a> 
                         </div> 
                         <div>
                            <div class="header_name">
                                 <p class="product-name mb-0">Neutrogena Ultrasheer SPF50+ PA+++ Ultra Li</p>
                            </div>
                             <div class="css-4">2 Pcs</div>
                             <div class="css-19qana0">
                                <div class="sale-price">₹598</div>
                            </div> 
                        </div>
                </div>
            </div> 
             

        </div>
    </div>
</section>

@endsection

@section('script')
 

@endsection