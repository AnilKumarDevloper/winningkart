@extends('frontend.layouts.app')

@section('content')
<style>
    .sub-cat-menu{
        position: absolute;
        top: 10;;
        background: #fff;
        max-height: 400px;
        overflow-y: scroll;
        width: 70%;
        border: 1px solid red;
        z-index: 10;
        margin-left: 15%;
        margin-right: 15%;
    }
    
    @media screen and (max-width: 768px) {
        .cate-mob-sz .slick-list .slick-track .slick-slide {
            width: 160px !important;
            margin-inline: 0rem !important;
            padding-right: 0px !important;
        }
        .cate-mob-sz .slick-list .slick-track{
            display: flex;
            gap: 0.3rem;
        }
        .winnig_card {
            min-width: 160px;
            height: 160px;
            border-radius: 0.2rem;
            overflow: hidden;
            box-shadow: none !important;
            margin: 0rem;
        }
        .home-category-name {
            border-radius: 2px;
            margin-right: 0rem;
            background: #ef7528;
            padding: 0.4rem 0rem;
            padding-left: 0.5rem;
            padding-right: 0.4rem;
            font-size: 0.7rem;
        }
        .cate-mob-sz .slick-list .slick-track .slick-slide img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
        }
    }
    .wishlist-icon {
        display: inline-flex !important;
        height: 28px!important;
        width: 28px!important;
    }  
    .top_fix_categ{
        border-top: 0.5px solid lightgrey; border-bottom: .5px solid lightgrey;
    }
    .top_fix_categ_imgs{
        width: 40px;border-radius: 55px;
    }
    .top_categrs_content{
        margin-top: 0px;
    }
    .tfc_content{
        width: max-content;padding-left: 9px;
    }
    .tfc_content2{
        width: max-content;
    } 
    .feat_catgrs_section{
        background-color: #f4f4f4 !important;
    }
    .feat_catgrs_imgs{
        width: 80px;margin-top: 1px;
    }
    .feat_content_divs{
        margin-top: 0px;
        margin-bottom: 5px;
    }
    .tc_section_bg{
        background-color:#1e1e1e08!important;
    }
    .sbc_parent_div{
        margin-right: 25px;
    }
    .sell_sec_aizcarouselbox{
        border: 1px solid #e5e5e5 !important;
        border-radius: 50% !important;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.06) !important;
    }
    .vd_radius23{
        border-radius: 23px;
    }
</style>

<!-- Fix Page menu -->
<!-- @if (count($featured_categories) > 0)
<section class="pt-2 top_fix_categ">
    <div class="container"> 
        <div class="bg-white px-sm-3">
            <div class="aiz-carousel sm-gutters-17" data-items="8" data-xxl-items="8" data-xl-items="8"
                data-lg-items="6" data-md-items="5" data-sm-items="3" data-xs-items="3" data-arrows="true"
                data-dots="false" data-autoplay="false" data-infinite="true" data-center="false">

                <div class="carousel-box px-md-4 px-1 d-flex flex-column align-items-center">
                    <div class="size-45px overflow-hidden hov-scale-img">
                        <a class="d-block" href="/categories" aria-label=" Winning Kart">
                            <img src="public/uploads/all/fZkGNIuP3qcDkNy2tu5LeB6S0FXtpZZTN1NpaeUd3.webp"
                                class="lazyload img-fit h-100 mx-auto has-transition top_fix_categ_imgs"
                                alt=""
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                        </a>
                    </div>
                    <div class="text-center h-35px text-truncate-2 top_categrs_content">
                        <a class="fs-13 fw-500 text-center text-reset hov-text-primary tfc_content"
                            href="/categories" aria-label=" Winning Kart">
                            Winning Kart
                        </a>
                    </div>
                </div>

                <div class="carousel-box px-md-4 px-2 d-flex flex-column align-items-center">
                    <div class="size-45px overflow-hidden hov-scale-img">
                        <a class="d-block" href="/brands" aria-label="Brands">
                            <img src="public/uploads/all/cmxB2kEpED70oYcJc8HgJRgOyd5XAQnw9kZsgkao2.webp"
                                class="lazyload img-fit h-100 mx-auto has-transition top_fix_categ_imgs"
                                alt=""
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                        </a>
                    </div>
                    <div class="text-center h-35px text-truncate-2 top_categrs_content">
                        <a class="fs-13 fw-500 text-center text-reset hov-text-primary tfc_content2"
                            href="/brands" aria-label=" Brands">
                            Brands
                        </a>
                    </div>
                </div>

                    <div class="carousel-box px-md-4 px-2 d-flex flex-column align-items-center">
                    <div class="size-45px overflow-hidden hov-scale-img">
                        <a class="d-block" href="/categories" aria-label="Luxe">
                            <img src="public/uploads/all/XhnxZwmI3fAiVhYrg03JVpLITRF1WloiHmXLNVdC1.webp"
                                class="lazyload img-fit h-100 mx-auto has-transition top_fix_categ_imgs"
                                alt=""
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                        </a>
                    </div>
                    <div class="text-center h-35px text-truncate-2 top_categrs_content">
                        <a class="fs-13 fw-500 text-center text-reset hov-text-primary tfc_content2"
                            href="/categories" aria-label=" Luxe">
                            Luxe
                        </a>
                    </div>
                </div>

                 <div class="carousel-box px-md-4 px-2 d-flex flex-column align-items-center">
                    <div class="size-45px overflow-hidden hov-scale-img">
                        <a class="d-block" href="/coupons" aria-label=" Offer">
                            <img src="public/uploads/all/SwRACcnJERqe5ia4QOwjPNKTKpAh4ntDPLGiPTtD2.webp"
                                class="lazyload img-fit h-100 mx-auto has-transition top_fix_categ_imgs"
                                alt=""
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                        </a>
                    </div>
                    <div class="text-center h-35px text-truncate-2 top_categrs_content" >
                        <a class="fs-13 fw-500 text-center text-reset hov-text-primary tfc_content2"
                            href="/coupons" aria-label="Offer"
                            >
                            Offer
                        </a>
                    </div>
                </div>


                 <div class="carousel-box px-md-4 px-2 d-flex flex-column align-items-center">
                    <div class="size-45px overflow-hidden hov-scale-img">
                        <a class="d-block" href="/todays-deal" aria-label=" Todays Deal">
                            <img src="public/uploads/all/fRniWJ5eoH2zHC4TjI86y9JqKej1hcou0ADLFUV432.webp"
                                class="lazyload img-fit h-100 mx-auto has-transition top_fix_categ_imgs"
                                alt=""
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                        </a>
                    </div>
                    <div class="text-center h-35px text-truncate-2 top_categrs_content">
                        <a class="fs-13 fw-500 text-center text-reset hov-text-primary tfc_content2"
                            href="" aria-label=" Todays Deal">
                          Todays Deal
                        </a>    
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endif -->

