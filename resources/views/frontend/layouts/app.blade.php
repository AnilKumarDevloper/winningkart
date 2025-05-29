<!DOCTYPE html>

@php
    $rtl = get_session_language()->rtl;
@endphp

@if ($rtl == 1)
    <html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endif
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <meta name="app-url" content="{{ getBaseURL() }}">
    <meta name="file-base-url" content="{{ getFileBaseURL() }}">

    <title>@yield('meta_title', get_setting('website_name') . ' | ' . get_setting('site_motto'))</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="@yield('meta_description', get_setting('meta_description'))" />
    <meta name="keywords" content="@yield('meta_keywords', get_setting('meta_keywords'))">

    @yield('meta')

    @if (!isset($detailedProduct) && !isset($customer_product) && !isset($shop) && !isset($page) && !isset($blog))
        @php
            $meta_image = uploaded_asset(get_setting('meta_image'));
        @endphp
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="{{ get_setting('meta_title') }}">
        <meta itemprop="description" content="{{ get_setting('meta_description') }}">
        <meta itemprop="image" content="{{ $meta_image }}">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="{{ get_setting('meta_title') }}">
        <meta name="twitter:description" content="{{ get_setting('meta_description') }}">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content="{{ $meta_image }}">

        <!-- Open Graph data -->
        <meta property="og:title" content="{{ get_setting('meta_title') }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ route('home') }}" />
        <meta property="og:image" content="{{ $meta_image }}" />
        <meta property="og:description" content="{{ get_setting('meta_description') }}" />
        <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
        <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
    @endif

    <!-- Favicon -->
    @php
        $site_icon = uploaded_asset(get_setting('site_icon'));
    @endphp
    <link rel="icon" href="{{ $site_icon }}">
    <link rel="apple-touch-icon" href="{{ $site_icon }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ static_asset('assets/css/vendors.css') }}">
    @if ($rtl == 1)
        <link rel="stylesheet" href="{{ static_asset('assets/css/bootstrap-rtl.min.css') }}">
    @endif
    <link rel="stylesheet" href="{{ static_asset('assets/css/aiz-core.css?v=') }}{{ rand(1000, 9999) }}">
    <link rel="stylesheet" href="{{ static_asset('assets/css/custom-style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->


 <!--<div id="preloader">-->
 <!--       <div class="spinner"></div>-->
 <!--   </div>-->
     <!--/* Lightweight spinner */-->   
<!--<style>-->
   
<!--    #preloader {-->
<!--        position: fixed;-->
<!--        left: 0;-->
<!--        top: 0;-->
<!--        width: 100%;-->
<!--        height: 100%;-->
<!--        background-color: #fff;-->
<!--        display: flex;-->
<!--        justify-content: center;-->
<!--        align-items: center;-->
<!--        z-index: 9999;-->
<!--    }-->

<!--    .spinner {-->
<!--        width: 50px;-->
<!--        height: 50px;-->
<!--        border: 5px solid #f3f3f3;-->
<!--        border-top: 5px solid #fa6300;-->
<!--        border-radius: 50%;-->
<!--        animation: spin 0.5s linear infinite;-->
<!--    }-->

<!--    @keyframes spin {-->
<!--        0% { transform: rotate(0deg); }-->
<!--        100% { transform: rotate(360deg); }-->
<!--    }-->
<!--</style>-->
 
<!--    <script>-->
<!--window.addEventListener('load', function() {-->
<!--    var preloader = document.getElementById('preloader');-->
<!--    var content = document.getElementById('content');-->
    
   
<!--    preloader.style.display = 'none';-->
    
    
<!--    content.style.display = 'block';-->
<!--});-->

<!--</script>   -->

    <script>
        var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: '{!! translate('Nothing selected', null, true) !!}',
            nothing_found: '{!! translate('Nothing found', null, true) !!}',
            choose_file: '{{ translate('Choose file') }}',
            file_selected: '{{ translate('File selected') }}',
            files_selected: '{{ translate('Files selected') }}',
            add_more_files: '{{ translate('Add more files') }}',
            adding_more_files: '{{ translate('Adding more files') }}',
            drop_files_here_paste_or: '{{ translate('Drop files here, paste or') }}',
            browse: '{{ translate('Browse') }}',
            upload_complete: '{{ translate('Upload complete') }}',
            upload_paused: '{{ translate('Upload paused') }}',
            resume_upload: '{{ translate('Resume upload') }}',
            pause_upload: '{{ translate('Pause upload') }}',
            retry_upload: '{{ translate('Retry upload') }}',
            cancel_upload: '{{ translate('Cancel upload') }}',
            uploading: '{{ translate('Uploading') }}',
            processing: '{{ translate('Processing') }}',
            complete: '{{ translate('Complete') }}',
            file: '{{ translate('File') }}',
            files: '{{ translate('Files') }}',
        }
    </script>
    
    <style>
        :root{
            --blue: #3490f3;
            --hov-blue: #2e7fd6;
            --soft-blue: rgba(0, 123, 255, 0.15);
            --secondary-base: {{ get_setting('secondary_base_color', '#ffc519') }};
            --hov-secondary-base: {{ get_setting('secondary_base_hov_color', '#dbaa17') }};
            --soft-secondary-base: {{ hex2rgba(get_setting('secondary_base_color', '#ffc519'), 0.15) }};
            --gray: #9d9da6;
            --gray-dark: #8d8d8d;
            --secondary: #919199;
            --soft-secondary: rgba(145, 145, 153, 0.15);
            --success: #85b567;
            --soft-success: rgba(133, 181, 103, 0.15);
            --warning: #f3af3d;
            --soft-warning: rgba(243, 175, 61, 0.15);
            --light: #f5f5f5;
            --soft-light: #dfdfe6;
            --soft-white: #b5b5bf;
            --dark: #292933;
            --soft-dark: : #EF7528;
           /* --primary: {{ get_setting('base_color', '#d43533') }};*/
            --primary: #EF7528;
            --hov-primary: {{ get_setting('base_hov_color', '#9d1b1a') }};
            --soft-primary: {{ hex2rgba(get_setting('base_color', '#d43533'), 0.15) }};
        }
        body{
            font-family: 'Public Sans', sans-serif;
            font-weight: 400;
        }

        .pagination .page-link,
        .page-item.disabled .page-link {
            min-width: 32px;
            min-height: 32px;
            line-height: 32px;
            text-align: center;
            padding: 0;
            border: 1px solid var(--soft-light);
            font-size: 0.875rem;
            border-radius: 0 !important;
            color: var(--dark);
        }
        .pagination .page-item {
            margin: 0 5px;
        }

        .aiz-carousel.coupon-slider .slick-track{
            margin-left: 0;
        }

        .form-control:focus {
            border-width: 2px !important;
        }
        .iti__flag-container {
            padding: 2px;
        }
        .modal-content {
            border: 0 !important;
            border-radius: 0 !important;
        }

        .tagify.tagify--focus{
            border-width: 2px;
            border-color: var(--primary);
        }

        #map{
            width: 100%;
            height: 250px;
        }
        #edit_map{
            width: 100%;
            height: 250px;
        }

        .pac-container { z-index: 100000; }
    </style>

