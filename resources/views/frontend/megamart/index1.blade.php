@extends('frontend.layouts.app')

@section('content')
    <style>
        #section_featured .slick-slider .slick-list{
            background: #fff;
        }
        #section_featured .slick-slider .slick-list .slick-slide,
        #section_best_selling .slick-slider .slick-list .slick-slide,
        #section_newest .slick-slider .slick-list .slick-slide {
            margin-bottom: -5px;
        }
        .hov-animate-outline:hover::before,
        .hov-animate-outline:hover::after {
            width: calc(100% - 2px);
        }
        @media (max-width: 575px){
            #section_featured .slick-slider .slick-list .slick-slide {
                margin-bottom: -4px;
            }
        }
        
        .list-group-item {
    
    width: 246px!important;
}
        
     
   
        
.winPro {
    background: linear-gradient(0deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), url(../public/assets/img/bg-img.png);
    padding-block: 2rem;
} 




.mainSection {
            width: 100%;
            margin: 0 auto;
            margin-block: 50px;
            background: #f9fbf7;
        }

        .headingText {
            font-family: "Montserrat", sans-serif;
            font-size: 20px;
            font-weight: 700;
        }

        .tabSec {
            background: #f7f7f7;
            box-shadow: rgba(14, 63, 126, 0.06) 0px 0px 0px 1px, rgba(42, 51, 70, 0.03) 0px 1px 1px -0.5px, rgba(42, 51, 70, 0.04) 0px 2px 2px -1px, rgba(42, 51, 70, 0.04) 0px 3px 3px -1.5px, rgba(42, 51, 70, 0.03) 0px 5px 5px -2.5px, rgba(42, 51, 70, 0.03) 0px 10px 10px -5px, rgba(42, 51, 70, 0.03) 0px 24px 24px -8px;
        }

        .tabSection {
            display: flex;
            flex-wrap: wrap;
        }

        .tabcolumn {
            flex: 25%;
            padding: 20px;
        }

        .videoBox {
            width: 100%;
            height: 100%;
        }

        @media screen and (max-width: 992px) {
            .tabcolumn {
                flex: 50%;
            }

            .tabSec {
                box-shadow: none;
            }

            .gallerySec {
                padding-inline: 0rem !important;
            }

            .tSellerCard {
                width: 19.625rem !important;
                margin-bottom: 1rem !important;
            }


        }

        @media screen and (max-width: 600px) {
            .tabSection {
                flex-direction: column;
            }
        }

        .benefitsRow {
            border-right: .5px solid #dfd8d8;
        }

        .benefitsRow img{
            height: 18px;
        }

        .benefitsRow span {
            font-size: 16px;
            font-weight: 500;
            color: #0a0c0c;
        }

        .stateImgsec {
            width: 16rem;
            height: 20.313rem;
            background: url('img/delhi.jpg');
            background-position: center;
            background-size: cover;
            background-image: linear-gradient(transparent, #000000), url('../frontend/img/delhi.jpg');
            display: flex;
            justify-content: end;
            align-items: center;
            flex-direction: column;
        }

        .proImages {
            width: 100%;
            height: 9.375rem;
        }

        .proBtn {
            background-color: #ef7528;
            padding-inline: 1.25rem;
            padding-block: 0.125rem;
            text-decoration: none;
            border-radius: 20px;
        }

        .proBtn span {
            font-size: 13px;
        }

        .heartIcon {
            border: .5px solid #ef7528;
            border-radius: 50px;
            padding-left: 2px;
            padding-bottom: 2px;
        }

        .stateImgs {
            width: 276px;
            height: 309px;
        }

        .tabText {
            color: #ef7528;
            font-size: 16px;
            font-weight: 500;
            text-decoration: underline;
        }

        .tabText:hover {
            color: #ef7528;
        }

        .tabText2 {
            color: #797979;
            font-size: 16px;
            font-weight: 500;
        }

        .tabText2:hover {
            color: #ef7528;
        }

        .martext {
            font-size: 13px;
            font-weight: 300;
        }

        .viewBtnDiv {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-block: 2rem;
        }

        .viewBtn {
            border: .5px solid #555454;
            outline: none;
            border-radius: 20px;
            padding-inline: 1.2rem;
            font-size: 16px;
            font-weight: 500;
        }

        .topSelImg {
            width: 98px;
            height: 25px;
            margin: 0 auto;
        }

        .topSelImg img {
            width: 100%;
            height: 100%;

        }

        .tSellerCard {
            width: 16.625rem;
            height: 19rem;
            display: grid;
            place-items: center;
            border: 1px solid #ef7528;
            border-radius: 10px !important;
        }

        .sellerCardTitle {
            font-size: 25px;
            font-weight: 600;
            font-family: "Inter", sans-serif;
            letter-spacing: .7px;
        }

        .sellerCardIcon>i {
            font-size: 14px;
            color: #ef7528;
        }

        .topSelBtn {
            background-color: #ffe2ce;
            padding-inline: 1.2rem;
            padding-block: .2rem;
            border-radius: 20px;
            color: #ef7528;
            text-decoration: none;
            font-family: "Inter", sans-serif;
            font-size: 13px;
            font-weight: 600;
        }

        .listgtitle {
            font-size: 18px;
            font-family: "Inter", sans-serif;
            font-weight: 600;
        }

        .listgsubtitle {
            font-size: 13px;
            color: #fc6000;
            font-weight: 400;

        }

        .reviewImg {
            background-color: #000000;
            overflow: hidden;
            width: 100px;
            height: 100px;
            background: url(../frontend/img/client.jpg);
            background-position: top center;
            background-size: cover;
        }

        .reviewDiv {
            display: grid;
            place-items: center;
        }

        .clientsreviewSec {
            background: #ef7528;
        }

        .clientsreview {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            column-gap: 1rem;
        }

        .marqueeSection {
            width: 100%;
            overflow: hidden;
        }

        .statePic {
            display: flex;
            align-items: end;
            justify-content: center;
        }

        .productImgs {
            width: 16rem;
            box-shadow: rgba(239, 117, 40, 0.25) 0px 6px 12px -2px, rgba(239, 117, 40, 0.25) 0px 3px 7px -3px;
        }

        .shopImgGroup {
            display: flex;

        }

        .winCartSec {
            background: #fafafa;
        }

      
        .winProducts {
            width: 20.359rem;
            height: 11.688rem;
        }

        .winCartDiv {
            width: 16.688rem;
        }

        .hmDiv {
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            border-radius: .4rem;
        }

        /* GALLERY SECTION START */
        .galleryBox .galleryImg {
            list-style: none;
            padding: 0;
            margin: 10px;
        }

        .grid-wrapBox {
            position: relative;
            margin: 0;
            padding: 10px;
        }

        .grid-wrapBox .galleryBox {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, auto));
            grid-auto-flow: dense;
            grid-gap: 2px;
            justify-content: center;
            margin: 0 auto;
            padding: 0;
        }

        .grid-wrapBox .galleryBox .galleryImg {
            position: relative;
        }

        .grid-wrapBox .galleryBox .galleryImg:nth-child(1) {
            grid-row: span 2;
            grid-column: span 4;
        }

        .grid-wrapBox .galleryBox .galleryImg:nth-child(2) {
            grid-row: span 2;
            grid-column: span 4;
        }

        .grid-wrapBox .galleryBox .galleryImg:nth-child(3) {
            grid-row: span 3;
            grid-column: span 4;
        }

        .grid-wrapBox .galleryBox .galleryImg:nth-child(4) {
            grid-row: span 1;
            grid-column: span 7;
        }

        .grid-wrapBox .galleryBox .galleryImg:nth-child(5) {
            grid-row: span 2;
            grid-column: span 3;
        }

        .grid-wrapBox .galleryBox .galleryImg:nth-child(6) {
            grid-row: span 1;
            grid-column: span 7;
        }

        .grid-wrapBox .galleryBox img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .grid-wrapBox .galleryBox .galleryImg:hover {
            filter: opacity(0.8);
            transition: .2s;
            cursor: pointer;
        } 

      .proCate{
        position: absolute; left: 0; bottom: 0;
        background: rgba(0, 0, 0,0.7);
        color: white;
        border-radius: 15px;
        padding-inline: 1rem;
        margin: 1rem;
        border: .5px solid black;
      }

        .galleryTitle {
            margin-inline: 1rem;
            font-size: 24px;
        }

        .gallerySec {
            padding-inline: 5rem;
        }

        /* TESTIMONIAL SECTION START */

        .testimonials-section {
            width: 100%;
            padding: 10px 8%;
            background: #ea7427;
            margin-top: 50px;
        }

        .testimonials-section .section-header {
            max-width: 700px;
            text-align: center;
            margin: 30px auto 40px;
        }

        .section-header h1 {
            position: relative;
            font-size: 30px;
            color: #fff;
            font-family: "Montserrat", sans-serif;
        }

        .testimonials-container {
            position: relative;
        }

        .testimonials-container .testimonial-card {
            padding: 5px;
        }

        .testimonial-card .test-card-body {
            background-color: #fff;
            box-shadow: 2px 2px 20px rgba(0, 0, 0, 0.12);
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border-radius: 10px;
        }

        .test-card-body .quote {
            display: flex;
            align-items: center;
        }

        .test-card-body .quote i {
            font-size: 45px;
            color: #f2f2f2;
            margin-right: 20px;
        }

        .test-card-body .quote h2 {
            color: var(--heading-clr);
        }

        .test-card-body p {
            margin: 10px 0px 15px;
            font-size: 14px;
            line-height: 1.5;
            color: var(--text-clr);
        }

        .test-card-body .ratings {
            margin-top: 20px;
        }

        .test-card-body .ratings i {
            font-size: 14px;
            color: #fc6000;
            cursor: pointer;
        }

        .testimonial-card .profile {
            display: flex;
            align-items: center;
            margin-top: 25px;
        }

        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile .profile-desc {
            display: flex;
            flex-direction: column;
        }

        .profile-desc span:nth-child(1) {
            font-size: 18px;
            font-weight: 500;
            color: var(--primary-clr);
        }


        .owl-nav {
            position: absolute;
            right: 20px;
            bottom: -10px;
        }

        .owl-nav button {
            border-radius: 50% !important;
        }

        .owl-nav .owl-prev i,
        .owl-nav .owl-next i {
            padding: 10px !important;
            border-radius: 50%;
            font-size: 18px !important;
            background-color: #e0c7c7 !important;
            color: #fff;
            cursor: pointer;
            transition: 0.4s;
        }

        .owl-nav .owl-prev i:hover,
        .owl-nav .owl-next i:hover {
            background-color: #b92a2a !important;
            color: #fff;
        }

        .owl-dots {
            margin-top: 15px;
        }

        .hmbg{
            background: #f6761e;
            width: 35px;
            height: 35px;
        }

        /* MEDIA QUERY START */
        @media only screen and (min-width: 200px) and (max-width: 576px) {

            .productImgs {
                width: 20rem;
            }

            .mobSr {
                width: 100%;
            }

            .stateImgsec {
                width: 25rem;
            }

            .marqueeSection {
                width: 100%;
                overflow: hidden;
                padding-block: 1.5rem;
            }

            .proRes {
                padding-bottom: 0px !important;
            }

            .shopImgGroup {
                flex-direction: column;
            }

            .shopImgOne {
                width: 150px;
                height: 150px;
            }

            .shopImgOne img {
                width: 100%;
                height: 100%;
            }

            .shopImgTwo {
                width: 350px;
                height: 250px;
            }

            .shopImgTwo img {
                width: 100%;
                height: 100%;
            }

            .winProducts {
                width: 20.359rem;
                height: 12.688rem;
            }

            .winImgContainer {
                margin-top: 1rem !important;
            }

            .winCartDiv {
                width: 22.688rem;
                margin-bottom: .8rem;
            }

            .winCartGr {
                margin-top: 2rem !important;
            }


            .section-header h1 {
                position: relative;
                font-size: 27px;
                color: #fff;
            }



        }

      
     
        
   
        
        
    </style>

                
           
                
    
   <!-- Top Categories -->
    @if (count($featured_categories) > 0)
        <section class="mb-3  pt-3" style="border-top: 2px solid lightgrey;border-bottom: 2px solid lightgrey;box-shadow: 17px 0px 3px -1px grey;">
            <div class="container">
                <!-- Categories -->
                <div class="bg-white px-sm-3">
                    <div class="aiz-carousel sm-gutters-17" data-items="8" data-xxl-items="8" data-xl-items="8"
                        data-lg-items="6" data-md-items="5" data-sm-items="3" data-xs-items="2" data-arrows="true"
                        data-dots="false" data-autoplay="false" data-infinite="true" data-center="false">
                            @foreach (get_level_zero_categories()->take(12) as $key => $category)
            @php
                $category_name = $category->getTranslation('name');
            @endphp
                            <div class="carousel-box px-4 d-flex flex-column align-items-center">
                                <div class="size-60px overflow-hidden hov-scale-img">
                                    <a class="d-block" href="{{ route('products.category', $category->slug) }}">
                                        <img src="{{ isset($category->catIcon->file_name) ? my_asset($category->catIcon->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                            class="lazyload img-fit h-100 mx-auto has-transition"
                                            alt="{{ $category->getTranslation('name') }}"
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';" style="width: 49px;border-radius: 55px;">
                                    </a>
                                </div>
                                <div class="text-center h-35px text-truncate-2" style="margin-top: 0px;">
                                    <a class="fs-13 fw-500 text-center text-reset hov-text-primary"
                                        href="{{ route('products.category', $category->slug) }}"
                                        style="width: max-content;">
                                        {{ $category_name }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    




    @php $lang = get_system_language()->code;  @endphp

    <!-- Featured Categories -->
    @if (count($featured_categories) > 0)
        <section class="mb-3 mb-md-2 1 ">
            <div class="container">
                <!-- Categories -->
                <div class="bg-white px-sm-3">
                    <div class="aiz-carousel sm-gutters-17" data-items="8" data-xxl-items="8" data-xl-items="8"
                        data-lg-items="6" data-md-items="5" data-sm-items="3" data-xs-items="2" data-arrows="true"
                        data-dots="false" data-autoplay="false" data-infinite="true" data-center="false">
                        @foreach ($featured_categories as $key => $category)
                            @php
                                $category_name = $category->getTranslation('name');
                            @endphp
                            <div class="carousel-box px-4 d-flex flex-column align-items-center">
                                <div class="size-80px overflow-hidden hov-scale-img">
                                    <a class="d-block" href="{{ route('products.category', $category->slug) }}">
                                        <img src="{{ isset($category->bannerImage->file_name) ? my_asset($category->bannerImage->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                            class="lazyload img-fit h-100 mx-auto has-transition"
                                            alt="{{ $category->getTranslation('name') }}"
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';" style="width: 80px;border-radius: 55px;">
                                    </a>
                                </div>
                                <div class="text-center h-35px text-truncate-2" style="margin-top: 12px;">
                                    <a class="fs-13 fw-500 text-center text-reset hov-text-primary"
                                        href="{{ route('products.category', $category->slug) }}"
                                        style="width: max-content;">
                                        {{ $category_name }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    
    
    

    <!-- Sliders -->
    <div class="home-banner-area mb-3" style="background-color: {{ get_setting('slider_section_bg_color', '#dedede') }}">
        <div class="@if(get_setting('slider_section_full_width') == 1) p-0 @else container @endif">
            <!-- Sliders -->
            <div class="home-slider slider-full">
                @if (get_setting('home_slider_images', null, $lang) != null)
                    <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-autoplay="true" data-infinite="true">
                        @php
                            $decoded_slider_images = json_decode(get_setting('home_slider_images', null, $lang), true);
                            $sliders = get_slider_images($decoded_slider_images);
                            $home_slider_links = get_setting('home_slider_links', null, $lang);
                        @endphp
                        @foreach ($sliders as $key => $slider)
                            <div class="carousel-box">
                                <a href="{{ isset(json_decode($home_slider_links, true)[$key]) ? json_decode($home_slider_links, true)[$key] : '' }}">
                                    <!-- Image -->
                                    <div class="d-block mw-100 img-fit overflow-hidden h-180px h-md-320px h-lg-460px h-xl-553px overflow-hidden">
                                         <!--<div class="d-block mw-100 img-fit overflow-hidden h-180px h-sm-200px h-md-250px h-lg-300px h-xl-370px overflow-hidden">-->
                                        <img class="img-fit h-100 m-auto has-transition ls-is-cached lazyloaded"
                                        src="{{ $slider ? my_asset($slider->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                        alt="{{ env('APP_NAME') }} promo"
                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>





<section class="bg-light mt-auto" style="background-color: #F3F3F3 !important;">
    <div class="container px-xs-0">
        <div class="row no-gutters">
            <!-- Terms & conditions -->
            <div class="col-lg-3 col-6 policy-file">
                <a class="text-reset h-100  border-right border-bottom border-soft-light text-center p-2 p-md-4 d-block hov-ls-1" href="{{ route('terms') }}">
                    <img src="https://cdn-icons-png.flaticon.com/512/3178/3178933.png " width="39" alt="" title="" class="img-small">
                    <h4 class="text-dark fs-14 fw-700 mt-3">{{ translate('Free Shipping') }}</h4>
                </a>
            </div>
            
            <!-- Return Policy -->
            <div class="col-lg-3 col-6 policy-file">
                <a class="text-reset h-100  border-right border-bottom border-soft-light text-center p-2 p-md-4 d-block hov-ls-1" href="{{ route('returnpolicy') }}">
                   <img src="https://cdn-icons-png.flaticon.com/512/590/590501.png " width="39" alt="" title="" class="img-small">
                    <h4 class="text-dark fs-14 fw-700 mt-3">{{ translate('Secure Payment') }}</h4>
                </a>
            </div>

            <!-- Support Policy -->
            <div class="col-lg-3 col-6 policy-file">
                <a class="text-reset h-100  border-right border-bottom border-soft-light text-center p-2 p-md-4 d-block hov-ls-1" href="{{ route('supportpolicy') }}">
                   <img src="   https://cdn-icons-png.flaticon.com/512/8754/8754639.png " width="39" alt="" title="" class="img-small">
                    <h4 class="text-dark fs-14 fw-700 mt-3">{{ translate('Earn Winning Coins') }}</h4>
                </a>
            </div>

            <!-- Privacy Policy -->
            <div class="col-lg-3 col-6 policy-file">
                <a class="text-reset h-100 border-right border-bottom border-soft-light text-center p-2 p-md-4 d-block hov-ls-1" href="{{ route('privacypolicy') }}">
                    <img src="   https://cdn-icons-png.flaticon.com/512/5530/5530758.png " width="39" alt="" title="" class="img-small">
                    <h4 class="text-dark fs-14 fw-700 mt-3">{{ translate('Get Offers') }}</h4>
                </a>
            </div>
        </div>
    </div>
</section>









        
        <!-- Featured Categories -->
    @if (count($featured_categories) > 0)
        <section class="mb-2 mb-md-3 mt-2 mt-md-3 winPro">
            <div class="container">
                <div class="bg-white">
                    <!-- Top Section -->
                    <div class="d-flex mt-2 mt-md-3 mb-2 mb-md-3 align-items-baseline justify-content-between">
                        <!-- Title -->
                        <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0 shead">
                            <span class="">{{ translate('Wining Products') }}</span>
                        </h3>
                    </div>
                </div>
                <!-- Categories -->
                <div class="px-sm-3">
                    <div class="aiz-carousel sm-gutters-17" data-items="4" data-xxl-items="4" data-xl-items="3.5"
                        data-lg-items="3" data-md-items="2" data-sm-items="2" data-xs-items="1" data-arrows="true"
                        data-dots="false" data-autoplay="false" data-infinite="true">
                        @foreach ($featured_categories as $key => $category)
                            @php
                                $category_name = $category->getTranslation('name');
                            @endphp
                            <div class="carousel-box position-relative p-0 has-transition border-right border-top border-bottom @if ($key == 0) border-left @endif">
                                <div class="h-164px h-sm-250px h-md-178px" style="
    height: 190px;
">
                                    <div class="h-100 w-100 w-xl-auto position-relative hov-scale-img overflow-hidden">
                                        <div class="position-absolute h-100 w-100 overflow-hidden">
                                            <img src="{{ isset($category->coverImage->file_name) ? my_asset($category->coverImage->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                                alt="{{ $category_name }}"
                                                class="h-100 has-transition"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                        </div>
                                        <div class="pb-4 px-4 absolute-bottom-left has-transition h-50 w-100 d-flex flex-column align-items-center justify-content-end"
                                            style="background: linear-gradient(to top, rgba(0,0,0,0.5) 50%,rgba(0,0,0,0) 100%) !important;">
                                            <div class="w-100">
                                                <a class="fs-16 fw-700 text-white animate-underline-white home-category-name d-flex align-items-center hov-column-gap-1"
                                                    href="{{ route('products.category', $category->slug) }}"
                                                    style="width: max-content;background: #ea7427c4;padding: 6px;border-radius: 10px;float: right;">
                                                    {{ $category_name }}&nbsp;
                                                    <i class="las la-angle-right"></i>
                                                </a>
                                                <div class="d-flex flex-wrap h-0px overflow-hidden mt-2">
                                                    @foreach ($category->childrenCategories->take(6) as $key => $child_category)
                                                    <a href="{{ route('products.category', $child_category->slug) }}" class="fs-13 fw-300 text-soft-light hov-text-white pr-3 pt-1">
                                                        {{ $child_category->getTranslation('name') }}
                                                    </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
   
    
        

    <!-- Flash Deal -->
    @php
        $flash_deal = get_featured_flash_deal();
        $flash_deal_bg = get_setting('flash_deal_bg_color');
        $flash_deal_bg_full_width = (get_setting('flash_deal_bg_full_width') == 1) ? true : false;
        $flash_deal_banner_menu_text = ((get_setting('flash_deal_banner_menu_text') == 'dark') ||  (get_setting('flash_deal_banner_menu_text') == null)) ? 'text-dark' : 'text-white';
        
    @endphp
    @if ($flash_deal != null)
        <section class="mb-2 mb-md-3 mt-2 mt-md-3" style="background: {{ ($flash_deal_bg_full_width && $flash_deal_bg != null) ? $flash_deal_bg : '' }};" id="flash_deal">
            <div class="container">
                <div class="@if(!$flash_deal_bg_full_width) px-3 px-md-2rem @endif pb-3 pb-md-4" style="background: {{ $flash_deal_bg != null ? $flash_deal_bg : '#faf9f7' }};">
                    <!-- Top Section -->
                    <div class="d-flex flex-wrap align-items-baseline justify-content-center justify-content-sm-between mb-2 mb-md-3 pt-2 pt-md-3">
                        <!-- Title -->
                        <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                            <span class="d-inline-block {{ $flash_deal_banner_menu_text }}">{{ translate('Flash Sale') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24"
                                class="ml-3">
                                <path id="Path_28795" data-name="Path 28795"
                                    d="M30.953,13.695a.474.474,0,0,0-.424-.25h-4.9l3.917-7.81a.423.423,0,0,0-.028-.428.477.477,0,0,0-.4-.207H21.588a.473.473,0,0,0-.429.263L15.041,18.151a.423.423,0,0,0,.034.423.478.478,0,0,0,.4.2h4.593l-2.229,9.683a.438.438,0,0,0,.259.5.489.489,0,0,0,.571-.127L30.9,14.164a.425.425,0,0,0,.054-.469Z"
                                    transform="translate(-15 -5)" fill="#fcc201" />
                            </svg>
                        </h3>
                        <!-- Countdown -->
                        <div class="aiz-count-down-box align-items-center mb-2 mb-lg-0" data-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                        <!-- Links -->
                        <div>
                            <div class="text-dark d-flex align-items-center mb-0">
                                <a href="{{ route('flash-deals') }}"
                                    class="fs-10 fs-md-12 fw-700 has-transition @if ((get_setting('flash_deal_banner_menu_text') == 'light') && $flash_deal_bg_full_width && $flash_deal_bg != null) text-white opacity-60 hov-opacity-100 animate-underline-white @else text-reset opacity-60 hov-opacity-100 hov-text-primary animate-underline-primary @endif mr-3">{{ translate('View All Flash Sale') }}</a>
                                <span class=" border-left border-soft-light border-width-2 pl-3">
                                    <a href="{{ route('flash-deal-details', $flash_deal->slug) }}"
                                        class="fs-10 fs-md-12 fw-700 has-transition @if ((get_setting('flash_deal_banner_menu_text') == 'light') && $flash_deal_bg_full_width && $flash_deal_bg != null) == 'light') text-white opacity-60 hov-opacity-100 animate-underline-white @else text-reset opacity-60 hov-opacity-100 hov-text-primary animate-underline-primary @endif">{{ translate('View All Products from This Flash Sale') }}</a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters align-items-center border" style="background: {{ $flash_deal_bg }};">
                        <!-- Flash Deals Baner & Countdown -->
                        <div class="col-xxl-2 col-md-3 col-sm-4 col-5 h-150px h-md-200px h-lg-240px">
                            <div class="h-100 w-100 w-xl-auto"
                                style="background-image: url('{{ uploaded_asset($flash_deal->banner) }}'); background-size: cover; background-position: center center;">
                            </div>
                        </div>
                        
                        <div class="col-xxl-10 col-md-9 col-sm-8 col-7">
                            <!-- Flash Deals Products -->
                            @php
                                $flash_deal_products = get_flash_deal_products($flash_deal->id);
                            @endphp
                            <div class="aiz-carousel arrow-inactive-none arrow-x-0"
                                data-items="6" data-xxl-items="6" data-xl-items="5" data-lg-items="3.7" data-md-items="3"
                                data-sm-items="2.7" data-xs-items="1.5" data-arrows="true" data-dots="false">
                                @foreach ($flash_deal_products as $key => $flash_deal_product)
                                    <div class="carousel-box bg-white">
                                        @if ($flash_deal_product->product != null && $flash_deal_product->product->published != 0)
                                            @php
                                                $product_url = route('product', $flash_deal_product->product->slug);
                                                if ($flash_deal_product->product->auction_product == 1) {
                                                    $product_url = route('auction-product', $flash_deal_product->product->slug);
                                                }
                                            @endphp
                                            <div
                                                class="h-150px h-md-200px h-lg-240px flash-deal-item position-relative text-center has-transition hov-shadow-out z-1">
                                                <a href="{{ $product_url }}"
                                                    class="d-block py-md-2 overflow-hidden hov-scale-img"
                                                    title="{{ $flash_deal_product->product->getTranslation('name') }}">
                                                    <!-- Image -->
                                                    <img src="{{ get_image($flash_deal_product->product->thumbnail) }}"
                                                        class="lazyload h-100px h-md-120px h-lg-140px mw-100 mx-auto has-transition"
                                                        alt="{{ $flash_deal_product->product->getTranslation('name') }}"
                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                    <!-- Price -->
                                                    <div
                                                        class="fs-10 fs-md-14 mt-2 text-center h-md-48px has-transition overflow-hidden pt-md-4 flash-deal-price lh-1-5">
                                                        <span
                                                            class="d-block text-primary fw-700">{{ home_discounted_base_price($flash_deal_product->product) }}</span>
                                                        @if (home_base_price($flash_deal_product->product) != home_discounted_base_price($flash_deal_product->product))
                                                            <del
                                                                class="d-block fw-400 text-secondary">{{ home_base_price($flash_deal_product->product) }}</del>
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

        <!-- New Products -->
    <div id="section_newest">

    </div>


    <!-- Today's deal -->
   <!-- @php
        $todays_deal_section_bg = get_setting('todays_deal_section_bg_color');
    @endphp
    <div id="todays_deal" @if(get_setting('todays_deal_section_bg') == 1) style="background: {{ $todays_deal_section_bg }};" @endif>

    </div>-->


    
    <!-- Featured Products -->
    <!--<div id="section_featured">

    </div>-->

    <!-- Banner section 2 -->
    @php $homeBanner2Images = get_setting('home_banner2_images', null, $lang);   @endphp
    @if ($homeBanner2Images != null)
        <div class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container">
                @php
                    $banner_2_imags = json_decode($homeBanner2Images);
                    $data_md = count($banner_2_imags) >= 2 ? 2 : 1;
                    $home_banner2_links = get_setting('home_banner2_links', null, $lang);
                @endphp
                <div class="aiz-carousel gutters-16 overflow-hidden arrow-inactive-none arrow-dark arrow-x-15"
                    data-items="{{ count($banner_2_imags) }}" data-xxl-items="{{ count($banner_2_imags) }}"
                    data-xl-items="{{ count($banner_2_imags) }}" data-lg-items="{{ $data_md }}"
                    data-md-items="{{ $data_md }}" data-sm-items="1" data-xs-items="1" data-arrows="true"
                    data-dots="false">
                    @foreach ($banner_2_imags as $key => $value)
                        <div class="carousel-box overflow-hidden hov-scale-img">
                            <a href="{{ isset(json_decode($home_banner2_links, true)[$key]) ? json_decode($home_banner2_links, true)[$key] : '' }}"
                                class="d-block text-reset overflow-hidden">
                                <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                    data-src="{{ uploaded_asset($value) }}" alt="{{ env('APP_NAME') }} promo"
                                    class="img-fluid lazyload w-100 has-transition"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif









     <!-- Top Sellers -->
    @if (get_setting('vendor_system_activation') == 1)
        @php
            $best_selers = get_best_sellers(5);
        @endphp
        @if (count($best_selers) > 0)
        <section class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container">
                <!-- Top Section -->
                <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                    <!-- Title -->
                    <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                        <span class="pb-3">{{ translate('Top Sellers') }}</span>
                    </h3>
                    <!-- Links -->
                    <div class="d-flex">
                        <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                            href="{{ route('sellers') }}">{{ translate('View All Sellers') }}</a>
                    </div>
                </div>
                <!-- Sellers Section -->
                <div class="aiz-carousel arrow-x-0 arrow-inactive-none" data-items="5" data-xxl-items="5"
                    data-xl-items="4" data-lg-items="3.4" data-md-items="2.5" data-sm-items="2" data-xs-items="1.4"
                    data-arrows="true" data-dots="false">
                    @foreach ($best_selers as $key => $seller)
                        @if ($seller->user != null)
                            <div
                                class="carousel-box h-100 position-relative text-center border-right border-top border-bottom @if ($key == 0) border-left @endif has-transition hov-animate-outline">
                                <div class="position-relative px-3" style="padding-top: 2rem; padding-bottom:2rem;">
                                    <!-- Shop logo & Verification Status -->
                                    <div class="position-relative mx-auto size-100px size-md-120px">
                                        <a href="{{ route('shop.visit', $seller->slug) }}"
                                            class="d-flex mx-auto justify-content-center align-item-center size-100px size-md-120px border overflow-hidden hov-scale-img"
                                            tabindex="0"
                                            style="border: 1px solid #e5e5e5; border-radius: 50%; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.06);">
                                            <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                                data-src="{{ uploaded_asset($seller->logo) }}" alt="{{ $seller->name }}"
                                                class="img-fit lazyload has-transition"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                                        </a>
                                        <div class="absolute-top-right z-1 mr-md-2 mt-1 rounded-content bg-white">
                                            @if ($seller->verification_status == 1)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24.001" height="24"
                                                    viewBox="0 0 24.001 24">
                                                    <g id="Group_25929" data-name="Group 25929"
                                                        transform="translate(-480 -345)">
                                                        <circle id="Ellipse_637" data-name="Ellipse 637" cx="12"
                                                            cy="12" r="12" transform="translate(480 345)"
                                                            fill="#fff" />
                                                        <g id="Group_25927" data-name="Group 25927"
                                                            transform="translate(480 345)">
                                                            <path id="Union_5" data-name="Union 5"
                                                                d="M0,12A12,12,0,1,1,12,24,12,12,0,0,1,0,12Zm1.2,0A10.8,10.8,0,1,0,12,1.2,10.812,10.812,0,0,0,1.2,12Zm1.2,0A9.6,9.6,0,1,1,12,21.6,9.611,9.611,0,0,1,2.4,12Zm5.115-1.244a1.083,1.083,0,0,0,0,1.529l3.059,3.059a1.081,1.081,0,0,0,1.529,0l5.1-5.1a1.084,1.084,0,0,0,0-1.53,1.081,1.081,0,0,0-1.529,0L11.339,13.05,9.045,10.756a1.082,1.082,0,0,0-1.53,0Z"
                                                                transform="translate(0 0)" fill="#3490f3" />
                                                        </g>
                                                    </g>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24.001" height="24"
                                                    viewBox="0 0 24.001 24">
                                                    <g id="Group_25929" data-name="Group 25929"
                                                        transform="translate(-480 -345)">
                                                        <circle id="Ellipse_637" data-name="Ellipse 637" cx="12"
                                                            cy="12" r="12" transform="translate(480 345)"
                                                            fill="#fff" />
                                                        <g id="Group_25927" data-name="Group 25927"
                                                            transform="translate(480 345)">
                                                            <path id="Union_5" data-name="Union 5"
                                                                d="M0,12A12,12,0,1,1,12,24,12,12,0,0,1,0,12Zm1.2,0A10.8,10.8,0,1,0,12,1.2,10.812,10.812,0,0,0,1.2,12Zm1.2,0A9.6,9.6,0,1,1,12,21.6,9.611,9.611,0,0,1,2.4,12Zm5.115-1.244a1.083,1.083,0,0,0,0,1.529l3.059,3.059a1.081,1.081,0,0,0,1.529,0l5.1-5.1a1.084,1.084,0,0,0,0-1.53,1.081,1.081,0,0,0-1.529,0L11.339,13.05,9.045,10.756a1.082,1.082,0,0,0-1.53,0Z"
                                                                transform="translate(0 0)" fill="red" />
                                                        </g>
                                                    </g>
                                                </svg>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Shop name -->
                                    <h2 class="fs-14 fw-700 text-dark text-truncate-2 h-40px mt-3 mt-md-4 mb-0 mb-md-3">
                                        <a href="{{ route('shop.visit', $seller->slug) }}"
                                            class="text-reset hov-text-primary" tabindex="0">{{ $seller->name }}</a>
                                    </h2>
                                    <!-- Shop Rating -->
                                    <div class="rating rating-mr-1 text-dark mb-3">
                                        {{ renderStarRating($seller->rating) }}
                                        <span class="opacity-60 fs-14">({{ $seller->num_of_reviews }}
                                            {{ translate('Reviews') }})</span>
                                    </div>
                                    <!-- Visit Button -->
                                    <a href="{{ route('shop.visit', $seller->slug) }}" class="btn-visit">
                                        <span class="circle" aria-hidden="true">
                                            <span class="icon arrow"></span>
                                        </span>
                                        <span class="button-text">{{ translate('Visit Store') }}</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    @endif







    <!-- Top Brands, Banner section 5, Banner section 6 -->
    @if (get_setting('top_brands') != null)
        @php
            $top_brands = json_decode(get_setting('top_brands'));
            $brands = get_brands($top_brands);
            $homeBanner5Images = get_setting('home_banner5_images', null, $lang);
            $homeBanner6Images = get_setting('home_banner6_images', null, $lang);
            $col_val = 'col-xl-4';
            $data_rows = 3;
            $xxl_items = 2;
            $xl_items = 2;
            $lg_items = 4;
            $md_items = 3;
            $sm_items = 2;
            $xs_items = 1.4;
            if ($homeBanner5Images == null && $homeBanner6Images == null){
                $data_rows = 1;
                $xxl_items = 6;
                $xl_items = 5;
            } elseif ($homeBanner5Images == null || $homeBanner6Images == null) {
                $col_val = 'col-xxl-8 col-xl-6';
                $data_rows = 3;
                $xxl_items = 2;
                $xl_items = 3;
            } 
        @endphp
        
        
        
        
        
        
        
        
        
        
        
        <section class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container">
                <div class="row">

                    <!-- Top Brands -->
                    <div class="col py-3 py-lg-0">
                        <div class="h-100" id="section_top_brands">
                            <div class="border px-3 pt-3">
                                <!-- Top Section -->
                                <div class="d-flex mb-3 mb-md-4 align-items-baseline justify-content-between">
                                    <!-- Title -->
                                    <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                                        <span class="pb-3">{{ translate('Best of The Winnig Kart') }}</span>
                                    </h3>
                                    <!-- Links -->
                                    <div class="d-flex">
                                        <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                                            href="{{ route('brands.all') }}">{{ translate('View All Brands') }}</a>
                                    </div>
                                </div>
                                <!-- Brands Section -->
                                <div class="aiz-carousel arrow-x-0 arrow-inactive-none py-4" data-rows="{{ $data_rows }}" data-items="{{ $xxl_items }}" data-xxl-items="{{ $xxl_items }}"
                                    data-xl-items="{{ $xl_items }}" data-lg-items="{{ $lg_items }}" data-md-items="{{ $md_items }}" data-sm-items="{{ $sm_items }}" data-xs-items="{{ $xs_items }}"
                                    data-arrows="true" data-dots="false">
                                    @foreach ($brands as $brand)
                                    
                                    
                                    
                                    
                                        <div class="carousel-box position-relative text-center hov-scale-img has-transition hov-shadow-out z-1">
                                            
                                              <div class="col" style="width: 16.688rem;">
            <a href="{{ route('products.brand', $brand->slug) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true" style="">
              <img src="{{ isset($brand->brandLogo->file_name) ? my_asset($brand->brandLogo->file_name) : static_asset('assets/img/placeholder.jpg') }}" alt="{{ $brand->getTranslation('name') }}" width="32" height="32" class="rounded-circle flex-shrink-0 border border-dark-subtle" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
              <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                  <h6 class="mb-0 listgtitle">H&M Collection</h6>
                  <p class="mb-0 listgsubtitle">Get 60% off on first order</p>
                </div>
                
              </div>
            </a>
        </div>
       
                                            
                                            
                                           <!-- <a href="{{ route('products.brand', $brand->slug) }}" class="d-block p-sm-2">
                                                <img src="{{ isset($brand->brandLogo->file_name) ? my_asset($brand->brandLogo->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                                    class="lazyload h-md-110px mx-auto has-transition p-2 p-sm-4"
                                                    alt="{{ $brand->getTranslation('name') }}"
                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                <p class="text-center text-dark fs-12 fs-md-14 fw-700 mt-2 mb-2 text-truncate" title="{{ $brand->getTranslation('name') }}">
                                                    {{ $brand->getTranslation('name') }}
                                                </p>
                                            </a>-->
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Banner section 5 -->
                    @if ($homeBanner5Images != null)
                        @php
                            $banner_5_imags = json_decode($homeBanner5Images);
                            $home_banner5_links = get_setting('home_banner5_links', null, $lang);
                        @endphp
                        <div class="{{ $col_val }} d-none d-xl-block">
                            <div class="aiz-carousel overflow-hidden arrow-inactive-none arrow-dark arrow-x-0"
                                data-items="1" data-arrows="true" data-dots="false" data-autoplay="true">
                                @foreach ($banner_5_imags as $key => $value)
                                    <div class="carousel-box overflow-hidden hov-scale-img">
                                        <a href="{{ isset(json_decode($home_banner5_links, true)[$key]) ? json_decode($home_banner5_links, true)[$key] : '' }}"
                                            class="d-block text-reset overflow-hidden" style="height: 605px;">
                                            <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                                data-src="{{ uploaded_asset($value) }}" alt="{{ env('APP_NAME') }} promo"
                                                class="img-fit h-100 lazyload has-transition"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    <!-- Banner section 6 -->
                    @if ($homeBanner6Images != null)
                        @php
                            $banner_6_imags = json_decode($homeBanner6Images);
                            $home_banner6_links = get_setting('home_banner6_links', null, $lang);
                        @endphp
                        <div class="{{ $col_val }} d-none d-xl-block"><div class="aiz-carousel overflow-hidden arrow-inactive-none arrow-dark arrow-x-0"
                            data-items="1" data-arrows="true" data-dots="false" data-autoplay="true">
                                @foreach ($banner_6_imags as $key => $value)
                                    <div class="carousel-box overflow-hidden hov-scale-img">
                                        <a href="{{ isset(json_decode($home_banner6_links, true)[$key]) ? json_decode($home_banner6_links, true)[$key] : '' }}"
                                            class="d-block text-reset overflow-hidden" style="height: 605px;">
                                            <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                                data-src="{{ uploaded_asset($value) }}" alt="{{ env('APP_NAME') }} promo"
                                                class="img-fit h-100 lazyload has-transition"
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                </div>
            </div>
        </section>
    @endif

    <!-- Auction Product -->
    @if (addon_is_activated('auction'))
        <div id="auction_products">

        </div>
    @endif

    <!-- Cupon -->
    @if (get_setting('coupon_system') == 1)
        <div class="mt-2 mt-md-3 mb-2 mb-md-3">
            <div class="container">
                <div class="position-relative py-5 px-3 px-sm-4 px-lg-5" style="background-color: {{ get_setting('cupon_background_color', '#292933') }}">
                    <div class="text-center text-xl-left position-relative z-5">
                        <div class="d-lg-flex justify-content-lg-between">
                            <div class="order-lg-1 mb-3 mb-lg-0">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="206.12" height="175.997" viewBox="0 0 206.12 175.997">
                                    <defs>
                                      <clipPath id="clip-path">
                                        <path id="Union_10" data-name="Union 10" d="M-.008,77.361l142.979-.327-22.578.051.176-77.132L143.148-.1l-.177,77.132-.064,28.218L-.072,105.58Z" transform="translate(0 0)" fill="none" stroke="#000" stroke-width="2"/>
                                      </clipPath>
                                    </defs>
                                    <g id="Group_24326" data-name="Group 24326" transform="translate(-274.202 -5254.612)" opacity="0.5">
                                      <g id="Mask_Group_23" data-name="Mask Group 23" transform="translate(304.445 5355.902) rotate(-45)" clip-path="url(#clip-path)">
                                        <g id="Group_24322" data-name="Group 24322" transform="translate(7.681 5.856)">
                                          <g id="Subtraction_167" data-name="Subtraction 167" transform="translate(0 0)" fill="none">
                                            <path d="M127.451,90.3H8a8.009,8.009,0,0,1-8-8V60.2a14.953,14.953,0,0,0,10.642-4.408A14.951,14.951,0,0,0,15.05,45.15a14.953,14.953,0,0,0-4.408-10.643A14.951,14.951,0,0,0,0,30.1V8A8.009,8.009,0,0,1,8,0H127.451a8.009,8.009,0,0,1,8,8V29.79a15.05,15.05,0,1,0,0,30.1V82.3A8.009,8.009,0,0,1,127.451,90.3Z" stroke="none"/>
                                            <path d="M 127.450813293457 88.30060577392578 C 130.75927734375 88.30060577392578 133.4509124755859 85.60896301269531 133.4509124755859 82.30050659179688 L 133.4508972167969 61.77521514892578 C 129.6533966064453 61.33430480957031 126.1383361816406 59.64068222045898 123.394172668457 56.89652252197266 C 120.1737594604492 53.67610168457031 118.4001998901367 49.39426422119141 118.4001998901367 44.83980178833008 C 118.4001998901367 40.28572463989258 120.1737747192383 36.0041618347168 123.3942184448242 32.78384399414062 C 126.1376495361328 30.04052734375 129.6527099609375 28.34706115722656 133.4509124755859 27.9056282043457 L 133.4509124755859 8.000102996826172 C 133.4509124755859 4.691642761230469 130.75927734375 2.000002861022949 127.450813293457 2.000002861022949 L 8.000096321105957 2.000002861022949 C 4.691636085510254 2.000002861022949 1.999996185302734 4.691642761230469 1.999996185302734 8.000102996826172 L 1.999996185302734 28.21491050720215 C 5.797210216522217 28.65582466125488 9.31190013885498 30.34944725036621 12.05595588684082 33.09362411499023 C 15.27627658843994 36.31408309936523 17.04979705810547 40.59588241577148 17.04979705810547 45.15030288696289 C 17.04979705810547 49.70434188842773 15.27627658843994 53.98588180541992 12.05591583251953 57.20624160766602 C 9.312583923339844 59.94955825805664 5.797909259796143 61.64302062988281 1.999996185302734 62.08445739746094 L 1.999996185302734 82.30050659179688 C 1.999996185302734 85.60896301269531 4.691636085510254 88.30060577392578 8.000096321105957 88.30060577392578 L 127.450813293457 88.30060577392578 M 127.450813293457 90.30060577392578 L 8.000096321105957 90.30060577392578 C 3.588836193084717 90.30060577392578 -3.762207143154228e-06 86.71176147460938 -3.762207143154228e-06 82.30050659179688 L -3.762207143154228e-06 60.20010375976562 C 4.022176265716553 60.19910430908203 7.799756050109863 58.63396453857422 10.64171600341797 55.79202270507812 C 13.48431587219238 52.94942474365234 15.04979610443115 49.17012405395508 15.04979610443115 45.15030288696289 C 15.04979610443115 41.13010406494141 13.48431587219238 37.35052108764648 10.64171600341797 34.5078010559082 C 7.799176216125488 31.66514205932617 4.019876003265381 30.0996036529541 -3.762207143154228e-06 30.0996036529541 L -3.762207143154228e-06 8.000102996826172 C -3.762207143154228e-06 3.588842868804932 3.588836193084717 2.886962874981691e-06 8.000096321105957 2.886962874981691e-06 L 127.450813293457 2.886962874981691e-06 C 131.8620758056641 2.886962874981691e-06 135.4509124755859 3.588842868804932 135.4509124755859 8.000102996826172 L 135.4509124755859 29.79000282287598 C 131.4283294677734 29.79100227355957 127.6504745483398 31.35614204406738 124.8083953857422 34.19808197021484 C 121.9657363891602 37.04064178466797 120.4001998901367 40.81994247436523 120.4001998901367 44.83980178833008 C 120.4001998901367 48.86006164550781 121.9657363891602 52.63964462280273 124.8083953857422 55.48230361938477 C 127.6510543823242 58.3249626159668 131.4306488037109 59.8905029296875 135.4508972167969 59.8905029296875 L 135.4509124755859 82.30050659179688 C 135.4509124755859 86.71176147460938 131.8620758056641 90.30060577392578 127.450813293457 90.30060577392578 Z" stroke="none" fill="#000"/>
                                          </g>
                                        </g>
                                      </g>
                                      <g id="Group_24321" data-name="Group 24321" transform="translate(274.202 5357.276) rotate(-45)">
                                        <g id="Subtraction_167-2" data-name="Subtraction 167" transform="translate(0 0)" fill="none">
                                          <path d="M127.451,90.3H8a8.009,8.009,0,0,1-8-8V60.2a14.953,14.953,0,0,0,10.642-4.408A14.951,14.951,0,0,0,15.05,45.15a14.953,14.953,0,0,0-4.408-10.643A14.951,14.951,0,0,0,0,30.1V8A8.009,8.009,0,0,1,8,0H127.451a8.009,8.009,0,0,1,8,8V29.79a15.05,15.05,0,1,0,0,30.1V82.3A8.009,8.009,0,0,1,127.451,90.3Z" stroke="none"/>
                                          <path d="M 127.450813293457 88.30060577392578 C 130.75927734375 88.30060577392578 133.4509124755859 85.60896301269531 133.4509124755859 82.30050659179688 L 133.4508972167969 61.77521514892578 C 129.6533966064453 61.33430480957031 126.1383361816406 59.64068222045898 123.394172668457 56.89652252197266 C 120.1737594604492 53.67610168457031 118.4001998901367 49.39426422119141 118.4001998901367 44.83980178833008 C 118.4001998901367 40.28572463989258 120.1737747192383 36.0041618347168 123.3942184448242 32.78384399414062 C 126.1376495361328 30.04052734375 129.6527099609375 28.34706115722656 133.4509124755859 27.9056282043457 L 133.4509124755859 8.000102996826172 C 133.4509124755859 4.691642761230469 130.75927734375 2.000002861022949 127.450813293457 2.000002861022949 L 8.000096321105957 2.000002861022949 C 4.691636085510254 2.000002861022949 1.999996185302734 4.691642761230469 1.999996185302734 8.000102996826172 L 1.999996185302734 28.21491050720215 C 5.797210216522217 28.65582466125488 9.31190013885498 30.34944725036621 12.05595588684082 33.09362411499023 C 15.27627658843994 36.31408309936523 17.04979705810547 40.59588241577148 17.04979705810547 45.15030288696289 C 17.04979705810547 49.70434188842773 15.27627658843994 53.98588180541992 12.05591583251953 57.20624160766602 C 9.312583923339844 59.94955825805664 5.797909259796143 61.64302062988281 1.999996185302734 62.08445739746094 L 1.999996185302734 82.30050659179688 C 1.999996185302734 85.60896301269531 4.691636085510254 88.30060577392578 8.000096321105957 88.30060577392578 L 127.450813293457 88.30060577392578 M 127.450813293457 90.30060577392578 L 8.000096321105957 90.30060577392578 C 3.588836193084717 90.30060577392578 -3.762207143154228e-06 86.71176147460938 -3.762207143154228e-06 82.30050659179688 L -3.762207143154228e-06 60.20010375976562 C 4.022176265716553 60.19910430908203 7.799756050109863 58.63396453857422 10.64171600341797 55.79202270507812 C 13.48431587219238 52.94942474365234 15.04979610443115 49.17012405395508 15.04979610443115 45.15030288696289 C 15.04979610443115 41.13010406494141 13.48431587219238 37.35052108764648 10.64171600341797 34.5078010559082 C 7.799176216125488 31.66514205932617 4.019876003265381 30.0996036529541 -3.762207143154228e-06 30.0996036529541 L -3.762207143154228e-06 8.000102996826172 C -3.762207143154228e-06 3.588842868804932 3.588836193084717 2.886962874981691e-06 8.000096321105957 2.886962874981691e-06 L 127.450813293457 2.886962874981691e-06 C 131.8620758056641 2.886962874981691e-06 135.4509124755859 3.588842868804932 135.4509124755859 8.000102996826172 L 135.4509124755859 29.79000282287598 C 131.4283294677734 29.79100227355957 127.6504745483398 31.35614204406738 124.8083953857422 34.19808197021484 C 121.9657363891602 37.04064178466797 120.4001998901367 40.81994247436523 120.4001998901367 44.83980178833008 C 120.4001998901367 48.86006164550781 121.9657363891602 52.63964462280273 124.8083953857422 55.48230361938477 C 127.6510543823242 58.3249626159668 131.4306488037109 59.8905029296875 135.4508972167969 59.8905029296875 L 135.4509124755859 82.30050659179688 C 135.4509124755859 86.71176147460938 131.8620758056641 90.30060577392578 127.450813293457 90.30060577392578 Z" stroke="none" fill="#000"/>
                                        </g>
                                        <g id="Group_24325" data-name="Group 24325" transform="translate(26.233 43.075)">
                                          <path id="Path_41600" data-name="Path 41600" d="M.006.024,15.056-.01l-.009,3.763L0,3.787Z" transform="translate(22.575 0.058)"/>
                                          <path id="Path_41601" data-name="Path 41601" d="M.006.024,15.056-.01l-.009,3.763L0,3.787Z" transform="translate(45.151 0.006)"/>
                                          <path id="Path_41602" data-name="Path 41602" d="M.006.024,15.056-.01l-.009,3.763L0,3.787Z" transform="translate(67.725 -0.046)"/>
                                          <path id="Path_41603" data-name="Path 41603" d="M.006.024,15.056-.01l-.009,3.763L0,3.787Z" transform="translate(0 0.11)"/>
                                        </g>
                                      </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="">
                                <h5 class="fs-36 fw-400 text-dark mb-3">{{ translate(get_setting('cupon_title')) }}</h5>
                                <h5 class="fs-20 fw-400 text-dark">{{ translate(get_setting('cupon_subtitle')) }}</h5>
                                <div class="mt-5">
                                    <a href="{{ route('coupons.all') }}"
                                        class="btn btn-dark fs-16 px-5 rounded-4"
                                        style="box-shadow: 0px 20px 30px rgba(0, 0, 0, 0.16);">{{ translate('View All Coupons') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Classified Product -->
    @if (get_setting('classified_product') == 1)
        @php
            $classified_products = get_home_page_classified_products(6);
        @endphp
        @if (count($classified_products) > 0)
            <section class="py-3" style="">
                <div class="container">
                    <div class="border">
                        <!-- Top Section -->
                        <div class="d-flex p-3 p-sm-4 align-items-baseline justify-content-between">
                            <!-- Title -->
                            <h3 class="fs-16 fs-md-20 fw-700 mb-0">
                                <span class="">{{ translate('Classified Ads') }}</span>
                            </h3>
                            <!-- Links -->
                            <div class="d-flex">
                                <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                                    href="{{ route('customer.products') }}">{{ translate('View All Products') }}</a>
                            </div>
                        </div>
                        <div class="d-sm-flex bg-white pb-3 pb-md-4">
                            <!-- Banner -->
                            @php
                                $classifiedBannerImage = get_setting('classified_banner_image_small', null, $lang);
                            @endphp
                            <div class="px-3 px-sm-4">
                                <div class="w-sm-270px h-320px mx-auto">
                                    <a href="{{ route('customer.products') }}" class="d-block h-100 w-100 w-xl-auto hov-scale-img overflow-hidden">
                                        <img src="{{ uploaded_asset($classifiedBannerImage) }}"
                                            alt="{{ translate('Classified Ads') }}"
                                            class="img-fit h-100 has-transition"
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                    </a>
                                </div>
                            </div>
                            <!-- Products -->
                            <div class="px-0 px-sm-4 w-100 overflow-hidden">
                                <div class="aiz-carousel arrow-x-0 arrow-inactive-none" data-items="5"
                                    data-xxl-items="5" data-xl-items="3.5" data-lg-items="3" data-md-items="2" data-sm-items="1"
                                    data-xs-items="2" data-arrows='true' data-infinite='false'>
                                    @foreach ($classified_products as $key => $classified_product)
                                        <div class="px-3">
                                            <a href="{{ route('customer.product', $classified_product->slug) }}"
                                                class="d-block overflow-hidden h-140px h-md-170px text-center hov-scale-img mb-3">
                                                <img class="img-fluid lazyload mx-auto has-transition"
                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                    data-src="{{ isset($classified_product->thumbnail->file_name) ? my_asset($classified_product->thumbnail->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                                    alt="{{ $classified_product->getTranslation('name') }}"
                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                            </a>
                                            <h3
                                                class="fw-400 fs-14 text-dark text-truncate-2 lh-1-4 mb-3 h-35px d-none d-sm-block">
                                                <a href="{{ route('customer.product', $classified_product->slug) }}"
                                                    class="d-block text-reset hov-text-primary">{{ $classified_product->getTranslation('name') }}</a>
                                            </h3>
                                            <div class="fs-14 mb-3">
                                                <span
                                                    class="text-secondary">{{ $classified_product->user ? $classified_product->user->name : '' }}</span><br>
                                                <span
                                                    class="fw-700 text-primary">{{ single_price($classified_product->unit_price) }}</span>
                                            </div>
                                            @if ($classified_product->conditon == 'new')
                                                <span
                                                    class="badge badge-inline badge-soft-info fs-13 fw-700 px-3 py-2 text-info"
                                                    style="border-radius: 20px;">{{ translate('New') }}</span>
                                            @elseif($classified_product->conditon == 'used')
                                                <span
                                                    class="badge badge-inline badge-soft-secondary-base fs-13 fw-700 px-3 py-2 text-danger"
                                                    style="border-radius: 20px;">{{ translate('Used') }}</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif

    <!-- Category wise Products -->
    <div id="section_home_categories">

    </div>






@endsection