@php $lang = get_system_language()->code; @endphp

<!-- Featured Categories -->
<!--  
@if (count($featured_categories) > 0)
<section class="feat_catgrs_section">
    <div class="container">

        <div class="px-sm-3">
            <div class="aiz-carousel sm-gutters-17" data-items="8" data-xxl-items="8" data-xl-items="8"
                data-lg-items="6" data-md-items="5" data-sm-items="3" data-xs-items="3" data-arrows="true"
                data-dots="false" data-autoplay="true" data-infinite="true" data-center="false">
                 @foreach ($featured_categories->take(7) as $key => $category)
                        @php
                            $category_name = $category->getTranslation('name');
                        @endphp

                <div class="carousel-box px-md-4 px-2 d-flex flex-column align-items-center hov-column-gap-1 category-nav-element-new" data-id="{{ $category->id }}">
                    <div class="size-68px overflow-hidden hov-scale-img">
                        <a class="d-block" href="{{ route('products.category', $category->slug) }}">
                            <img src="{{ isset($category->catIcon->file_name) ? my_asset($category->catIcon->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                class="lazyload img-fit h-100 mx-auto has-transition feat_catgrs_imgs"
                                alt="{{ $category->getTranslation('name') }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                        </a>
                    </div>
                    <div class="text-center h-35px text-truncate-2 feat_content_divs">
                        <a class="fs-13 fw-500 text-center text-reset hov-text-primary tfc_content2"
                            href="{{ route('products.category', $category->slug) }}">
                            {{ $category_name }}
                        </a>
                    </div>
                </div> 
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif -->




<!-- Sliders -->
<div class="home-banner-area mb-3 web_home_banner" style="background-color: {{ get_setting('slider_section_bg_color', '#dedede') }}">

    <div class="sub-cat-menu sub-cat-menu-new more c-scrollbar-light border p-4 shadow-none d-none">
        <div class="c-preloader text-center absolute-center">
            <i class="las la-spinner la-spin la-3x opacity-70"></i>
        </div>
    </div>

    <div class="@if(get_setting('slider_section_full_width') == 1) p-0 @else container @endif">
        <!-- Sliders -->
        <div class="home-slider slider-full">
            @if (get_setting('home_slider_images', null, $lang) != null)
            <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-autoplay="true" data-infinite="true" data-arrows="true">
                @php
                $decoded_slider_images = json_decode(get_setting('home_slider_images', null, $lang), true);
                $sliders = get_slider_images($decoded_slider_images);
                $home_slider_links = get_setting('home_slider_links', null, $lang);
                @endphp
                @foreach ($sliders as $key => $slider)
                <div class="carousel-box">
                    <a href="{{ isset(json_decode($home_slider_links, true)[$key]) ? json_decode($home_slider_links, true)[$key] : 'javascript:void(0);' }}">
                        <!-- Image -->
                        <div class="d-block mw-100 img-fit overflow-hidden overflow-hidden">
                           
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