@if (get_setting('google_analytics') == 1)
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('TRACKING_ID') }}"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ env('TRACKING_ID') }}');
    </script>
@endif

    <!-- Event snippet for Purchase conversion page -->
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-16454175924/GtXBCKjLlM4ZELSZ-6U9',
            'value': 1.0,
            'currency': 'INR',
            'transaction_id': ''
        });
    </script>

    @if (get_setting('facebook_pixel') == 1)
        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ env('FACEBOOK_PIXEL_ID') }}');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id={{ env('FACEBOOK_PIXEL_ID') }}&ev=PageView&noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
    @endif
    @php
        echo get_setting('header_script');
    @endphp

</head>
<body>
    <!-- aiz-main-wrapper -->
    <div class="aiz-main-wrapper d-flex flex-column bg-white">
        @php
            $user = auth()->user();
            $user_avatar = null;
            $carts = [];
            if ($user && $user->avatar_original != null) {
                $user_avatar = uploaded_asset($user->avatar_original);
            } 
            $system_language = get_system_language();
            // if ($user != null) {
            //     $carts = App\Models\Cart::where('user_id', auth()->user()->id)->get();
            // }
        @endphp
        <!-- Header -->
        @include('frontend.inc.nav')
        @yield('content')
        <!-- footer -->
        @include('frontend.inc.footer')
    </div>

    <!-- Floating Buttons -->
    @include('frontend.inc.floating_buttons')

    @if(env("DEMO_MODE") == "On")
        <!-- demo nav -->
        @include('frontend.inc.demo_nav')
    @endif

    <!-- cookies agreement -->
    @if(get_setting('show_cookies_agreement') == 'on')
        <div class="aiz-cookie-alert shadow-xl">
            <div class="p-3 bg-dark rounded">
                <div class="text-white mb-3">
                    @php
                        echo get_setting('cookies_agreement_text');
                    @endphp
                </div>
                <button class="btn btn-primary aiz-cookie-accept">
                    {{ translate('Ok. I Understood') }}
                </button>
            </div>
        </div>
    @endif
 

    <!-- website popup -->
    @if (get_setting('show_website_popup') == 'on')
        <div class="modal website-popup removable-session d-none" data-key="website-popup" data-value="removed">
            <div class="absolute-full bg-black opacity-60"></div>
            <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-md mx-4 mx-md-auto">
                <div class="modal-content position-relative border-0 rounded-0">
                    <div class="aiz-editor-data">
                        {!! get_setting('website_popup_content') !!}
                    </div>
                    @if (get_setting('show_subscribe_form') == 'on')
                        <div class="pb-5 pt-4 px-3 px-md-5">
                            <form class="" method="POST" action="{{ route('subscribers.store') }}">
                                @csrf
                                <div class="form-group mb-0">
                                    <input type="email" class="form-control" placeholder="{{ translate('Your Email Address') }}" name="email" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-3">
                                    {{ translate('Subscribe Now') }}
                                </button>
                            </form>
                        </div>
                    @endif
                    <button class="absolute-top-right bg-white shadow-lg btn btn-circle btn-icon mr-n3 mt-n3 set-session" data-key="website-popup" data-value="removed" data-toggle="remove-parent" data-parent=".website-popup">
                        <i class="la la-close fs-20"></i>
                    </button>
                </div>
            </div>
        </div>
    @endif

    @include('frontend.'.get_setting('homepage_select').'.partials.modal')

    @include('frontend.'.get_setting('homepage_select').'.partials.account_delete_modal')

    <div class="modal fade" id="addToCart">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader text-center p-3">
                    <i class="las la-spinner la-spin la-3x"></i>
                </div>
                <button type="button" class="close absolute-top-right btn-icon close z-1 btn-circle bg-gray mr-2 mt-2 d-flex justify-content-center align-items-center" data-dismiss="modal" aria-label="Close" style="background: #ededf2; width: calc(2rem + 2px); height: calc(2rem + 2px);">
                    <span aria-hidden="true" class="fs-24 fw-700" style="margin-left: 2px;">&times;</span>
                </button>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>

    @yield('modal')    

    <div class="card toast-container position-fixed bottom-0 right-0 end-0 text-white p-2 tostscontainer" id="liveToast" style="background-color: #f60; display: none;">
        <div class="toasts" role="alert" aria-live="assertive" aria-atomic="true"> 
            <div class="toast-body">
               Hello, world! This is a toast  message.
            </div>
        </div>
    </div>

    <!---customer reviews modal section --->
 