<!--Mobile Screen Banner Start-->
<!-- Sliders -->
<div class="home-banner-area mb-3 mob_home_banner" style="background-color: {{ get_setting('slider_section_bg_color', '#dedede') }};">

    <div class="sub-cat-menu sub-cat-menu-new more c-scrollbar-light border p-4 shadow-none d-none">
        <div class="c-preloader text-center absolute-center">
            <i class="las la-spinner la-spin la-3x opacity-70"></i>
        </div>
    </div>

    <div class="@if(get_setting('slider_section_full_width') == 1) p-0 @else container @endif">
        <!-- Sliders -->
        <div class="home-slider slider-full">
            @if (get_setting('home_slider_images', null, $lang) != null)
            <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height mob_banner_aizcarou" data-autoplay="true" data-infinite="true" data-arrows="true">
                @php
                $decoded_slider_images = json_decode(get_setting('home_slider_images', null, $lang), true);
                $sliders = get_slider_images($decoded_slider_images);
                $home_slider_links = get_setting('home_slider_links', null, $lang);
                @endphp
                @foreach ($sliders as $key => $slider)
                <div class="carousel-box mob_ban_parnt">
                    <a href="/category/demo-category-3">
                        <!-- Image -->
                        <div class="d-block mw-100 img-fit overflow-hidden overflow-hidden mob_img_inner">
                           
                            <img class="img-fit h-100 m-auto has-transition ls-is-cached lazyloaded mob_banImg"
                                src="{{ asset('public/assets/img/f-accesories.webp') }}"
                                alt="{{ env('APP_NAME') }} promo"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                        </div>
                    </a>
                </div>
                 <div class="carousel-box">
                    <a href="/category/daily-essentials-ctrqg">
                        <!-- Image -->
                        <div class="d-block mw-100 img-fit overflow-hidden overflow-hidden mob_img_inner">
                            
                            <img class="img-fit h-100 m-auto has-transition ls-is-cached lazyloaded"
                                src="{{ asset('public/assets/img/m-men.webp') }}"
                                alt="{{ env('APP_NAME') }} promo"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                        </div>
                    </a>
                </div>
                <div class="carousel-box mob_ban_parnt">
                    <a href="/category/women-clothings">
                        <!-- Image -->
                        <div class="d-block mw-100 img-fit overflow-hidden overflow-hidden mob_img_inner">
                            
                            <img class="img-fit h-100 m-auto has-transition ls-is-cached lazyloaded"
                                src="{{ asset('public/assets/img/d-essentials.webp') }}"
                                alt="{{ env('APP_NAME') }} promo"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                        </div>
                    </a>
                </div>
              <div class="carousel-box mob_ban_parnt">
                    <a href="/category/decor-2jywo">
                        <!-- Image -->
                        <div class="d-block mw-100 img-fit overflow-hidden overflow-hidden mob_img_inner">
                            
                            <img class="img-fit h-100 m-auto has-transition ls-is-cached lazyloaded"
                                src="{{ asset('public/assets/img/w-women.webp') }}"
                                alt="{{ env('APP_NAME') }} promo"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                        </div>
                    </a>
                </div>
                <div class="carousel-box mob_ban_parnt">
                    <a href="/category/gadgets-md7fv">
                        <!-- Image -->
                        <div class="d-block mw-100 img-fit overflow-hidden overflow-hidden mob_img_inner">
                            
                            <img class="img-fit h-100 m-auto has-transition ls-is-cached lazyloaded"
                               src="{{ asset('public/assets/img/t-toys.webp') }}"
                                alt="{{ env('APP_NAME') }} promo"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                        </div>
                    </a>
                </div>
                <div class="carousel-box mob_ban_parnt">
                    <a href="/category/gadgets-rwzf2">
                        <!-- Image -->
                        <div class="d-block mw-100 img-fit overflow-hidden overflow-hidden mob_img_inner">
                            
                            <img class="img-fit h-100 m-auto has-transition ls-is-cached lazyloaded"
                               src="{{ asset('public/assets/img/g-gadgets.webp') }}"
                                alt="{{ env('APP_NAME') }} promo"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                        </div>
                    </a>
                </div>
                <div class="carousel-box mob_ban_parnt">
                    <a href="/category/demo-category-2">
                        <!-- Image -->
                        <div class="d-block mw-100 img-fit overflow-hidden overflow-hidden mob_img_inner">
                            
                            <img class="img-fit h-100 m-auto has-transition ls-is-cached lazyloaded"
                               src="{{ asset('public/assets/img/hl-home-living.webp') }}"
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

<!--Mobile Sreen Banner End-->


<section class="bg-light mt-auto tc_section_bg">
    <div class="container px-xs-0">
        <div class="row no-gutters">
            <!-- Terms & conditions -->
            <div class="col-lg-3 col-6 policy-file">
                <a class="text-reset h-100  border-right border-soft-light d-flex align-items-center justify-content-center p-2 p-md-4 d-block hov-ls-1" href="{{ route('terms') }}">
                    <img src="{{ asset('public/assets/img/truck.svg') }}" width="39" alt="" title="" class="img-small d-inline">
                    <h4 class="d-inline text-dark fs-14 fw-700 ml-3 mb-0">{{ translate('Free Shipping') }}</h4>
                </a>
            </div>

            <!-- Return Policy -->
            <div class="col-lg-3 col-6 policy-file">
                <a class="text-reset h-100 border-right border-soft-light  d-flex align-items-center justify-content-center p-2 p-md-4 d-block hov-ls-1" href="{{ route('returnpolicy') }}">
                    <img src="{{ asset('public/assets/img/secure.svg') }}" width="39" alt="" title="" class="img-small d-inline">
                    <h4 class="d-inline text-dark fs-14 fw-700 ml-3 mt-2">{{ translate('Secure Payment') }}</h4>
                </a>
            </div>

            <!-- Support Policy -->
            <div class="col-lg-3 col-6 policy-file">
                <a class="text-reset h-100  border-right border-soft-light d-flex align-items-center justify-content-center p-2 p-md-4 d-block hov-ls-1" href="{{ route('supportpolicy') }}">
                    <img src="{{ asset('public/assets/img/earn.webp') }}" width="39" alt="" title="" class="img-small d-inline">
                    <h4 class="d-inline text-dark fs-14 fw-700 ml-3 mt-2">{{ translate('Indian Brand') }}</h4>
                </a>
            </div>

            <!-- Privacy Policy -->
            <div class="col-lg-3 col-6 policy-file">
                <a class="text-reset h-100 border-soft-light d-flex align-items-center justify-content-center p-2 p-md-4 d-block hov-ls-1" href="{{ route('privacypolicy') }}">
                    <img src="{{ asset('public/assets/img/offer.svg') }}" width="39" alt="" title="" class="img-small d-inline">
                    <h4 class="d-inline text-dark fs-14 fw-700 ml-3 mt-2">{{ translate('Get Offers') }}</h4>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Category wise Products -->