<!---customer reviews modal end --->

 
    <!-- SCRIPTS -->
    <script src="{{ static_asset('assets/js/vendors.js') }}"></script>
    <script src="{{ static_asset('assets/js/aiz-core.js?v=') }}{{ rand(1000, 9999) }}"></script>
    <script src="{{ static_asset('assets/js/custom_new_changes.js') }}"></script>
    <script src="{{ static_asset('assets/js/custom_js.js') }}"></script>
 
    <script>
        let is_reviews_page = false;
    </script>
        <script>
            $(document).ready(function(){
                $('#liveToastBtn').on('click', function(){ 
                    $('#liveToast').show();
                     setTimeout(() =>{
                        $('#liveToast').hide();
                     },3000)
                });
            })
        </script>
      
        <script>
            $(document).ready(function () {  
                $("body").on("click", "#toggleSidebar", function () {  
                    $(".right_sidebar").toggleClass("showSidebar");
                    $(".overlayer-2").toggleClass("showOverlay");
                });  
                $("body").on("click", ".overlayer-2", function () {
                    $(".right_sidebar").removeClass("showSidebar");
                    $(this).removeClass("showOverlay");
                });
                $("body").on("click", "#closeArroCart", function () {
                    $(".right_sidebar").removeClass("showSidebar");
                    $('.overlayer-2').removeClass("showOverlay");
                });
            });
            // product_offer_details function 
            $(document).on('click', '#product_offer_element', function(){
                let data_mrp = $(this).data('mrp');
                let data_discountonmrp = $(this).data('discountonmrp');
                let data_youpay = $(this).data('youpay'); 
                $("#data_mrp").html('₹'+data_mrp);
                $("#data_discountonmrp").html('₹'+data_discountonmrp);
                $("#data_youpay").html('₹'+data_youpay);
                $('#product_offer_details').show(); 
                $('.overlayer-3').show(); 
            });
            // close function
            $(document).on('click', '.close_isBtn', function(){
                $('#product_offer_details').hide();
                $('.overlayer-3').hide();
                $('#select_Quantity').hide();
                $('#shipping_charge').hide();
            });
            //shipping charge function
            $(document).on('click', '#shipping_charge_btn', function(){
                $('#shipping_charge').show();
                $('.overlayer-3').show();
            });
            // coupon function 
            $(document).on("click", "#CouponsCode", function (){
                $('.couponoutLayer').hide();
                $('#cart_elements').hide();
                $('#coupon_elements').show();
            });
             // coupon function 
            $(document).on("click", "#coupon_back_btn", function() { 
                $('#cart_elements').show();
                $('#coupon_elements').hide(); 
            });

            $(document).on("click", ".offerDetails", function(){
                $('.offerDetails').each(function (){
                    $(this).click(function(){
                        let couponcontainer = $(this).closest('.coupan-card');
                        $('#couponHeading').text(couponcontainer.find('.coupon-heading').text());
                        $('#couponInfo').text(couponcontainer.find('.coupon-info').text()); 
                        $('#copyCouponCode').text(couponcontainer.find('.couponCode').text());
                        $('#savePrice').text(couponcontainer.find('.saveUpto').text());
                        $('#coupon_info').show();
                        $('.couponoutLayer').show();
                    });
                    $('.cancelCouponDetail, .closecouponDetail').on('click', function(){
                        $('#coupon_info').hide();
                        $('.couponoutLayer').hide();
                    });
                 });
            }) 
            $(document).on("click", "#copyCode", function(){
                let copyCouponCode = $('#copyCouponCode').text();
                    navigator.clipboard.writeText(copyCouponCode).then(function () {
                      $('#showcouponCode').show();
                    });
                    setTimeout(() =>{
                        $('#showcouponCode').hide();
                    },4000)
            });

         

            $(document).on("click", ".quantity_button", function(){
                let item_id = $(this).data('item-id');
                let selected_qty = $("#item_qty_"+item_id).text();
                $("#cart_item_id").val(item_id);
                if(selected_qty > 5){
                    $("input[name='quantity_val']").prop('checked', false);
                    $("input[name='quantity_val_5_plus']").prop('checked', true);
                    $("input[name='quantity_val_5_plus']:checked").val(selected_qty);
                }else{
                    $("input[name='quantity_val']").prop('checked', false);
                    $("input[name='quantity_val_5_plus']").prop('checked', false);
                    $("input[name='quantity_val'][value='" + selected_qty + "']").prop('checked', true);
                }
                $('#select_Quantity').show();
                $('.overlayer-3').show();
            });

            $(document).on('change', 'input[name="quantity_val"]', function(){
                let p_qty = $(this).val();
                let item_id = $("#cart_item_id").val();
                updateQuantity(item_id, p_qty);  
                $("#item_qty_"+item_id).html(p_qty);
            });

            $(document).on("click", "#quantity_val_5_plus", function(){
                let selected_qty = $("input[name='quantity_val']:checked").val();
                if(selected_qty > 5 || selected_qty === undefined){
                    selected_qty = $("input[name='quantity_val_5_plus']:checked").val();
                }
                $('#select_Quantity').hide();
                $("#selectedqty").val(selected_qty);
                $('#quantity_five_plus').show();
                $('.overlayer-3').show();
            });
            $(document).on("click", ".close_btn_quantity_five_plus", function(){
                $("input[name='quantity_val_5_plus']").prop('checked', false);
                $('#quantity_five_plus').hide();
                $('#select_Quantity').show();
                $('.overlayer-3').show();
            });

            $(document).on("click", "#submit_five_plus_qty", function(){
                let selectedqty = $("#selectedqty").val();
                let item_id = $("#cart_item_id").val();
                updateQuantity(item_id, selectedqty);
                // $("#item_qty_"+item_id).html(p_qty);
            });

            $('#signup_with_otp').on('input', function(){
                let number_val = $(this).val();
                let reg = number_val.slice(0, 10);
                $(this).val(reg);
               
            });
            $(document).ready(function() {
                $('#toggle_signin_btn').on('click', function(event){
                    event.stopPropagation();
                    $('.signin_user_element').toggle(); 
                });
                $('.closeArrowBag').on('click', function(){
                    $(".right_sidebar").removeClass("showSidebar");
                    $('.overlayer-2').removeClass("showOverlay"); 
                });
                $('.closeArrow').on('click', function(){
                    $(".right_sidebar").removeClass("showSidebar");
                    $('.overlayer-2').removeClass("showOverlay"); 
                });
                // overlayer- function
                $('.overlayer-3').on('click', function(){
                    $(this).hide();
                    $('#product_offer_details').hide(); 
                    $('#select_Quantity').hide();
                    $('#shipping_charge').hide();
                    $('#coupon_info').hide();
                });
                // signin_user_element
                $('body').on('click', function(){  
                    $('.signin_user_element').hide();  
                });
                $('.signin_user_element').on('click', function(event){
                    event.stopPropagation();
                });
            });
            $(document).ready(function (){
                let defaultitemcolor =  $('.thiscolor').first().addClass('activethis').data();
                $('.selectedcolor').css('background', defaultitemcolor.label);
                $('.thiscolor').on('click', function(){
                    $('.thiscolor.activethis').removeClass('activethis');
                    $(this).addClass('activethis');
                    const selectedItemColor = $(this).data();
                    $('.selectedcolor').css('background', selectedItemColor.label);
                });
                $('#addtowishlist').on('click', function(){
                    let addTowishlist_icon = $('#addTowishlist_icon');
                    let removeFromWishlist_icon = $('#removeFromWishlist_icon');
                    if(addTowishlist_icon.is(':visible')){
                       removeFromWishlist_icon.show();
                       addTowishlist_icon.hide();
                    }else{
                        removeFromWishlist_icon.hide();
                        addTowishlist_icon.show();
                    }
                          
                });
            });
            /// navbar function
            document.querySelectorAll('.luxeItems').forEach(function(hoverElement){
                hoverElement.addEventListener('mouseover', function(){
                    const navValue = hoverElement.getAttribute('data-nav');  
                    const datamatch = document.querySelectorAll(`.datamatch[data-nav="${navValue}"]`);
                    datamatch.forEach(function(match){
                        match.style.display = 'block';
                    });
                    document.querySelectorAll('.datamatch').forEach(function(match){
                        if(!match.hasAttribute('data-nav') || match.getAttribute('data-nav') !== navValue){
                            match.style.display = 'none';
                        }
                    });
                });
            });
            /// product find image view function
            document.querySelectorAll('.findby').forEach(function(currElement){
                currElement.addEventListener('click', function(){ 
                    if(!currElement.classList.contains('findThis')){
                        currElement.classList.add('findThis');
                    }else{
                       currElement.classList.remove('findThis');
                    } 
                });
            });
            // filder all review page function
            $(document).ready(function () {
                $('#openFilter_shade').on('click', function(){
                    $("#filter_shade_element").toggle();
                });
                $('body').on("click", "#closeFilter_shade", function(){
                    $('#filter_shade_element').hide();
                });
                $('#openSortReviewBy').click(function(){
                    $('#filter_shade_element').hide();
                    $('.sortReviewBy, .reviewOverlay').show();
                });
                $('body').on('click', '.reviewOverlay', function () {
                    $('.sortReviewBy, .reviewOverlay').hide();
                });
                $('#review_login').on('click', function(){ 
                    $('#login_modal').hide();
                });
             }); 

             document.querySelectorAll('.mostHelpfullFilter').forEach(function (currentFilter) { 
                currentFilter.addEventListener('change', function(){   
                    document.querySelectorAll('.mostHelpfullFilter').forEach(function(prev){
                        prev.checked = false;
                    });
                    currentFilter.checked = true;
                    $('.sortReviewBy, .reviewOverlay').hide(); 
                });
            });
        </script>

     
        <script>
            
            // tab function in product page
            const openTab = (evt, tabName) => { 
                    let contents = document.querySelectorAll('.tab-contents');
                    contents.forEach(content => content.classList.remove('active'));
 
                    let tabLinks = document.querySelectorAll('.tab_link');
                    tabLinks.forEach(tabLinkElement => tabLinkElement.classList.remove('active')); 

                    document.getElementById(tabName).classList.add('active');
                    evt.currentTarget.classList.add('active'); 
                }; 
                // Set the default tab to open (optional)
                document.querySelector('.tab-link').click(); 
                 

                $("#readMore").on('click', function(){
                   
                    let detailsContainer  = $('.detailsContainer').toggleClass('maxHeights');
                    let isvisibleclass = $('.maxHeights').is(":visible");
                    let readMore = isvisibleclass === false ? "Read Less" : "Read More";
                    $('#readMore').text(readMore);

                    if(isvisibleclass === false){
                          $('#arrowclass').removeClass('ri-arrow-down-s-line');
                          $('#arrowclass').addClass('ri-arrow-up-s-line'); 
                    }else{
                          $('#arrowclass').removeClass('ri-arrow-up-s-line');
                          $('#arrowclass').addClass('ri-arrow-down-s-line');
                    } 
                });
             
                document.querySelectorAll('.itemSizeList').forEach(function(element){
                    element.addEventListener('click', function(){
                        const itemSizeList = document.querySelectorAll('.itemSizeList');
                        itemSizeList.forEach( (item) => item.classList.remove('active')); 
                        element.classList.add ('active');  
                    });
                }); 
        </script>
        <script>
            $(document).on("click", ".preview_button", function() { 
                let wrapper = $(this).closest('.hover_content').parent(); 
                let parentElements = wrapper.find('.hiddenCartElement'); 
                parentElements.slideDown();  
                let variant_preview_btn = wrapper.find('.variant_preview_btn'); 
                variant_preview_btn.hide();
                let variant_add_to_cart_btn = wrapper.find('.variant_add_to_cart_btn'); 
                variant_add_to_cart_btn.show();
            });
            $(document).on("click", ".close_selectseciton", function(){
                let wrapper = $(this).closest('.select_size_color').parent(); 
                let variant_preview_btn = wrapper.find('.variant_preview_btn'); 
                variant_preview_btn.show();
                let variant_add_to_cart_btn = wrapper.find('.variant_add_to_cart_btn'); 
                variant_add_to_cart_btn.hide(); 
                let parentElements = $(this).closest('.select_size_color');  
                parentElements.slideUp(); 
            });
        </script> 
<!---------------------->
    @if (get_setting('facebook_chat') == 1)
        <script type="text/javascript">
            window.fbAsyncInit = function() {
                FB.init({
                  xfbml            : true,
                  version          : 'v3.3'
                });
              };

              (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div id="fb-root"></div>
        <!-- Your customer chat code -->
        <div class="fb-customerchat"
          attribution=setup_tool
          page_id="{{ env('FACEBOOK_PAGE_ID') }}">
        </div>
    @endif

    <script>
        @foreach (session('flash_notification', collect())->toArray() as $message)
            AIZ.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
        @endforeach
    </script>

    <script>
        @if (Route::currentRouteName() == 'home' || Route::currentRouteName() == '/')

            $.post('{{ route('home.section.featured') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('{{ route('home.section.todays_deal') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#todays_deal').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('{{ route('home.section.best_selling') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('{{ route('home.section.newest_products') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_newest').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('{{ route('home.section.auction_products') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#auction_products').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('{{ route('home.section.home_categories') }}', {
                _token: '{{ csrf_token() }}'
            }, function(data) {
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });
        @endif

        $(document).ready(function() {
            $('.category-nav-element').each(function(i, el) {

                $(el).on('mouseover', function(){
                    if(!$(el).find('.sub-cat-menu').hasClass('loaded')){
                        $.post('{{ route('category.elements') }}', {
                            _token: AIZ.data.csrf,
                            id:$(el).data('id'
                            )}, function(data){
                            $(el).find('.sub-cat-menu').addClass('loaded').html(data);
                        });
                    }
                });
            });

            $('.category-nav-element-new').each(function(i, el) {

                $(el).on('mouseover', function(){
                    if(!$(el).find('.sub-cat-menu-new').hasClass('loaded')){
                        $.post('{{ route('category.elements') }}', {
                            _token: AIZ.data.csrf,
                            id:$(el).data('id'
                            )}, function(data){
                            // $(el).find('.sub-cat-menu-new').addClass('loaded').html(data);
                            $('.home-banner-area').find('.sub-cat-menu-new').addClass('loaded').removeClass('d-none').html(data);
                        });
                    }
                });
            });

            $(document).ready(function() {
                let subCatMenu = $('.home-banner-area').find('.sub-cat-menu-new');

                function hideSubCatMenu() {
                    subCatMenu.removeClass('loaded').addClass('d-none');
                }

                // Function to check if pointer is not over the elements
                function checkPointer() {
                    if (!$('.category-nav-element-new:hover').length && !$('.sub-cat-menu-new:hover').length) {
                        hideSubCatMenu();
                    }
                }

                // Set an interval to repeatedly check the pointer position
                setInterval(checkPointer, 100); // Check every 100ms, adjust the interval as needed
            });




            if ($('#lang-change').length > 0) {
                $('#lang-change .dropdown-menu a').each(function() {
                    $(this).on('click', function(e){
                        e.preventDefault();
                        var $this = $(this);
                        var locale = $this.data('flag');
                        $.post('{{ route('language.change') }}',{_token: AIZ.data.csrf, locale:locale}, function(data){
                            location.reload();
                        });

                    });
                });
            }

            if ($('#currency-change').length > 0) {
                $('#currency-change .dropdown-menu a').each(function() {
                    $(this).on('click', function(e){
                        e.preventDefault();
                        var $this = $(this);
                        var currency_code = $this.data('currency');
                        $.post('{{ route('currency.change') }}',{_token: AIZ.data.csrf, currency_code:currency_code}, function(data){
                            location.reload();
                        });

                    });
                });
            }
        });

        $('#search').on('keyup', function(){
            search();
        });

        $('#search').on('focus', function(){
            search();
        });

        function search(){
            var searchKey = $('#search').val();
            if(searchKey.length > 0){
                $('body').addClass("typed-search-box-shown");

                $('.typed-search-box').removeClass('d-none');
                $('.search-preloader').removeClass('d-none');
                $.post('{{ route('search.ajax') }}', { _token: AIZ.data.csrf, search:searchKey}, function(data){
                    if(data == '0'){
                        // $('.typed-search-box').addClass('d-none');
                        $('#search-content').html(null);
                        $('.typed-search-box .search-nothing').removeClass('d-none').html('{{ translate('Sorry, nothing found for') }} <strong>"'+searchKey+'"</strong>');
                        $('.search-preloader').addClass('d-none');

                    }
                    else{
                        $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                        $('#search-content').html(data);
                        $('.search-preloader').addClass('d-none');
                    }
                });
            }
            else {
                $('.typed-search-box').addClass('d-none');
                $('body').removeClass("typed-search-box-shown");
            }
        }

        $(".aiz-user-top-menu").on("mouseover", function (event) {
            $(".hover-user-top-menu").addClass('active');
        })
        .on("mouseout", function (event) {
            $(".hover-user-top-menu").removeClass('active');
        });
  
        $(document).on("click", function(event){
            var $trigger = $("#category-menu-bar");
            if($trigger !== event.target && !$trigger.has(event.target).length){
                $("#click-category-menu").slideUp("fast");;
                $("#category-menu-bar-icon").removeClass('show');
            }
        });

        function updateNavCart(view,count){
            $('.cart-count').html(count);
            $('#cart_items').html(view);
        }

        function removeFromCart(key){
            $.post('{{ route('cart.removeFromCart') }}', {
                _token  : AIZ.data.csrf,
                id      :  key
            }, function(data){
                // console.log(data);
                updateNavCart(data.nav_cart_view,data.cart_count);
                $('#cart-summary').html(data.cart_view);
                AIZ.plugins.notify('success', "{{ translate('Item has been removed from cart') }}");
                $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())-1);
            });
        }

        function showLoginModal() {
            $('#login_modal').modal();
        }

        function addToCompare(id){
            $.post('{{ route('compare.addToCompare') }}', {_token: AIZ.data.csrf, id:id}, function(data){
                $('#compare').html(data);
                AIZ.plugins.notify('success', "{{ translate('Item has been added to compare list') }}");
                $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html())+1);
            });
        }

        function addToWishList(id){
            @if (Auth::check() && Auth::user()->user_type == 'customer')
                $.post('{{ route('wishlists.store') }}', {_token: AIZ.data.csrf, id:id}, function(data){
                    if(data != 0){
                        $('#wishlist').html(data);
                        AIZ.plugins.notify('success', "{{ translate('Item has been added to wishlist') }}");
                    }
                    else{
                        AIZ.plugins.notify('warning', "{{ translate('Please login first') }}");
                    }
                });
            @elseif(Auth::check() && Auth::user()->user_type != 'customer')
                AIZ.plugins.notify('warning', "{{ translate('Please Login as a customer to add products to the WishList.') }}");
            @else
                AIZ.plugins.notify('warning', "{{ translate('Please login first') }}");
            @endif
        }

        function showAddToCartModal(id){
            if(!$('#modal-size').hasClass('modal-lg')){
                $('#modal-size').addClass('modal-lg');
            }
            $('#addToCart-modal-body').html(null);
            $('#addToCart').modal();
            $('.c-preloader').show();
            $.post('{{ route('cart.showCartModal') }}', {_token: AIZ.data.csrf, id:id}, function(data){
                $('.c-preloader').hide();
                $('#addToCart-modal-body').html(data);
                AIZ.plugins.slickCarousel();
                AIZ.plugins.zoom();
                AIZ.extra.plusMinus();
                getVariantPrice();
            });
        }

        $('.option-choice-form input').on('change', function(){
            let p_id = $("#p_id").val(); 
            getVariantPrice(p_id);
        });

        $("#color_dropdown").change(function (){
            let selectedColor = $(this).val();
            let p_id = $("#p_id").val();
            // 1. Check the corresponding radio input
            $("input[name='color']").each(function (){
                if($(this).val() === selectedColor){
                    $(this).prop("checked", true);
                }else{
                    $(this).prop("checked", false);
                }
            });
            // 2. Update background of .selectedcolor
            $(".thiscolor").each(function (){
                if($(this).data("color-name") === selectedColor){
                    $(this).addClass("activethis");
                }else{
                    $(this).removeClass("activethis");
                }
            });
            getVariantPrice(p_id);
        });
 
    function getVariantPrice(p_id){
            let product_form = $("#option-choice-form_"+p_id);
            if(product_form.find('input[name=quantity]').val() > 0 && checkAddToCartValidity(p_id)){
                let selectedColor = $('input[name="color"]:checked').val();
                $("#color_dropdown").val(selectedColor);
                $.ajax({
                    type:"POST",
                    url: '{{ route('products.variant_price') }}',
                    data: $('#option-choice-form_'+p_id).serializeArray(),
                    success: function(data){
                        $('.product-gallery-thumb .carousel-box').each(function (i) {
                            if($(this).data('variation') && data.variation == $(this).data('variation')){
                                $('.product-gallery-thumb').slick('slickGoTo', i);
                            }
                        })
                        $('#option-choice-form #chosen_price_div').removeClass('d-none');
                        $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                        $('#product_unit_price').html(data.price); 
                        $('#available-quantity').html(data.quantity);
                        $('.input-number').prop('max', data.max_limit); 
                        if(parseInt(data.in_stock) == 0 && data.digital  == 0){
                            $('.buy-now').addClass('d-none');
                            $('.add-to-cart').addClass('d-none');
                            $('.out-of-stock').removeClass('d-none');
                        }else{
                           $('.buy-now').removeClass('d-none');
                           $('.add-to-cart').removeClass('d-none');
                           $('.out-of-stock').addClass('d-none');
                        }
                        AIZ.extra.plusMinus();
                    }
                });
            }
        }

        function checkAddToCartValidity(p_id){
            var names = {};
            let product_form = $("#option-choice-form_"+p_id);
            // $('#option-choice-form input:radio').each(function() {
            //     names[$(this).attr('name')] = true;
            // });
            product_form.find('input:radio').each(function () {
                names[$(this).attr('name')] = true;
            });
            var count = 0;
            $.each(names, function() {
                count++;
            });
            // if($('#option-choice-form input:radio:checked').length == count){
            //     return true;
            // }
            if(product_form.find('input:radio:checked').length === count){
                // All required options selected
                return true;
            }
            return false;
        }

        function addToCart(p_id){
            @if (Auth::check() && Auth::user()->user_type != 'customer')
                AIZ.plugins.notify('warning', "{{ translate('Please Login as a customer to add products to the Cart.') }}");
                return false;
            @endif

            if(checkAddToCartValidity(p_id)){
                // $('#addToCart').modal();
                // $('.c-preloader').show();
                $.ajax({
                    type:"POST",
                    url: '{{ route('cart.addToCart') }}',
                    data: $('#option-choice-form_'+p_id).serializeArray(),
                    success: function(data){
                        AIZ.plugins.notify('success', "{{ translate('Product added into cart.') }}");
                        // $('#addToCart-modal-body').html(null);
                        // $('.c-preloader').hide();
                        // $('#modal-size').removeClass('modal-lg');
                        // $('#addToCart-modal-body').html(data.modal_view);
                       AIZ.extra.plusMinus();
                       AIZ.plugins.slickCarousel();
                       updateNavCart(data.nav_cart_view,data.cart_count);
                    }
                });
            }
            else{
                AIZ.plugins.notify('warning', "{{ translate('Please choose all the options') }}");
            }
        }

        function buyNow(){
            @if (Auth::check() && Auth::user()->user_type != 'customer')
                AIZ.plugins.notify('warning', "{{ translate('Please Login as a customer to add products to the Cart.') }}");
                return false;
            @endif

            if(checkAddToCartValidity()) {
                $('#addToCart-modal-body').html(null);
                $('#addToCart').modal();
                $('.c-preloader').show();
                $.ajax({
                    type:"POST",
                    url: '{{ route('cart.addToCart') }}',
                    data: $('#option-choice-form').serializeArray(),
                    success: function(data){
                        if(data.status == 1){
                            $('#addToCart-modal-body').html(data.modal_view);
                            updateNavCart(data.nav_cart_view,data.cart_count);
                            window.location.replace("{{ route('cart') }}");
                        }
                        else{
                            $('#addToCart-modal-body').html(null);
                            $('.c-preloader').hide();
                            $('#modal-size').removeClass('modal-lg');
                            $('#addToCart-modal-body').html(data.modal_view);
                        }
                    }
               });
            }
            else{
                AIZ.plugins.notify('warning', "{{ translate('Please choose all the options') }}");
            }
        }

        function bid_single_modal(bid_product_id, min_bid_amount){
            @if (Auth::check() && (isCustomer() || isSeller()))
                var min_bid_amount_text = "({{ translate('Min Bid Amount: ') }}"+min_bid_amount+")";
                $('#min_bid_amount').text(min_bid_amount_text);
                $('#bid_product_id').val(bid_product_id);
                $('#bid_amount').attr('min', min_bid_amount);
                $('#bid_for_product').modal('show');
            @elseif (Auth::check() && isAdmin())
                AIZ.plugins.notify('warning', '{{ translate('Sorry, Only customers & Sellers can Bid.') }}');
            @else
                $('#login_modal').modal('show');
            @endif
        }

        function clickToSlide(btn,id){
            $('#'+id+' .aiz-carousel').find('.'+btn).trigger('click');
            $('#'+id+' .slide-arrow').removeClass('link-disable');
            var arrow = btn=='slick-prev' ? 'arrow-prev' : 'arrow-next';
            if ($('#'+id+' .aiz-carousel').find('.'+btn).hasClass('slick-disabled')) {
                $('#'+id).find('.'+arrow).addClass('link-disable');
            }
        }
        
        function goToView(params) {
            document.getElementById(params).scrollIntoView({behavior: "smooth", block: "center"});
        }

        function copyCouponCode(code){
            navigator.clipboard.writeText(code);
            AIZ.plugins.notify('success', "{{ translate('Coupon Code Copied') }}");
        }

        $(document).ready(function(){
            $('.cart-animate').animate({margin : 0}, "slow");

            $({deg: 0}).animate({deg: 360}, {
                duration: 2000,
                step: function(now) {
                    $('.cart-rotate').css({
                        transform: 'rotate(' + now + 'deg)'
                    });
                }
            });

            setTimeout(function(){
                $('.cart-ok').css({ fill: '#d43533' });
            }, 2000);

        });

         // select Quantity function
        // $('.quantity_button').on('click', function(){
        //     $('#select_Quantity').show();
        //     $('.overlayer-3').show();
        // });

        function updateQuantity(key, element){

            $.post('{{ route('cart.updateQuantity') }}', {
                _token: AIZ.data.csrf,
                id: key,
                quantity: element
            }, function(data){
                // console.log(key);
                // console.log(data);
                // updateNavCart(data.nav_cart_view, data.cart_count);
                // $('#cart-summary').html(data.cart_view);
                updateNavCart(data.nav_cart_view,data.cart_count);

                $(".right_sidebar").addClass("showSidebar");
                $(".overlayer-2").addClass("showOverlay");
                $('#select_Quantity').hide();
                $('.overlayer-3').hide();  
            });
        }

        
    </script>

    @if(addon_is_activated('otp_system'))
        <script type="text/javascript">
            // Country Code
            var isPhoneShown = true,
                countryData = window.intlTelInputGlobals.getCountryData(),
                input = document.querySelector("#phone-code");

            for (var i = 0; i < countryData.length; i++) {
                var country = countryData[i];
                if (country.iso2 == 'bd') {
                    country.dialCode = '88';
                }
            }

            var iti = intlTelInput(input, {
                separateDialCode: true,
                utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",
                onlyCountries: @php echo get_active_countries()->pluck('code') @endphp ,
                customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                    if (selectedCountryData.iso2 == 'bd') {
                        return "01xxxxxxxxx";
                    }
                    return selectedCountryPlaceholder;
                }
            });

            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);

            input.addEventListener("countrychange", function(e) {
                // var currentMask = e.currentTarget.placeholder;
                var country = iti.getSelectedCountryData();
                $('input[name=country_code]').val(country.dialCode);

            });

            function toggleEmailPhone(el) {
                if (isPhoneShown) {
                    $('.phone-form-group').addClass('d-none');
                    $('.email-form-group').removeClass('d-none');
                    $('input[name=phone]').val(null);
                    isPhoneShown = false;
                    $(el).html('{{ translate('Use Phone Number') }}');
                } else {
                    $('.phone-form-group').removeClass('d-none');
                    $('.email-form-group').addClass('d-none');
                    $('input[name=email]').val(null);
                    isPhoneShown = true;
                    $(el).html('{{ translate('Use Email ID') }}');
                }
            }
        </script>
    @endif

    <script>
        var acc = document.getElementsByClassName("aiz-accordion-heading");
        var i;
        for(i = 0; i < acc.length; i++){
            acc[i].addEventListener("click", function(){
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if(panel.style.maxHeight){
                    panel.style.maxHeight = null;
                }else{
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>

    <script>
        function showFloatingButtons() {
            document.querySelector('.floating-buttons-section').classList.toggle('show');;
        }
    </script>

    @if (env("DEMO_MODE") == "On")
        <script>
            var demoNav = document.querySelector('.aiz-demo-nav');
            var menuBtn = document.querySelector('.aiz-demo-nav-toggler');
            var lineOne = document.querySelector('.aiz-demo-nav-toggler .aiz-demo-nav-btn .line--1');
            var lineTwo = document.querySelector('.aiz-demo-nav-toggler .aiz-demo-nav-btn .line--2');
            var lineThree = document.querySelector('.aiz-demo-nav-toggler .aiz-demo-nav-btn .line--3');
            menuBtn.addEventListener('click', () => {
                toggleDemoNav();
            });

            function toggleDemoNav() {
                // demoNav.classList.toggle('show');
                demoNav.classList.toggle('shadow-none');
                lineOne.classList.toggle('line-cross');
                lineTwo.classList.toggle('line-fade-out');
                lineThree.classList.toggle('line-cross');
                if ($('.aiz-demo-nav-toggler').hasClass('show')) {
                    $('.aiz-demo-nav-toggler').removeClass('show');
                    demoHideOverlay();
                }else{
                    $('.aiz-demo-nav-toggler').addClass('show');
                    demoShowOverlay();
                }
            }

            $('.aiz-demos').click(function(e){
                if (!e.target.closest('.aiz-demos .aiz-demo-content')) {
                    toggleDemoNav();
                }
            });

            function demoShowOverlay(){
                $('.top-banner').removeClass('z-1035').addClass('z-1');
                $('.top-navbar').removeClass('z-1035').addClass('z-1');
                $('header').removeClass('z-1020').addClass('z-1');
                $('.aiz-demos').addClass('show');
            }

            function demoHideOverlay(cls=null){
                if($('.aiz-demos').hasClass('show')){
                    $('.aiz-demos').removeClass('show');
                    $('.top-banner').delay(800).removeClass('z-1').addClass('z-1035');
                    $('.top-navbar').delay(800).removeClass('z-1').addClass('z-1035');
                    $('header').delay(800).removeClass('z-1').addClass('z-1020');
                }
            }
        </script>
    @endif

    <script>
    $(document).ready(function () {  
        document.querySelectorAll('.cat_slug').forEach( async (item) => {    
            let cat_slug_value = item.value;
            let city_slider = document.getElementById(`city_wise_cotegory_${cat_slug_value}`);
            let base_url = document.querySelector('meta[name="app-url"]').getAttribute('content');

            let city_slider_html = ""; 
            let cityApi_url =  "{{route('api_test_product_list', [':category_slug'])}}"; 
            cityApi_url = cityApi_url.replace(':category_slug', cat_slug_value); 

            const response = await fetch(cityApi_url);
            const responseData = await response.json();
           

            console.log(responseData)
            const data = responseData.data; 
         
            data.forEach((element) =>{
                let product_img_url = element.photos[0];
                let product_img = `${base_url}Public/${product_img_url}`

              
                
              let ratingHTML = "";
                let rating = element.rating;  

                for (let i = 1; i <= 5; i++) {
                    if (rating >= 1) {
                        ratingHTML += '<i class="las la-star active"></i>';
                    } else if (rating >= 0.5) {
                        ratingHTML += '<i class="las la-star half"></i>';
                    } else {
                        ratingHTML += '<i class="las la-star"></i>';
                    }
                    rating -= 1; // reduce for next iteration
                }
                 
                city_slider_html += ` 
                    <div class="col-md-12 p-2" >
                        <form>
                            <div class="pr_height bg-white">
                                <div class="productWrapper d-flex flex-column justify-content-between">
                                    <div class="productDetails productDetail_element"> 
                                        <div class="bestsell"> 
                                            <a href=" ">
                                                <div class="productImages">
                                                    <img src="${product_img}"
                                                    alt=" " class="css-11gn9r6">
                                                </div>
                                                <div class="productAllDetails">
                                                    <div class="productTitle" >${element.name}</div>
                                                    <div class="reviews_div d-flex justify-content-center flex-wrap">  
                                                            <span class="product_mrp_">MRP: 
                                                                <span><del>₹ 864</del></span> 
                                                            </span>
                                                            <span class="current_mrp">₹562</span>   
                                                            <span class="price_off">10% Off </span>
                                                    </div>
                                                    <div class="row no-gutters mb-3">
                                                        <div class="col-12 relevents">  
                                                                <span class="rating rating-mr-1"> 
                                                                     ${ratingHTML} (${element.reviews})
                                                                </span>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </a>
                                        </div>
                                    </div>    
                                        <div class="select_size_color hiddenCartElement"> 
                                            <div> 
                                                    <div class="header_select">
                                                        <span>Select a </span>
                                                        <button type="button" class="close_selectseciton"><i class="ri-close-large-line"></i></button> 
                                                    </div> 
                                                    <div class="select_customSize">
                                                        <ul class="selectYourSize">  
                                                            <li class="select_customSize_list">
                                                                <div class="form-check d-flex align-items-center">
                                                                    <input class="form-check-input sizeWise"  
                                                                    type="radio" name="attribute_id_"> 
                                                                    <label class="form-check-label" for="sizeM">  variant name</label>
                                                                </div> 
                                                            </li> 
                                                        </ul>
                                                    </div>
                                                    <div class="sizeContainer"> 
                                                        <div class="reviews_div d-flex justify-content-center flex-wrap"> 
                                                            <span class="product_mrp_">MRP: <span><del class="opacity-70 fs-16 mr-2" >₹364</del></span></span>
                                                            <span class="current_mrp mrp_m_${element.id}">₹ 451</span>     
                                                            <span class="price_off" >  545 % Off</span>      
                                                        </div> 
                                                    </div> 
                                                </div>
                                        </div>  
                                        <div class="hover_content variant_preview_btn "  > 
                                        <div class="actionSection_1">
                                            <button type="button" class="wishlist_button_text">
                                                <span><i class="ri-heart-line"></i></span>
                                            </button>
                                            <button type="button" class="preview_button">Preview Size</button>
                                        </div>  
                                    </div> 
                                    <div class="hover_content variant_add_to_cart_btn" style="display:none">
                                        <div class="detail_and_addToCart">
                                            <a href="#" class="view_detail_2"><button class="" type="button" >View Details</button></a>
                                            <button type="button" class="addToCart_button">add to cart</button>
                                        </div>
                                    </div>   
                            </div>
                            </div> 
                        </form>
                </div>  
            `;
            })
             let main_html = `<div class="aiz-carousel aiz-carousell2 aiz-web-resp arrow-x-0 arrow-inactive-none homeSlider" data-items="3.5"
                                    data-xxl-items="3" data-xl-items="2.8" data-lg-items="2" data-md-items="1.5" data-sm-items="1"
                                    data-xs-items="1.2" data-arrows='true' data-infinite='false' > 
                                    ${city_slider_html}
                            </div> `;
            city_slider.innerHTML = main_html; 
        });
})
</script>

    @yield('script')

    @php
        echo "testing00";
        echo get_setting('footer_script');
    @endphp

</body>
</html>