<!-- ----------------------------------------------------- -->
<div>
    <section class="py-md-5 py-sm-3">
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                <div class="col-12">
                    <div class="col-lg-8 col-md-8 my-md-8 my-3 mx-auto cities">
                        <!-- Title -->
                        <div class="aiz-carousel " data-items="8"
                            data-xxl-items="4" data-xl-items="4" data-lg-items="3" data-md-items="3" data-sm-items="3"
                            data-xs-items="3" data-arrows='false' data-infinite='false'>

                            @if (get_setting('home_categories') != null)
                                @php
                                    $home_categories = json_decode(get_setting('home_categories'));
                                    $categories = get_category($home_categories);
                                    $i = 0;
                                    @endphp
                                @foreach ($categories as $category_key => $category)
                                    @php
                                        $category_name = $category->getTranslation('name');
                                    @endphp
                                    <div class="carousel-item  @if($i == 0) active @endif">
                                        <a href="#" class="carousel-link city-btn  @if($i == 0) active @endif" data-city="{{ $category_name }}">{{ $category_name }}</a>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            @endif

                        </div>
                        <hr class="m-0 hrclass">
                    </div>
                </div>
                <!-- container of cites -->
                <div class="city_container col-md-12 mt-4">

                    @if (get_setting('home_categories') != null)
                        @php
                            $home_categories = json_decode(get_setting('home_categories'));
                            $categories = get_category($home_categories);
                            $i = 0;
                        @endphp
                        @foreach ($categories as $category_key => $category)
                            @php
                                $category_name = $category->getTranslation('name');
                            @endphp

                            <div class="city-content @if($i == 0) active @endif" id="{{ $category_name }}"  style="@if($i != 0)display:none;@endif">
                                <!-- city card -->
                                <div class="col-lg-3 col-md-4 d-flex justify-content-center p-0">
                                    <!-- Home category banner & name -->
                                    <div class="city_card">
                                        <div class="w-100 h-100"> <!---w-sm-260px h-260px mx-auto-->
                                            <a href="{{ route('products.category', $category->slug) }}" class="d-block h-100 w-100 w-xl-auto hov-scale-img overflow-hidden home-category-banner">
                                                <span class="position-absolute h-100 w-100 overflow-hidden">
                                                    <img src="{{ isset($category->coverImage->file_name) ? my_asset($category->coverImage->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                                        alt="{{ $category_name }}"
                                                        class="img-fit h-100 w-200 has-transition" 
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}" >
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--  carousel -->
                                <div class="col-lg-9 col-md-8 col-sm-6 col-xs-6 product_card_contianer">
                                    <div class="w-100 h-100 overflow-hidden dfd degf">
                                        <div class="aiz-carousel aiz-carousell2 aiz-web-resp arrow-x-0 arrow-inactive-none" data-items="3.5"
                                            data-xxl-items="3" data-xl-items="2.8" data-lg-items="2" data-md-items="1.5" data-sm-items="1"
                                            data-xs-items="1.2" data-arrows='true' data-infinite='false'>
                                            @foreach (get_cached_products($category->id) as $product_key => $product)
                                                @include('frontend.'.get_setting('homepage_select').'.partials.product_box_3', ['product' => $product])
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>
</div>


<section class="marqueeSection">
    <marquee class="bg-black p-2 text-white">
        <span class="martext">30% OFF SUMMER SALE IS LIVE</span> &nbsp;
        - &nbsp;
        <span class="martext">30% OFF SUMMER SALE IS LIVE</span>
        &nbsp;
        - &nbsp;
        <span class="martext">30% OFF SUMMER SALE IS LIVE</span>
        &nbsp;
        - &nbsp;
        <span class="martext">30% OFF SUMMER SALE IS LIVE</span>
        &nbsp;
        - &nbsp;
        <span class="martext">30% OFF SUMMER SALE IS LIVE</span>
        &nbsp;
        - &nbsp;
        <span class="martext">30% OFF SUMMER SALE IS LIVE</span>
        &nbsp;
        - &nbsp;
        <span class="martext">30% OFF SUMMER SALE IS LIVE</span>
        &nbsp;
        - &nbsp;
        <span class="martext">30% OFF SUMMER SALE IS LIVE</span>
        &nbsp;
        - &nbsp;
        <span class="martext">30% OFF SUMMER SALE IS LIVE</span>
        &nbsp;
        - &nbsp;
        <span class="martext">30% OFF SUMMER SALE IS LIVE</span>
    </marquee>
</section>

<!-- Flash Deal -->
@php
$flash_deal = get_featured_flash_deal();
$flash_deal_bg = get_setting('flash_deal_bg_color');
$flash_deal_bg_full_width = (get_setting('flash_deal_bg_full_width') == 1) ? true : false;
$flash_deal_banner_menu_text = ((get_setting('flash_deal_banner_menu_text') == 'dark') || (get_setting('flash_deal_banner_menu_text') == null)) ? 'text-dark' : 'text-white';

@endphp
@if ($flash_deal != null)
<section class="mb-2 mb-md-3 mt-2 mt-md-3" style="background: {{ ($flash_deal_bg_full_width && $flash_deal_bg != null) ? $flash_deal_bg : ''; }}" id="flash_deal">
    <div class="container">
        <div class="@if(!$flash_deal_bg_full_width) px-3 px-md-2rem @endif pb-3 pb-md-4" style="background: {{ $flash_deal_bg != null ? $flash_deal_bg : '#faf9f7'; }}">
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
             h-md-200px h-lg-s="h-100 w-100 w-xl-auto"
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
<!-- ----------------------------------------------------- -->
<!--<div id="section_newest"></div>-->
<!-- ----------------------------------------------------- -->

<!-- shop by concern start -->

<!-- for big devices -->
<section class="shopbyconcern d-lg-block d-md-block d-sm-none d-none">
    <div class="container">
        <div class="row">
            <div class="col pl-0">
                <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0 ">
                    <div class="top_heading">
                        <span class="">Shop By Concern</span>
                        <span></span>
                    </div>
                </h3>
            </div>
            <div class="col-md-12 my-md-4 my-3 ">
                <div class="row">
                    <div class="col">
                        <div class="row justify-content-end">
                            <div class="img_col1 shoBy">
                                
                                <img src=" {{asset('public/assets/img/decor-1.webp')}}" alt="" class="img-fluid img1">
                                <span><a href="{{ route('products.category', "decor-2jywo") }}" class="text-white">Decor</a></span>
                            </div>
                            <div class=" img_co2l shoBy">
                                <img src="https://img.freepik.com/premium-photo/woman-with-yellow-coat-red-background-with-yellow-background_972478-15634.jpg" alt="" class="img-fluid d-flex img2" >
                                <span><a href="{{ route('products.category', "women-clothings") }}" class="text-white">Women Clothing</a></span>
                            </div>
                            <div class=" img_col3 shoBy">
                                <img src="{{asset('public/assets/img/beg_2.jpg')}}" alt="" class="img-fluid img3">
                                <span><a href="{{ route('products.category', "demo-category-3") }}" class="text-white"> Handbags</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                                <div class=" img_col4 shoBy sbc_parent_div">
                                    <img src="{{ asset('public/assets/img/kids_1.jpg') }}" alt="" class="img-fluid img4">
                                    <span><a href="{{ route('products.category', "demo-category-2") }}" class="text-white">Kids clothings</a></span>
                                </div>
                            <div class="row flex-column">
                                <div class=" img_col5 shoBy">
                                    <img src="{{ asset('public/assets/img/gadgets1.webp') }}" alt="" class="img-fluid img5">
                                    <span><a href="{{ route('products.category', "gadgets-md7fv") }}" class="text-white">Gadgets</a></span>
                                </div>
                                <div class=" img_col6 shoBy">
                                    <img src="{{ asset('public/assets/img/daily.webp') }}" alt="" class="img-fluid img6">
                                    <span><a href="{{ route('products.category', "Daily-Essentials-CtrQg") }}" class="text-white">Daily Essentials</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- for small devices -->
<section class="shopbyconcern d-lg-none d-md-none d-sm-block d-block">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0 ">
                    <div class="top_heading">
                        <span class="">Shop By Concern</span>
                        <span></span>
                    </div>
                </h3>
            </div>
            <div class="col-md-12 my-md-4 my-3 ">
                <div class="row justify-content-center mobShoBy">
                    <div class="img_col1 shoBy">
                        <img src=" {{asset('public/assets/img/decor-1.jpg')}}" alt="" class="img-fluid img1">
                        <span><a href="{{ route('products.category', "decor-2jywo") }}" class="text-white">Decor</a></span>
                    </div>

                    <div class=" img_co2l shoBy">
                        <img src="https://img.freepik.com/premium-photo/woman-with-yellow-coat-red-background-with-yellow-background_972478-15634.jpg" alt="" class="img-fluid d-flex img2">
                        <span><a href="{{ route('products.category', "women-clothings") }}" class="text-white">Women Clothing</a></span>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class=" img_col4 shoBy mob-img-box">
                        <img src="{{ asset('public/assets/img/kids3.jpg') }}" alt="" class="img-fluid img4">
                        <span><a href="{{ route('products.category', "demo-category-2") }}" class="text-white"> Kids clothings</a></span>
                    </div>
                </div>


                <div class="row justify-content-center ">
                    <div class="img_col3 shoBy mob-img-box">
                        <img src="{{ asset('public/assets/img/beg_2.jpg') }}" alt="" class="img-fluid img3">
                        <span><a href="{{ route('products.category', "demo-category-3") }}" class="text-white">Handbags</a></span>
                    </div>
                </div>
                <div class="row justify-content-center mobShoBy">
                    <div class="img_col5 shoBy">
                        <img src="{{ asset('public/assets/img/gadgets1.png') }}" alt="" class="img-fluid img5">
                        <span><a href="{{ route('products.category', "gadgets-md7fv") }}" class="text-white">Gadgets</a></span>
                    </div>
                    <div class=" img_col6 shoBy">
                        <img src="{{ asset('public/assets/img/daily.png') }}" alt="" class="img-fluid img6">
                        <span><a href="{{ route('products.category', "Daily-Essentials-CtrQg") }}" class="text-white">Daily Essentials</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- shop by concern end -->


<!-- Top Sellers -->
@if (get_setting('vendor_system_activation') == 1)
@php
$best_selers = get_best_sellers(5);
@endphp
@if (count($best_selers) > 0)
<section class="mb-2 mb-md-3 mt-2 mt-md-3 top_seller_list">
    <div class="container px-md-0">
        <!-- Top Section -->
        <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
            <!-- Title -->
            <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                <div class="top_heading to_h_mob">
                    <span class="">{{ translate('Top Sellers') }}</span>
                    <span></span>
                </div>
            </h3>
            <!-- Links -->
            <div class="d-md-flex ">
                <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                    href="{{ route('sellers') }}">{{ translate('View All Sellers') }}</a>
            </div>
        </div>
        <!-- Sellers Section -->
        <div class="aiz-carousel aiz-carousel1 arrow-x-0 arrow-inactive-none" data-items="4" data-xxl-items="4"
            data-xl-items="4" data-lg-items="3.4" data-md-items="2.5" data-sm-items="2" data-xs-items="5"
            data-arrows="true" data-dots="false" data-infinite="true">
            @foreach ($best_selers as $key => $seller)
            @if ($seller->user != null)
            <div class="carousel-box h-100 position-relative text-center @if ($key == 0) @endif has-transition">
                <div class="seller_cards mob_top_seller">
                    <!-- Shop logo & Verification Status -->
                    <div class="position-relative mx-auto size-100px size-md-120px">
                        <a href="{{ route('shop.visit', $seller->slug) }}"
                            class="d-flex mx-auto justify-content-center align-item-center size-100px size-md-120px border overflow-hidden hov-scale-img sell_sec_aizcarouselbox"
                            tabindex="0">
                            <img src="{{ asset('public/assets/img/P_img.png') }}"
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
                    <h2 class="seller_name">
                        <a href="{{ route('shop.visit', $seller->slug) }}"
                            class="text-reset hov-text-primary " tabindex="0">{{ $seller->name }}</a>
                    </h2>
                    <!-- Shop Rating -->
                    <div class="rating rating-mr-1 text-dark mb-3">
                        <div class="rating_star">
                            {{ renderStarRating($seller->rating) }}
                        </div>
                        <span class="opacity-60 fs-14 fw-600">{{ $seller->num_of_reviews }}
                            {{ translate('Reviews') }}</span>
                    </div>
                    <!-- Visit Button -->
                    <a href="{{ route('shop.visit', $seller->slug) }}" class="btn-visit">
                        <span class="button-textt">{{ translate('Visit Store') }} <i class="las la-arrow-right ml-2"></i> </span>
                       
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

<!-- video slider start -->
<section class="proVideoSec mt-5">
    <div class="container">
        <div class="aiz-carousel aiz-carousel1 sm-gutters-17" data-items="4" data-xxl-items="3" data-xl-items="3"
        data-lg-items="3" data-md-items="2" data-sm-items="2" data-xs-items="1" data-arrows="true"
                    data-dots="false" data-autoplay="true" data-infinite="true">

           <div class="carousel-box position-relative p-0 has-transition">
                <video class="col-md-12 vd_radius23"  width="100%" height="100%" controls autoplay muted playsinline>
                    <source src="{{ static_asset('assets/img/i1.mp4') }}" type="video/mp4">
                    <source src="{{ static_asset('assets/img/i1.mp4') }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
            
            
            <div class="carousel-box position-relative p-0 has-transition">
                <video class="col-md-12 vd_radius23"  width="100%" height="100%" controls autoplay muted playsinline>
                    <source src="{{ static_asset('assets/img/i2.mp4') }}" type="video/mp4">
                    <source src="{{ static_asset('assets/img/i2.mp4') }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="carousel-box position-relative p-0 has-transition">
                <video class="col-md-12 vd_radius23"  width="100%" height="100%" controls autoplay muted playsinline>
                    <source src="{{ static_asset('assets/img/i3.mp4') }}" type="video/mp4">
                    <source src="{{ static_asset('assets/img/i3.mp4') }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="carousel-box position-relative p-0 has-transition">
                <video class="col-md-12 vd_radius23"  width="100%" height="100%" controls autoplay muted playsinline>
                    <source src="{{ static_asset('assets/img/i4.mp4') }}" type="video/mp4">
                    <source src="{{ static_asset('assets/img/i4.mp4') }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="carousel-box position-relative p-0 has-transition">
                <video class="col-md-12 vd_radius23" width="100%" height="100%" controls autoplay muted playsinline>
                    <source src="{{ static_asset('assets/img/i5.mp4') }}" type="video/mp4">
                    <source src="{{ static_asset('assets/img/i5.mp4') }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="carousel-box position-relative p-0 has-transition">
                <video class="col-md-12 vd_radius23" width="100%" height="100%" controls autoplay muted playsinline>
                    <source src="{{ static_asset('assets/img/i6.mp4') }}" type="video/mp4">
                    <source src="{{ static_asset('assets/img/i6.mp4') }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</section>
<!-- video slider end -->

<!-- Winning Kart Products -->
@if (count($featured_categories) > 0)
<section class="mb-2 mb-md-3 mt-2 mt-md-3 winPro">
    <div class="container px-md-0">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white">
                    <!-- Top Section -->
                    <div class="d-flex mt-2 mt-md-3 mb-2 mb-md-3 align-items-baseline justify-content-between">
                        <!-- Title -->
                        <h3 class="fs-16 fs-md-20 fw-600 mb-2 mb-sm-0 shead">
                            <span class="">{{ translate('Winning Kart Products') }}</span>
                            <span></span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="col-md-11 m-auto winnig_container_card">
            <div class="px-sm-3">
                <div class="aiz-carousel cate-mob-sz sm-gutters-17 mob_selectors" data-items="3" data-xxl-items="3" data-xl-items="3"
                    data-lg-items="3" data-md-items="2" data-sm-items="2" data-xs-items="1" data-arrows="true"
                    data-dots="false" data-autoplay="false" data-infinite="true">
                    @foreach ($featured_categories as $key => $category)
                    @php
                    $category_name = $category->getTranslation('name');
                    @endphp
                    <div class="carousel-box position-relative p-0 has-transition @if ($key == 0) @endif">
                        <div class="winnig_card">
                            <div class="h-100 w-xl-auto position-relative hov-scale-img overflow-hidden mob_wk_products">
                                <div class="xyz_img">
                                    <img src="{{ isset($category->coverImage->file_name) ? my_asset($category->coverImage->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                        alt="{{ $category_name }}"
                                        class="h-150 w-100 has-transition"
                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                </div>
                                <div class="winnig_tag">
                                    <div class="w-100">
                                        <a class=" text-white home-category-name"
                                            href="{{ route('products.category', $category->slug) }}">
                                            {{ $category_name }}&nbsp;
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="d-flex flex-wrap h-0px overflow-hidden mt-2">
                                            @foreach ($category->childrenCategories->take(6) as $key => $child_category)
                                            <a href="{{ route('products.category', $child_category->slug) }}" class="fs-13 fw-300 hov-text-white pr-3 pt-1" style="color: transparent;">
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
    </div>
</section>
@endif

<!-- Today's deal -->

<!-- Featured Products -->

<!-- Banner section 2 -->
@php $homeBanner2Images = get_setting('home_banner2_images', null, $lang); @endphp
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
        $lg_items = 3;
        $md_items = 2;
        $sm_items = 1;
        $xs_items = 1;
        if ($homeBanner5Images == null && $homeBanner6Images == null){
            $data_rows = 1;
            $xxl_items = 3;
            $xl_items = 3;
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
            <div class="col py-3 py-lg-0 mx-md-0">
                <div class="h-100" id="section_top_brands">
                    <div class="pt-3">
                        <!-- Top Section -->
                        <div class="d-flex mb-3 mb-md-4 align-items-baseline justify-content-between">
                            <!-- Title -->
                            <h3 class="top_heading">
                                <span class="">{{ translate('Best of The Winning Kart') }}</span>
                                <span></span>
                            </h3>
                            <!-- Links -->
                            
                        </div>
                        <!-- Brands Section -->
                        <div class="aiz-carousel aiz-carousel1 gutters-16 gutterss1 overflow-hidden arrow-inactive-none arrow-dark arrow-x-15" data-rows="{{ $data_rows }}" data-items="{{ $xxl_items }}" data-xxl-items="{{ $xxl_items }}" data-xl-items="{{ $xl_items }}" data-lg-items="{{ $lg_items }}" data-md-items="{{ $md_items }}" data-sm-items="{{ $sm_items }}" data-xs-items="{{ $xs_items }}" data-arrows="false" data-dots="true">
                            @foreach ($brands as $brand)
                            <div class="carousel-box hov-scale-img  my-2 mob_bwk">
                                <a href="{{ route('products.brand', $brand->slug) }}" class="winnigKart_box mob_best_wk" aria-current="true">
                                    <img src="{{ isset($brand->brandLogo->file_name) ? my_asset($brand->brandLogo->file_name) : static_asset('assets/img/placeholder.jpg') }}" alt="{{ $brand->getTranslation('name') }}" width="32" height="32" class="rounded-circle flex-shrink-0 border border-dark-subtle" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                    <div class="winnig_kart_Con">
                                        <div>
                                            <h6 class="mb-0 listgtitle">{{ $brand->getTranslation('name') }}</h6>
                                            <p class="mb-0 listgsubtitle">Get 60% off on first order</p>
                                        </div>
                                    </div>
                                </a>
                                
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
            <div class="{{ $col_val }} d-none d-xl-block">
                <div class="aiz-carousel overflow-hidden arrow-inactive-none arrow-dark arrow-x-0"
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

<!-- testimonial start -->
<section class="testimonials-section">

    <header class="section-header">
        <h1>Real People, Real Review</h1>
    </header>

    <div class="aiz-carousel aiz-caro-mob overflow-hidden arrow-inactive-none arrow-dark arrow-x-0"
        data-items="4" data-xxl-items="4"
        data-xl-items="3" data-lg-items="2" data-md-items="2" data-sm-items="1" data-xs-items="1"
        data-arrows="false" data-dots="true" data-infinite="true">

        <!-- Item1 Starts -->

 
       
        <div class="item testimonial-card">
            <main class="test-card-body">
                <div class="profile-image">
                    <img src="public/assets/img/istockphoto-1248743262-170667a.jpg" alt="Rajesh Mehta">
                    
                </div>
                <div class="quote">
                    <i class="fa fa-quote-left"></i>
                </div>
               
                <p class="text-center"> WinningKart has quickly become my favorite shopping destination! I recently bought a kurta and a few shirts, and they’ve become my go-to outfits. The quality is fantastic, and I love that I can find something stylish without breaking the bank. Plus, the compliments I’ve been getting don’t hurt either! I’m so glad I found a brand that just gets my style. </p>
                   
                <div class="profile-desc text-center">
                    <span class="">Rajesh Mehta</span>
                </div>
                <div class="ratings text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-stroke"></i>
                </div>
            </main>

        </div>
        
        <!-- Item1 Ends -->
        <!-- Item1 Starts -->
        <div class="item testimonial-card">
            <main class="test-card-body">
                <div class="profile-image">
                     <img src="public/assets/img/Srinita_2_tcm100-36560444.webp" alt="Anjali Sharma">
                    
                </div>
                <div class="quote">
                    <i class="fa fa-quote-left"></i>
                </div>
               
                <p class="text-center" >I’m someone who loves making my home cozy and inviting, and WinningKart helped me do just that. I ordered a few decor pieces, and they’ve completely transformed my living room. The quality is great, and the designs are even better in person. It feels so good to walk into a space that reflects my style. I’m definitely going back for more!</p>
                   
                <div class="profile-desc text-center">
                    <span class="">Anjali Sharma</span>
                </div>
                <div class="ratings text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-stroke"></i>
                </div>
            </main>

        </div>
        <!-- Item1 Ends -->
        <!-- Item1 Starts -->
        <div class="item testimonial-card">
            <main class="test-card-body">
                <div class="profile-image">
                    <img src="public/assets/img/smiling-young-indian-freelancer-posing-at-home-office-free-photo1.webp" alt="Vikram Singh">
                </div>
                <div class="quote">
                    <i class="fa fa-quote-left"></i>
                </div>
                
                <p class="text-center">I’m really picky about where I shop, especially online, but WinningKart impressed me. The variety is fantastic—I found both clothes and decor that I love—and the quality is even better than I expected. It’s not often you find an online store where everything just works, but WinningKart really nailed it. I’m already planning my next order!</p>
                  
                 

                <div class="profile-desc text-center">
                    <span class="">Vikram Singh</span>
                </div>
                <div class="ratings text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-stroke"></i>
                </div>
            </main>

        </div>
        <!-- Item1 Ends -->
        <!-- Item1 Starts -->
        <div class="item testimonial-card">
            <main class="test-card-body">
                <div class="profile-image">
                    <img src="public/assets/img/depositphotos_81211808-stock-photo-young-woman-at-outdoors.jpg" alt="Priya Desai">
                </div>
                <div class="quote">
                    <i class="fa fa-quote-left"></i>
                </div>
               
                <p class="text-center">Shopping online can be a bit of a gamble, but my experience with WinningKart was nothing short of amazing. I had a few questions about sizing, and their customer service team was so helpful and patient. When my order arrived, everything fit perfectly, and the decor items were just as beautiful as I’d hoped. It’s rare to find a company that cares this much about its customers.</p>
                 
                <div class="profile-desc text-center">
                    <span class="">Priya Desai</span>
                </div>
                <div class="ratings text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-stroke"></i>
                </div>
            </main>

        </div>

          <div class="item testimonial-card">
            <main class="test-card-body">
                <div class="profile-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVNJ_kKCThnq6TXdzkZQGy_OdsvnNtOdLgXMWb5j_bZ4aKwq-5oZmgDj217QQnqELL9vE&usqp=CAU" alt="Riya Sen">
                </div>
                <div class="quote">
                    <i class="fa fa-quote-left"></i>
                </div>
                 
                <p class="text-center">I’ve shopped at many online stores, but the quality at WinningKart really stands out. I ordered both clothing and decor, and I was impressed with everything I received. The fabrics are soft yet durable, and the decor pieces are so well-crafted. It’s clear that WinningKart puts a lot of thought into their products. I’ll definitely be back for more!</p>
                 
                <div class="profile-desc text-center">
                    <span class="">Riya Sen</span>
                </div>
                <div class="ratings text-center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-stroke"></i>
                </div>
            </main>

        </div>



        <!-- Item1 Ends -->




    </div>
    <!-- Owl Carousel Slider Ends -->

</section>
<!-- testimonial end -->

<!-- Auction Product -->
@if (addon_is_activated('auction'))
<div id="auction_products">

</div>
@endif

<!-- Classified Product -->
@if (get_setting('classified_product') == 1)
@php
$classified_products = get_home_page_classified_products(6);
@endphp
@if (count($classified_products) > 0)
<section class="py-3">
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


<script>
    

    const links = document.querySelectorAll('.city-btn');
    const contents = document.querySelectorAll('.city-content');

    links.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent the default action of the link
            const city = link.getAttribute('data-city');

            // Remove 'active' class from all links and contents
            links.forEach(l => l.classList.remove('active'));
            contents.forEach(content => {
                content.classList.remove('active');
                content.style.display = 'none'; // Hide all content sections
            });

            // Add 'active' class to the clicked link
            link.classList.add('active');

            // Show the selected city content and add 'active' class
            const selectedContent = document.getElementById(city);
            selectedContent.style.display = 'flex'; // Set display to block (or inline-block, depending on your layout)
            selectedContent.classList.add('active');

            document.querySelectorAll('.slick-arrow').forEach(function(element) {
                element.click();
            });
            

        });
    });

    // Initially display the first city and set it as active
    const initialCity = document.querySelector('.city-btn.active');
    if (initialCity) {
        const initialCityId = initialCity.getAttribute('data-city');
        const initialContent = document.getElementById(initialCityId);
        if (initialContent) {
            initialContent.style.display = 'flex'; // Set display to block (or inline-block)
            initialContent.classList.add('active');
        }
    }

</script>
@endsection



















