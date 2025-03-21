@php
use App\Models\Brand;
$topbar_banner = get_setting('topbar_banner');
$topbar_banner_medium = get_setting('topbar_banner_medium');
$topbar_banner_small = get_setting('topbar_banner_small');
$topbar_banner_asset = uploaded_asset($topbar_banner);

$featured_categories = Cache::rememberForever('featured_categories', function ()
{
    return Category::with('bannerImage')->where('featured', 1)->get();
});

$brands = Brand::orderBy('name', 'asc');
$brands = $brands->paginate(15);

@endphp

<style>
   #user-dropdown {
        display: none;
        position: absolute;
        left: unset;
        right: 30px;
        background-color: white;
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        width: 200px;
    }
    #back-to-top {
        position: fixed;
        bottom: 82px;
        right: 29px;
        display: none;
        background-color: #FF6600;
        color: white;
        text-align: center;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 14px;
        z-index: 1000;
    }
    #back-to-top:hover {
        background-color: #0056b3;
    }
    .custom-tabs-container {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
    }
    .custom-tabs {
        display: flex;
        cursor: pointer;
    }
    .custom-tab {
        flex: 1;
        padding: 10px;
        text-align: center;
        border: none;
        border-bottom: 1px solid #ddd;
        color: #000;
        font-size: 1rem;
        font-weight: 500 !important;
    }
    .custom-tab.active {
        background-color: white;
        font-weight: bold;
        color: #ee7626;
        border-bottom: 2px solid #ee7626;
    }

    .custom-tab-content {
        background-color: #fff;
        display: none; /* Hide all tab content by default */
    }

    .custom-tab-content.active {
        display: block; /* Show the active tab content */
        opacity: 1;
        transform: translateY(0);
    }

    .ns-mob-pad{
        padding-left: 0rem !important;
    }
    .sidebar-container {
        width: 100%;
        max-width: 350px;
        height: 100vh;
        background-color: rgb(255, 255, 255);
    }
    .nav-sid-header{
        position: fixed;
        padding: 0px 8px;
        background: rgb(255, 255, 255);
        width: 50%;
    }
    .ns-btnnb{
        background: transparent;
        font-size: 16px;
        font-weight: 500;
        line-height: 24px;
        letter-spacing: -0.1px;
        padding: 18px 0px;
        width: 80%;
        border-top: none;
        border-right: none;
        border-left: none;
        border-image: initial;
        border-bottom: 2px solid rgb(234, 116, 39);
        color: rgb(234, 116, 39);
    }
    .sidebar-menu {
        padding-left: 0px;
        padding-right: 0px;
        list-style: none;
        height: calc(100% - 70px) !important;
        padding-top: 0px !important;
        padding-block: 103px;
        overflow-y: auto;
    }
    .sidebar-menu li {
        margin-bottom: 0px;
    }
    .sidebar-link {
        color: #3a4047 !important;
        text-decoration: none !important;
        font-size: 17px;
        font-weight: 400;
        padding: 25px;
        padding-block: 7px;
        background-color: white !important;
        transition: background-color 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .sidebar-link:hover {
        background-color: #555;
    }
    .sidebar-link:hover,
    .sidebar-link.active {
        background-color: #ee7626 !important;
        color: #fff !important;
    }
    .brand-sidebar-link {
        color: #3a4047 !important;
        text-decoration: none !important;
        font-size: 17px;
        font-weight: 400;
        padding: 25px;
        padding-block: 7px;
        background-color: white !important;
        transition: background-color 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .brand-sidebar-link:hover {
        background-color: #555;
    }
    .brand-sidebar-link:hover,
    .brand-sidebar-link.active {
        background-color: #ee7626 !important;
        color: #fff !important;
    }
    .sub-menu-ullist {
        max-height: 0;
        overflow: hidden;
        margin-left: 0px !important;
        padding-left: 0px;
        transition: max-height 0.4s ease, padding 0.4s ease;
    }
    .sub-menu-ullist li {
        list-style: none;
        margin-bottom: 0px;
        padding-left: 30px;
        margin-left: 0px;
        border-bottom: 1px solid rgb(245, 245, 245);
    }
    .sub-menu-ullist a {
        color: #3a4047;
        text-decoration: none;
        padding: 10px 15px;
        font-size: 17px;
        font-weight: 400;
        text-transform: capitalize;
        display: block;
        transition: background-color 0.3s ease;
    }
    .sub-menu-ullist.show {
      max-height: 500px;
      padding-top: 10px;
      padding-bottom: 0px;
    }
    .sb-menu-icon {
        font-size: 22px;
        color: #ee7626;
    }
    .sb-menu-icon:hover{
        color: #fff;
    }
    .active-sideicon {
        color: white;
    }
    .sb-menu-icon.open {
        content: '-';
    }
    .has-submenu{
        width: 100% !important;
        border-bottom: 1px solid rgb(245, 245, 245);
    }

        .tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            gap:5px;
        }
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border: 1px solid #ddd;
            border-bottom: none;
            background: #ddd;
            transition: background 0.3s;
            border-radius: 5px;
        }
        .tab:hover, .tab.active {
            background:  #ee7626;
        }
        .tab-content {
            display: none;
            padding: 20px;
            border: 1px solid #ddd;
        }
        .tab-content.active {
            display: block;
        }
    
    .tabsection{
        color: #fff;
    }

</style>

@if ($topbar_banner != null)
<div class="position-relative top-banner removable-session z-1035 d-none" data-key="top-banner"
    data-value="removed">
    <a href="{{ get_setting('topbar_banner_link') }}" class="d-block text-reset h-40px h-lg-60px">
        <!-- For Large device -->
        <img src="{{ $topbar_banner_asset }}" class="d-none d-xl-block img-fit h-100" alt="{{ translate('topbar_banner') }}">
        <!-- For Medium device -->
        <img src="{{ $topbar_banner_medium != null ? uploaded_asset($topbar_banner_medium) : $topbar_banner_asset }}"
            class="d-none d-md-block d-xl-none img-fit h-100" alt="{{ translate('topbar_banner') }}">
        <!-- For Small device -->
        <img src="{{ $topbar_banner_small != null ? uploaded_asset($topbar_banner_small) : $topbar_banner_asset }}"
            class="d-md-none img-fit h-100" alt="{{ translate('topbar_banner') }}">
    </a>
    <button class="btn text-white h-100 absolute-top-right set-session" data-key="top-banner"
        data-value="removed" data-toggle="remove-parent" data-parent=".top-banner">
        <i class="la la-close la-2x"></i>
    </button>
</div>
@endif


<header class="@if (get_setting('header_stikcy') == 'on') sticky-top @endif z-1020 bg-white">
    <!-- Top Bar -->
<div class="top-navbar bg-black z-1035 h-35px h-sm-auto">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col">
                <ul class="list-inline d-flex justify-content-between justify-content-lg-start mb-0">
                    <!-- Language switcher --> 
                    <li class="list-inline-item dropdown mr-4">
                        <a href="javascript:void(0)" class="text-white fs-12 py-2" style="display: flex;align-items: center;" aria-label="BEAUTY BONANZA Get Your Amazing Deals">
                            <span class="">BEAUTY BONANZA Get Your Amazing Deals</span>
                        </a>
                    </li> 
                </ul>
            </div>

            <div class="col-6 text-right d-none d-lg-block">
                <ul class="list-inline mb-0 h-100 d-flex justify-content-end align-items-center">

                       <li class="list-inline-item ml-3 mr-0 pl-0 py-2">
                            <a href=" "
                              class="text-white fs-12 pr-3 d-inline-block" aria-label="Help">Help</a>
                        </li>
                
                    <!-- @if (get_setting('vendor_system_activation') == 1)
                         
                        <li class="list-inline-item ml-3 mr-0 pl-0 py-2">
                            <a href="{{ route('shops.create') }}"
                                class="text-white fs-12 pr-3 d-inline-block border-width-2 border-right" aria-label="Become a Seller">{{ translate('Become a Seller !') }}</a>
                        </li>
                         
                        <li class="list-inline-item mr-0 pl-0 py-2">
                            <a href="{{ route('seller.login') }}"
                                class="text-white fs-12 pl-3 d-inline-block">{{ translate('Login to Seller') }}</a>
                        </li>
                    @endif
                    @if (get_setting('helpline_number'))
                       
                        <li class="list-inline-item ml-3 pl-3 mr-0 pr-0">
                            <a href="tel:{{ get_setting('helpline_number') }}"
                                class="text-secondary fs-12 d-inline-block py-2">
                                <span>{{ translate('Helpline') }}</span>
                                <span>{{ get_setting('helpline_number') }}</span>
                            </a>
                        </li>
                    @endif -->


                </ul>
            </div>

        </div>
    </div>
</div>
    <!-- Search Bar -->
    <div class="position-relative logo-bar-area border-bottom border-md-nonea z-1025">
    
    
        <div class="container p-0">
            <div class="d-flex align-items-center justify-content-between  navbaritemsBetween">
                <!-- top menu sidebar button -->
                 <div class="d-flex align-items-center">
                        <button type="button" class="btn d-lg-none mr-3 mr-sm-4 p-0 active" data-toggle="class-toggle"
                            data-target=".aiz-top-menu-sidebar">
                            <svg id="Component_43_1" data-name="Component 43 – 1" xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" viewBox="0 0 16 16">
                                <rect id="Rectangle_19062" data-name="Rectangle 19062" width="16" height="2"
                                    transform="translate(0 7)" fill="#919199" />
                                <rect id="Rectangle_19063" data-name="Rectangle 19063" width="16" height="2"
                                    fill="#919199" />
                                <rect id="Rectangle_19064" data-name="Rectangle 19064" width="16" height="2"
                                    transform="translate(0 14)" fill="#919199" />
                            </svg>
                        </button>
                        <!-- Header Logo -->
                        <div class="col-auto pl-0 pr-3 d-none align-items-center">
                            <a href="javascript:void(0)" class="text-dark fs-12 pl-3 d-inline-block"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; {{ translate('Delhi') }}</a>
                        </div>  
                        <div class="col-auto pl-0 pr-3 d-flex align-items-center justify-content-center">
                            <a class="d-block py-20px mr-3 ml-0" href="{{ route('home') }}">
                                @php
                                $header_logo = get_setting('header_logo');
                                @endphp
                                @if ($header_logo != null)
                                <img src="{{ uploaded_asset($header_logo) }}" alt="{{ env('APP_NAME') }}"
                                    class="mw-100 h-8px h-md-25px" height="20">
                                @else
                                <img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"
                                    class="mw-100 h-30px h-md-40px" height="40">
                                @endif
                            </a>
                        </div>

                        <div class="navbarList">
                            <div class="navbar_list">
                                <ul class="navbar_list_li ga2">
                                     <li>
                                        <a href="/" class="headerSubMenu">Categories</a> 
                                    </li>
                                    <li>
                                        <a href="/brands" class="headerSubMenu">Brands</a>
                                        <div class="menuList">
                                                <div class="row bgOdd"> 
                                                    <div class="col-4 bg-even">
                                                            <div class="submenu_">
                                                                <div class="searchBrands">  
                                                                    <i class="ri-search-line"></i>
                                                                    <input type="text" placeholder="Search Brands">
                                                                </div>
                                                                <ul class="mt-3">
                                                                    <li><a href="#"> List 1</a></li>
                                                                    <li><a href="#"> List 2</a></li> 
                                                                </ul>
                                                            </div>
                                                    </div> 

                                                    <div class="col-8 bg-even">
                                                        <div class="tabs">
                                                            <div class="tab tabsection active" data-tab="tab1">POPULAR</div>
                                                            <div class="tab tabsection " data-tab="tab2">lUXE</div>
                                                            <div class="tab tabsection" data-tab="tab3">ONLY AT WINNING KART</div>
                                                        </div> 

                                                        <div class="mt-3">
                                                            <div class="tab-content active" id="tab1" style="border: none;">
                                                                <div class="row">
                                                                    <div class="col-2">
                                                                        <img src="https://icon-library.com/images/brand-icon-png/brand-icon-png-1.jpg" class="w-100">
                                                                    </div>
                                                                    <div class="col-2">
                                                                        <img src="https://icon-library.com/images/brand-icon-png/brand-icon-png-1.jpg" class="w-100">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-content" id="tab2">Content for Tab 2</div>
                                                            <div class="tab-content" id="tab3">Content for Tab 3</div> 
                                                        </div>

                                                    </div> 

                                                </div>
                                        </div>
                                    </li>
                                    <li><a href="/categories" class="headerSubMenu">Luxe</a> 
                                        <div class="menuList">
                                                <div class="row bgOdd">  
                                                    <div class="col-3 bg-even">
                                                        <div class="submenu_">
                                                            <b>Accessories</b>
                                                            <ul class="mt-2">
                                                                <li><a href="#">  Accessories item 1</a></li>
                                                                <li><a href="#"> Accessories 2</a></li> 
                                                            </ul>
                                                        </div>
                                                    </div> 
                                                </div>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="/categories" class="headerSubMenu">Winning kart</a>
                                        <div class="menuList">
                                                <div class="row bgOdd"> 
                                                    <div class="col-3 bg-even">
                                                        <div class="submenu_">
                                                            <b>Skincare</b>
                                                            <ul class="mt-2">
                                                                <li><a href="#"> Skincare item 1</a></li>
                                                                <li><a href="#"> Skincare item 2</a></li>
                                                                <li><a href="#">  item 3</a></li>
                                                                <li><a href="#"> Skincare item 4</a></li>
                                                                <li><a href="#">  item 5</a></li>
                                                            </ul>
                                                        </div>
                                                    </div> 
                                                </div>
                                        </div>
                                    </li>
                                    
                                  
                                    <li><a href="/todays-deal" class="headerSubMenu">Todays Deals</a>
                                        <div class="menuList">
                                                <div class="row bgOdd"> 
                                                    <div class="col-3 bg-even">
                                                        <div class="submenu_">
                                                            <b>Saree</b>
                                                            <ul class="mt-2">
                                                                <li><a href="#"> Saree item 1</a></li> 
                                                            </ul>
                                                        </div>
                                                    </div> 
                                                    <div class="col-3 bg-even">
                                                        <div class="submenu_">
                                                            <b>Kurti</b>
                                                            <ul class="mt-2">
                                                                <li><a href="#"> Kurti item 1</a></li>
                                                                <li><a href="#"> Kurti item 2</a></li>
                                                                <li><a href="#"> item 3</a></li>
                                                                <li><a href="#"> Kurti item 4</a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div> 
                                                    <div class="col-3 bg-even">
                                                        <div class="submenu_">
                                                            <b>Cord Set</b>
                                                            <ul class="mt-2">
                                                                <li><a href="#"> Cord Set item 1</a></li> 
                                                                <li><a href="#"> Cord item 2</a></li> 
                                                                <li><a href="#"> Cord Set item 2</a></li> 
                                                            </ul>
                                                        </div>
                                                    </div> 
                                                </div>
                                        </div>
                                    </li> 
                                </ul>
                            </div>
                        </div>

                </div>

                <div class="d-flex  align-items-center"> 
                    <div>
                        <!-- Search Icon for small device -->
                        <div class="d-lg-none ml-auto mr-0">
                            <a class="p-2 d-block text-reset" href="javascript:void(0);" data-toggle="class-toggle"
                                data-target=".front-header-search">
                                <i class="las la-search la-flip-horizontal la-2x"></i>
                            </a>
                        </div>
                        <!-- Search field --> 
                    </div>  

                    <div class="d-flex align-items-center heardeSearch_area"> 
                        <!-- search box start --->
                        <div class="d-flex align-items-center heardeSearch_element">
                            <div class="flex-grow-1 front-header-search d-flex align-items-center bg-white mx-xl-2 d-none">
                                <div class="position-relative flex-grow-1 px-3 px-lg-0">
                                    <form action="{{ route('search') }}" method="GET" class="stop-propagation">
                                        <div class="d-flex position-relative align-items-center">
                                            <div class="d-lg-none" data-toggle="class-toggle"
                                                data-target=".front-header-search">
                                                <button class="btn px-2" type="button"><i
                                                        class="la la-2x la-long-arrow-left"></i></button>
                                            </div>
                                            <div class="search-input-box_header input_area d-flex align-items-center">

                                                <svg id="Group_723" data-name="Group 723" xmlns="http://www.w3.org/2000/svg"
                                                    width="20.001" height="20" viewBox="0 0 20.001 20">
                                                    <path id="Path_3090" data-name="Path 3090"
                                                        d="M9.847,17.839a7.993,7.993,0,1,1,7.993-7.993A8,8,0,0,1,9.847,17.839Zm0-14.387a6.394,6.394,0,1,0,6.394,6.394A6.4,6.4,0,0,0,9.847,3.453Z"
                                                        transform="translate(-1.854 -1.854)" fill="#b5b5bf" />
                                                    <path id="Path_3091" data-name="Path 3091"
                                                        d="M24.4,25.2a.8.8,0,0,1-.565-.234l-6.15-6.15a.8.8,0,0,1,1.13-1.13l6.15,6.15A.8.8,0,0,1,24.4,25.2Z"
                                                        transform="translate(-5.2 -5.2)" fill="#b5b5bf" />
                                                </svg>
                                                <input type="text"
                                                    class="border border-soft-light inpur_area fs-14 hov-animate-outline"
                                                    id="search" name="keyword"
                                                    @isset($query)
                                                    value="{{ $query }}"
                                                    @endisset
                                                    placeholder="{{ translate('I am shopping for...') }}" autocomplete="off"> 

                                            </div>
                                        </div>
                                    </form>
                                    <div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100"
                                        style="min-height: 200px">
                                        <div class="search-preloader absolute-top-center">
                                            <div class="dot-loader">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="search-nothing d-none p-3 text-center fs-16">

                                        </div>
                                        <div id="search-content" class="text-left">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- search box end --->
                            <div>
                               
                                @auth
                                <!--- aftar login user start -->
                                <div class="kjsif">
                                    <div class="userLogin">
                                       <span><i class="ri-user-line"></i></span>
                                       <div style="width: 90px;">{{ $user->name }}</div>
                                    </div>
                                    <div class="logout_Profile" >
                                        <ul class="p-0 m-0 loginDetailWithorder">
                                        @if (isCustomer()) 
                                            <li>
                                                <a href="{{ route('purchase_history.index') }}">
                                                    <div class="d-flex detailList1">
                                                        <span><i class="ri-book-2-line"></i></span>
                                                        <span>My Orders</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('profile') }}">
                                                    <div class="d-flex detailList1">
                                                        <span><i class="ri-user-line"></i></span>
                                                        <span>My Profile</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <div class="d-flex detailList1">
                                                        <span><i class="ri-wallet-line"></i></span>
                                                        <span>My Wallet</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <div class="d-flex detailList1">
                                                        <span><i class="ri-heart-line"></i></span>
                                                        <span>My Wishlist</span>
                                                    </div>
                                                </a>
                                            </li>
                                            @endif
                                            @if (isAdmin())

                                            <li>
                                                <a href="">
                                                    <div class="d-flex detailList1">
                                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16">
                                        <path id="Path_2916" data-name="Path 2916"
                                            d="M15.3,5.4,9.561.481A2,2,0,0,0,8.26,0H7.74a2,2,0,0,0-1.3.481L.7,5.4A2,2,0,0,0,0,6.92V14a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2V6.92A2,2,0,0,0,15.3,5.4M10,15H6V9A1,1,0,0,1,7,8H9a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H11V9A2,2,0,0,0,9,7H7A2,2,0,0,0,5,9v6H2a1,1,0,0,1-1-1V6.92a1,1,0,0,1,.349-.76l5.74-4.92A1,1,0,0,1,7.74,1h.52a1,1,0,0,1,.651.24l5.74,4.92A1,1,0,0,1,15,6.92Z"
                                            fill="#b5b5c0" />
                                    </svg></span>
                                                        <span>Dashboard</span>
                                                    </div>
                                                </a>
                                            </li>
                                            @endif
                            
                                            <li>
                                                <a href="{{ route('logout') }}">
                                                    <div class="d-flex detailList1">
                                                        <span><i class="ri-logout-circle-line"></i></span>
                                                        <span>Logout</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @else 
                                <div class="user_signIn">
                                        <button class="" id="toggle_signin_btn"> 
                                            Sign in
                                        </button>
                                </div> 
                                <div class="signin_user_element" style="display: none;">
                                        <div>
                                            <div class="loginTitle">Login or Signup</div>
                                            <span class="loginTitle2"> Register now and get 2000 winningkart reward points instantly!</span>
                                        </div>
                                        <div class="mt-3">
                                            <form action="{{ route('user.login') }}" method="POST">
                                                <div class="d-flex justify-content-between">
                                                    <span><input type="number" placeholder="Mobile Number" class="registerInputWithOtp" name="phone"></span>
                                                    <input type="hidden" name="country_code" value="91"> 
                                                    <button type="submit" class="send_otp_button">Send OTP</button>
                                                </div>
                                            </form>
                                        </div> 
                                        <div class="css-uzz1zj">
                                            <div class="css-1i13zhc"></div>
                                            <span class="css-19s7pxq">Or sign in using</span>
                                            <div class="css-1i13zhc"></div>
                                    </div>
                                        <!---- sign in text end --->
                                        <!--- register with email start --->
                                        <div class="css-j662fd">
                                            <a href="{{ route('user.login') }}" kind="secondary" shape="default" class="signinButton" >
                                                Sign in with Mobile / Email <i class="ri-arrow-right-wide-line"></i>
                                            </a>
                                        </div>  
                                </div>
                                <!--- login section elemnt end--->

                                @endauth
                                <!--- aftar login user end -->
                            </div>
                        </div> 


                        
                        <div id="cart_items"> 
                                <!--- right sidebar --> 

                                    @include('frontend.megamart.partials.drawer_cart')

                                    <!--empty cart start -->
                                    <!--empty cart end -->
                              
                                  <!--- right sidebar end --> 
                        </div>
                       

                        
                
                        
                    </div>
               </div>

                <!-- Compare -->
                <!-- <div class="d-none d-lg-block ml-3 mr-0">
                    <div class="" id="compare">
                        @include('frontend.'.get_setting('homepage_select').'.partials.compare')
                    </div>
                </div> --> 
                
                <!-- Wishlist -->
                <!-- <div class="d-none d-lg-block mr-3 ml-3">
                    <div class="" id="wishlist">
                        @include('frontend.'.get_setting('homepage_select').'.partials.wishlist')
                    </div>
                </div> -->

                <!--- sign in before elements ---->
                <!-- <div class="d-none d-xl-block mr-0">
                    @auth
                    <span
                        class="d-flex align-items-center nav-user-info py-20px @if (isAdmin()) ml-5 @endif"
                        id="nav-user-info">
                        
                        <span
                            class="size-20px rounded-circle overflow-hidden border border-transparent nav-user-img">
                            @if ($user->avatar_original != null)
                            <img src="{{ $user_avatar }}"
                                class="img-fit h-100" alt="{{ translate('avatar') }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                            @else
                            <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="image" alt="{{ translate('avatar') }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                            @endif
                        </span>
                       
                        <h4 class="h5 fs-14 fw-700 text-dark ml-2 mb-0">{{ $user->name }}</h4>
                    </span>
                    @else

                     
                    <div class="dropdown ">
                        <button class="btn btn-default dropdown-toggle d-inline px-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="user login">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 19.902 20.012">
                                <path id="fe2df171891038b33e9624c27e96e367" d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1.006,1.006,0,1,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1,10,10,0,0,0-6.25-8.19ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z" transform="translate(-2.064 -1.995)" fill="#91919b" />
                            </svg>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="{{ route('user.login') }}" class="dropdown-item">{{ translate('Sign In') }}</a>
                            <a href="{{ route('user.registration') }}" class="dropdown-item">{{ translate('Sign Up') }}</a>
                        </div>  
                    </div> 
                    @endauth
                </div> -->
                <!--- sign in before elements end ---->

                <!--- cart header  add this class ( d-lg-block )--->
                <div class="d-none mr-0">
                    <div class="" id="cart">
                        @include('frontend.'.get_setting("homepage_select").'.partials.cart')
                    </div>
                </div> 
                <!----------------------------->

                <!-----------------------------> 

            </div>
        </div>
        <!-- Loged in user Menus -->
        <div class="hover-user-top-menu position-absolute top-100 left-0 right-0 z-3">
            <div class="container">
                <div class="position-static float-right">
                    <div class="aiz-user-top-menu bg-white rounded-0 border-top shadow-sm" style="width:220px;">
                        <ul class="list-unstyled no-scrollbar mb-0 text-left">
                            @if (isAdmin())
                            <li class="user-top-nav-element border border-top-0" data-id="1">
                                <a href="{{ route('admin.dashboard') }}"
                                    class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16">
                                        <path id="Path_2916" data-name="Path 2916"
                                            d="M15.3,5.4,9.561.481A2,2,0,0,0,8.26,0H7.74a2,2,0,0,0-1.3.481L.7,5.4A2,2,0,0,0,0,6.92V14a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2V6.92A2,2,0,0,0,15.3,5.4M10,15H6V9A1,1,0,0,1,7,8H9a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H11V9A2,2,0,0,0,9,7H7A2,2,0,0,0,5,9v6H2a1,1,0,0,1-1-1V6.92a1,1,0,0,1,.349-.76l5.74-4.92A1,1,0,0,1,7.74,1h.52a1,1,0,0,1,.651.24l5.74,4.92A1,1,0,0,1,15,6.92Z"
                                            fill="#b5b5c0" />
                                    </svg>
                                    <span
                                        class="user-top-menu-name has-transition ml-3">{{ translate('Dashboard') }}</span>
                                </a>
                            </li>
                            @else
                            <li class="user-top-nav-element border border-top-0" data-id="1">
                                <a href="{{ route('dashboard') }}"
                                    class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16">
                                        <path id="Path_2916" data-name="Path 2916"
                                            d="M15.3,5.4,9.561.481A2,2,0,0,0,8.26,0H7.74a2,2,0,0,0-1.3.481L.7,5.4A2,2,0,0,0,0,6.92V14a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2V6.92A2,2,0,0,0,15.3,5.4M10,15H6V9A1,1,0,0,1,7,8H9a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H11V9A2,2,0,0,0,9,7H7A2,2,0,0,0,5,9v6H2a1,1,0,0,1-1-1V6.92a1,1,0,0,1,.349-.76l5.74-4.92A1,1,0,0,1,7.74,1h.52a1,1,0,0,1,.651.24l5.74,4.92A1,1,0,0,1,15,6.92Z"
                                            fill="#b5b5c0" />
                                    </svg>
                                    <span
                                        class="user-top-menu-name has-transition ml-3">{{ translate('Dashboard') }}</span>
                                </a>
                            </li>
                            @endif

                            @if (isCustomer())
                            <li class="user-top-nav-element border border-top-0" data-id="1">
                                <a href="{{ route('purchase_history.index') }}"
                                    class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16">
                                        <g id="Group_25261" data-name="Group 25261"
                                            transform="translate(-27.466 -542.963)">
                                            <path id="Path_2953" data-name="Path 2953"
                                                d="M14.5,5.963h-4a1.5,1.5,0,0,0,0,3h4a1.5,1.5,0,0,0,0-3m0,2h-4a.5.5,0,0,1,0-1h4a.5.5,0,0,1,0,1"
                                                transform="translate(22.966 537)" fill="#b5b5bf" />
                                            <path id="Path_2954" data-name="Path 2954"
                                                d="M12.991,8.963a.5.5,0,0,1,0-1H13.5a2.5,2.5,0,0,1,2.5,2.5v10a2.5,2.5,0,0,1-2.5,2.5H2.5a2.5,2.5,0,0,1-2.5-2.5v-10a2.5,2.5,0,0,1,2.5-2.5h.509a.5.5,0,0,1,0,1H2.5a1.5,1.5,0,0,0-1.5,1.5v10a1.5,1.5,0,0,0,1.5,1.5h11a1.5,1.5,0,0,0,1.5-1.5v-10a1.5,1.5,0,0,0-1.5-1.5Z"
                                                transform="translate(27.466 536)" fill="#b5b5bf" />
                                            <path id="Path_2955" data-name="Path 2955"
                                                d="M7.5,15.963h1a.5.5,0,0,1,.5.5v1a.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5v-1a.5.5,0,0,1,.5-.5"
                                                transform="translate(23.966 532)" fill="#b5b5bf" />
                                            <path id="Path_2956" data-name="Path 2956"
                                                d="M7.5,21.963h1a.5.5,0,0,1,.5.5v1a.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5v-1a.5.5,0,0,1,.5-.5"
                                                transform="translate(23.966 529)" fill="#b5b5bf" />
                                            <path id="Path_2957" data-name="Path 2957"
                                                d="M7.5,27.963h1a.5.5,0,0,1,.5.5v1a.5.5,0,0,1-.5.5h-1a.5.5,0,0,1-.5-.5v-1a.5.5,0,0,1,.5-.5"
                                                transform="translate(23.966 526)" fill="#b5b5bf" />
                                            <path id="Path_2958" data-name="Path 2958"
                                                d="M13.5,16.963h5a.5.5,0,0,1,0,1h-5a.5.5,0,0,1,0-1"
                                                transform="translate(20.966 531.5)" fill="#b5b5bf" />
                                            <path id="Path_2959" data-name="Path 2959"
                                                d="M13.5,22.963h5a.5.5,0,0,1,0,1h-5a.5.5,0,0,1,0-1"
                                                transform="translate(20.966 528.5)" fill="#b5b5bf" />
                                            <path id="Path_2960" data-name="Path 2960"
                                                d="M13.5,28.963h5a.5.5,0,0,1,0,1h-5a.5.5,0,0,1,0-1"
                                                transform="translate(20.966 525.5)" fill="#b5b5bf" />
                                        </g>
                                    </svg>
                                    <span
                                        class="user-top-menu-name has-transition ml-3">{{ translate('Purchase History') }}</span>
                                </a>
                            </li>
                            <li class="user-top-nav-element border border-top-0" data-id="1">
                                <a href="{{ route('digital_purchase_history.index') }}"
                                    class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16.001" height="16"
                                        viewBox="0 0 16.001 16">
                                        <g id="Group_25262" data-name="Group 25262"
                                            transform="translate(-1388.154 -562.604)">
                                            <path id="Path_2963" data-name="Path 2963"
                                                d="M77.864,98.69V92.1a.5.5,0,1,0-1,0V98.69l-1.437-1.437a.5.5,0,0,0-.707.707l1.851,1.852a1,1,0,0,0,.707.293h.172a1,1,0,0,0,.707-.293l1.851-1.852a.5.5,0,0,0-.7-.713Z"
                                                transform="translate(1318.79 478.5)" fill="#b5b5bf" />
                                            <path id="Path_2964" data-name="Path 2964"
                                                d="M67.155,88.6a3,3,0,0,1-.474-5.963q-.009-.089-.015-.179a5.5,5.5,0,0,1,10.977-.718,3.5,3.5,0,0,1-.989,6.859h-1.5a.5.5,0,0,1,0-1l1.5,0a2.5,2.5,0,0,0,.417-4.967.5.5,0,0,1-.417-.5,4.5,4.5,0,1,0-8.908.866.512.512,0,0,1,.009.121.5.5,0,0,1-.52.479,2,2,0,1,0-.162,4l.081,0h2a.5.5,0,0,1,0,1Z"
                                                transform="translate(1324 486)" fill="#b5b5bf" />
                                        </g>
                                    </svg>
                                    <span
                                        class="user-top-menu-name has-transition ml-3">{{ translate('Downloads') }}</span>
                                </a>
                            </li>
                            @if (get_setting('conversation_system') == 1)
                            <li class="user-top-nav-element border border-top-0" data-id="1">
                                <a href="{{ route('conversations.index') }}"
                                    class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16">
                                        <g id="Group_25263" data-name="Group 25263"
                                            transform="translate(1053.151 256.688)">
                                            <path id="Path_3012" data-name="Path 3012"
                                                d="M134.849,88.312h-8a2,2,0,0,0-2,2v5a2,2,0,0,0,2,2v3l2.4-3h5.6a2,2,0,0,0,2-2v-5a2,2,0,0,0-2-2m1,7a1,1,0,0,1-1,1h-8a1,1,0,0,1-1-1v-5a1,1,0,0,1,1-1h8a1,1,0,0,1,1,1Z"
                                                transform="translate(-1178 -341)" fill="#b5b5bf" />
                                            <path id="Path_3013" data-name="Path 3013"
                                                d="M134.849,81.312h8a1,1,0,0,1,1,1v5a1,1,0,0,1-1,1h-.5a.5.5,0,0,0,0,1h.5a2,2,0,0,0,2-2v-5a2,2,0,0,0-2-2h-8a2,2,0,0,0-2,2v.5a.5.5,0,0,0,1,0v-.5a1,1,0,0,1,1-1"
                                                transform="translate(-1182 -337)" fill="#b5b5bf" />
                                            <path id="Path_3014" data-name="Path 3014"
                                                d="M131.349,93.312h5a.5.5,0,0,1,0,1h-5a.5.5,0,0,1,0-1"
                                                transform="translate(-1181 -343.5)" fill="#b5b5bf" />
                                            <path id="Path_3015" data-name="Path 3015"
                                                d="M131.349,99.312h5a.5.5,0,1,1,0,1h-5a.5.5,0,1,1,0-1"
                                                transform="translate(-1181 -346.5)" fill="#b5b5bf" />
                                        </g>
                                    </svg>
                                    <span
                                        class="user-top-menu-name has-transition ml-3">{{ translate('Conversations') }}</span>
                                </a>
                            </li>
                            @endif

                            @if (get_setting('wallet_system') == 1)
                            <li class="user-top-nav-element border border-top-0" data-id="1">
                                <a href="{{ route('wallet.index') }}"
                                    class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="16"
                                        height="16" viewBox="0 0 16 16">
                                        <defs>
                                            <clipPath id="clip-path1">
                                                <rect id="Rectangle_1386" data-name="Rectangle 1386"
                                                    width="16" height="16" fill="#b5b5bf" />
                                            </clipPath>
                                        </defs>
                                        <g id="Group_8102" data-name="Group 8102"
                                            clip-path="url(#clip-path1)">
                                            <path id="Path_2936" data-name="Path 2936"
                                                d="M13.5,4H13V2.5A2.5,2.5,0,0,0,10.5,0h-8A2.5,2.5,0,0,0,0,2.5v11A2.5,2.5,0,0,0,2.5,16h11A2.5,2.5,0,0,0,16,13.5v-7A2.5,2.5,0,0,0,13.5,4M2.5,1h8A1.5,1.5,0,0,1,12,2.5V4H2.5a1.5,1.5,0,0,1,0-3M15,11H10a1,1,0,0,1,0-2h5Zm0-3H10a2,2,0,0,0,0,4h5v1.5A1.5,1.5,0,0,1,13.5,15H2.5A1.5,1.5,0,0,1,1,13.5v-9A2.5,2.5,0,0,0,2.5,5h11A1.5,1.5,0,0,1,15,6.5Z"
                                                fill="#b5b5bf" />
                                        </g>
                                    </svg>
                                    <span
                                        class="user-top-menu-name has-transition ml-3">{{ translate('My Wallet') }}</span>
                                </a>
                            </li>
                            @endif
                            <li class="user-top-nav-element border border-top-0" data-id="1">
                                <a href="{{ route('support_ticket.index') }}"
                                    class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16.001"
                                        viewBox="0 0 16 16.001">
                                        <g id="Group_25259" data-name="Group 25259"
                                            transform="translate(-316 -1066)">
                                            <path id="Subtraction_184" data-name="Subtraction 184"
                                                d="M16427.109,902H16420a8.015,8.015,0,1,1,8-8,8.278,8.278,0,0,1-1.422,4.535l1.244,2.132a.81.81,0,0,1,0,.891A.791.791,0,0,1,16427.109,902ZM16420,887a7,7,0,1,0,0,14h6.283c.275,0,.414,0,.549-.111s-.209-.574-.34-.748l0,0-.018-.022-1.064-1.6A6.829,6.829,0,0,0,16427,894a6.964,6.964,0,0,0-7-7Z"
                                                transform="translate(-16096 180)" fill="#b5b5bf" />
                                            <path id="Union_12" data-name="Union 12"
                                                d="M16414,895a1,1,0,1,1,1,1A1,1,0,0,1,16414,895Zm.5-2.5V891h.5a2,2,0,1,0-2-2h-1a3,3,0,1,1,3.5,2.958v.54a.5.5,0,1,1-1,0Zm-2.5-3.5h1a.5.5,0,1,1-1,0Z"
                                                transform="translate(-16090.998 183.001)" fill="#b5b5bf" />
                                        </g>
                                    </svg>
                                    <span
                                        class="user-top-menu-name has-transition ml-3">{{ translate('Support Ticket') }}</span>
                                </a>
                            </li>
                            @endif
                            <li class="user-top-nav-element border border-top-0" data-id="1">
                                <a href="{{ route('logout') }}"
                                    class="text-truncate text-dark px-4 fs-14 d-flex align-items-center hov-column-gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15.999"
                                        viewBox="0 0 16 15.999">
                                        <g id="Group_25503" data-name="Group 25503"
                                            transform="translate(-24.002 -377)">
                                            <g id="Group_25265" data-name="Group 25265"
                                                transform="translate(-216.534 -160)">
                                                <path id="Subtraction_192" data-name="Subtraction 192"
                                                    d="M12052.535,2920a8,8,0,0,1-4.569-14.567l.721.72a7,7,0,1,0,7.7,0l.721-.72a8,8,0,0,1-4.567,14.567Z"
                                                    transform="translate(-11803.999 -2367)" fill="#d43533" />
                                            </g>
                                            <rect id="Rectangle_19022" data-name="Rectangle 19022" width="1"
                                                height="8" rx="0.5" transform="translate(31.5 377)"
                                                fill="#d43533" />
                                        </g>
                                    </svg>
                                    <span class="user-top-menu-name text-primary has-transition ml-3">{{ translate('Logout') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Menu Bar -->
    <div class="d-none d-lg-block position-relative bg-primary h-50px" style="display: none!important;">
        <div class="container h-100">
            <div class="d-flex h-100">
                <!-- Categoty Menu Button -->
                <div class="d-none d-xl-block all-category has-transition bg-black-10" id="category-menu-bar">
                    <div class="px-3 h-100"
                        style="padding-top: 12px;padding-bottom: 12px; width:270px; cursor: pointer;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="fw-700 fs-16 text-white mr-3">{{ translate('Categories') }}</span>
                                <a href="{{ route('categories.all') }}" class="text-reset">
                                    <span
                                        class="d-none d-lg-inline-block text-white hov-opacity-80">({{ translate('See All') }})</span>
                                </a>
                            </div>
                            <i class="las la-angle-down text-white has-transition" id="category-menu-bar-icon"
                                style="font-size: 1.2rem !important"></i>
                        </div>
                    </div>
                </div>
                <!-- Header Menus -->
                @php
                $nav_txt_color = ((get_setting('header_nav_menu_text') == 'light') || (get_setting('header_nav_menu_text') == null)) ? 'text-white' : 'text-dark';
                @endphp
                <div class="ml-xl-4 w-100 overflow-hidden">
                    <div class="d-flex align-items-center justify-content-center justify-content-xl-start h-100">
                        <ul class="list-inline mb-0 pl-0 hor-swipe c-scrollbar-light">
                            @if (get_setting('header_menu_labels') != null)
                            @foreach (json_decode(get_setting('header_menu_labels'), true) as $key => $value)
                            <li class="list-inline-item mr-0 animate-underline-white">
                                <a href="{{ json_decode(get_setting('header_menu_links'), true)[$key] }}"
                                    class="fs-13 px-3 py-3 d-inline-block fw-700 {{ $nav_txt_color }} header_menu_links hov-bg-black-10
                                            @if (url()->current() == json_decode(get_setting('header_menu_links'), true)[$key]) active @endif">
                                    {{ translate($value) }}
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- Cart -->
                {{-- <div class="d-xl-block align-self-stretch ml-5 mr-0 has-transition bg-black-10" data-hover="dropdown">
                    <div class="nav-cart-box dropdown h-100" id="cart_items" style="width: max-content;">
                        @include('frontend.'.get_setting('homepage_select').'.partials.cart')
                    </div>
                </div> --}}
                
            </div>
        </div>
        <!-- Categoty Menus -->
        <div class="hover-category-menu position-absolute w-100 top-100 left-0 right-0 z-3 d-none"
            id="click-category-menu">
            <div class="container">
                <div class="d-flex position-relative">
                    <div class="position-static">
                        @include('frontend.'.get_setting("homepage_select").'.partials.category_menu')
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> 

<!--- sub headers start --->
<div class="container">
    <div class="navbarList">
        <div class="navbar_list container_header_submenu ">
            <ul class="navbar_list_li header_submenu">
                  
            @if (count($featured_categories) > 0)
                @foreach ($featured_categories->take(15) as $key => $category)
                    @php
                        $category_name = $category->getTranslation('name');
                    @endphp
                    <li>
                        <a href="{{ route('products.category', $category->slug) }}" class="headerSubMenu">{{ $category_name }}</a>
                        @if(count($category->childrenCategories) > 0)
                        <div class="menuList header_submenu_list2">
                        <div class="row bgOdd"> 
                            @foreach($category->childrenCategories as $child_cat)
                            <div class="col-3 bg-even">
                                    <div class="submenu_">
                                        <b>{{ $child_cat->name ?? '' }}</b>
                                        @if(count($child_cat->categories) > 0)
                                        <ul class="mt-2">
                                            @foreach($child_cat->categories as $child_of_child_cat)
                                            <li><a href="#">{{ $child_of_child_cat->name ?? '' }}</a></li> 
                                            @endforeach 
                                        </ul>
                                        @endif
                                    </div>
                            </div> 
                            @endforeach      
                        </div>
                        </div> 
                        @endif
                    </li> 
                @endforeach

            @endif

            </ul>
        </div>
    </div>
</div>
<!--- sub headers end --->

<!-- Top Menu Sidebar -->
<div class="aiz-top-menu-sidebar collapse-sidebar-wrap sidebar-xl sidebar-left d-lg-none z-1035">
    <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle"
        data-target=".aiz-top-menu-sidebar" data-same=".hide-top-menu-bar"></div>
    <div class="collapse-sidebar c-scrollbar-light text-left">
        <button type="button" class="btn btn-sm p-4 hide-top-menu-bar" data-toggle="class-toggle"
            data-target=".aiz-top-menu-sidebar">
            <i class="las la-times la-2x text-primary"></i>
        </button>
        @auth
        <span class="d-flex align-items-center nav-user-info pl-4">
            <!-- Image -->
            <span class="size-40px rounded-circle overflow-hidden border border-transparent nav-user-img">
                @if ($user->avatar_original != null)
                <img src="{{ $user_avatar }}" class="img-fit h-100" alt="{{ translate('avatar') }}"
                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                @else
                <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="image" alt="{{ translate('avatar') }}"
                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                @endif
            </span>
            <!-- Name -->
            <h4 class="h5 fs-14 fw-700 text-dark ml-2 mb-0">{{ $user->name }}</h4>
        </span>
        @else
        <!--Login & Registration -->
        <span class="d-flex align-items-center nav-user-info pl-4">
            <!-- Image -->
            <span
                class="size-40px rounded-circle overflow-hidden border d-flex align-items-center justify-content-center nav-user-img">
                <svg xmlns="http://www.w3.org/2000/svg" width="19.902" height="20.012"
                    viewBox="0 0 19.902 20.012">
                    <path id="fe2df171891038b33e9624c27e96e367"
                        d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1.006,1.006,0,1,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1,10,10,0,0,0-6.25-8.19ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z"
                        transform="translate(-2.064 -1.995)" fill="#91919b" />
                </svg>
            </span>
            <a href="{{ route('user.login') }}"
                class="text-reset opacity-60 hov-opacity-100 hov-text-primary fs-12 d-inline-block border-right border-soft-light border-width-2 pr-2 ml-3">{{ translate('Login') }}</a>
            <a href="{{ route('user.registration') }}"
                class="text-reset opacity-60 hov-opacity-100 hov-text-primary fs-12 d-inline-block py-2 pl-2">{{ translate('Registration') }}</a>
        </span>
        @endauth
        <hr>
         <ul class="mb-0 pl-3 pb-3 h-100 ns-mob-pad">
          

           <div class="custom-tabs-container">
        <!-- Tabs -->
        <div class="custom-tabs">
            <div class="custom-tab active" data-tab="home_categ">
               Categories
            </div>
           
            <div class="custom-tab" data-tab="brand_categ">Brands</div>
        </div>

        <!-- Tab content -->
        <div id="home_categ" class="custom-tab-content active">
            <ul class="sidebar-menu">
                @foreach ($featured_categories as $key => $featured_categories)
                    <li class="has-submenu">
                        <a href="#" class="sidebar-link">  {{ $featured_categories->getTranslation('name') }} <span class="sb-menu-icon">+</span></a>
                        <ul class="sub-menu-ullist" id="submenu1">

                            @foreach ($featured_categories->childrenCategories as $key => $child_category)
                                <li><a href="{{ route('products.category', $child_category->slug) }}"> {{ $child_category->getTranslation('name') }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
               

              </ul>
        </div>





        <div id="brand_categ" class="custom-tab-content">
            <ul class="sidebar-menu">

                @foreach ($brands as $brand)
                <li class="has-submenu">
                  <a href="{{ route('products.brand', $brand->slug) }}" class="brand-sidebar-link">{{ $brand->getTranslation('name') }}</a>

                </li>
                @endforeach


              </ul>
        </div>
    </div>

        </ul>

        <br>
        <br>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div id="order-details-modal-body">

            </div>
        </div>
    </div>
</div>

@section('script')
<script type="text/javascript">
    function show_order_details(order_id) {
        $('#order-details-modal-body').html(null);

        if (!$('#modal-size').hasClass('modal-lg')) {
            $('#modal-size').addClass('modal-lg');
        }
        $.post('{{ route('orders.details') }}', {
                _token: AIZ.data.csrf,
                order_id: order_id
            },
            function(data) {
                $('#order-details-modal-body').html(data);
                $('#order_details').modal();
                $('.c-preloader').hide();
                AIZ.plugins.bootstrapSelect('refresh');
            });
    }
</script>
@endsection

<script>
// Show or hide the button based on scroll position
window.addEventListener("scroll", function() {
    var backToTopButton = document.getElementById("back-to-top");
    if (backToTopButton) {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            backToTopButton.style.display = "block";
        } else {
            backToTopButton.style.display = "none";
        }
    }
});

// Smooth scroll back to the top when the button is clicked
document.addEventListener("DOMContentLoaded", function() {
    var backToTopButton = document.getElementById("back-to-top");
    if (backToTopButton) {
        backToTopButton.addEventListener("click", function(e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
});
</script>


<!-- Back to Top Button -->
<a href="#" id="back-to-top" title="Back to Top">↑</a>

<div class="wabtn" id="wabutton">
  <style> [wa-tooltip] { position: relative; cursor: default;  &:hover { &::before { content: attr(wa-tooltip); font-size: 16px; text-align: center; position: absolute; display: block; right: null; left: calc(0% + 100px); min-width: 200px; max-width: 200px; bottom: calc(100% + 10px); transform: translate(-50%); animation: fade-in 500ms ease; background: #00E785; border-radius: 4px; padding: 10px; color: #ffffff; z-index: 1; } } }  @keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.1); } 100% { transform: scale(1); } }  [wa-tooltip] {  }  @keyframes fade-in { from { opacity: 0; } to { opacity: 1; } }</style>
  <a wa-tooltip="We are available! Click here to chat" target="_self" href="https://wa.me/917982742869?text=Hi!%20I'm%20interested%20in%20your%20services%20and%20would%20love%20to%20know%20more%20about%20it.%20Could%20you%20please%20send%20me%20more%20information?%20Thank%20you!" style=" cursor: pointer;height: 48px;width: auto;padding: 7px 7px 7px 7px;position: fixed !important;color: #fff;bottom: 72px;right: unset;display: flex;font-size: 18px;font-weight: 600;align-items: center;z-index: 999999999 !important;background-color: #00E785;box-shadow: 4px 5px 10px rgba(0, 0, 0, 0.4);border-radius: 100px;animation: pulse 2.5s ease infinite;left: 20px;"  aria-label="WhatsApp">
    <svg width="34" height="34" style="padding: 5px;" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1024_354)"><path d="M23.8759 4.06939C21.4959 1.68839 18.3316 0.253548 14.9723 0.0320463C11.613 -0.189455 8.28774 0.817483 5.61565 2.86535C2.94357 4.91323 1.10682 7.86244 0.447451 11.1638C-0.21192 14.4652 0.351026 17.8937 2.03146 20.8109L0.0625 28.0004L7.42006 26.0712C9.45505 27.1794 11.7353 27.7601 14.0524 27.7602H14.0583C16.8029 27.7599 19.4859 26.946 21.768 25.4212C24.0502 23.8965 25.829 21.7294 26.8798 19.1939C27.9305 16.6583 28.206 13.8682 27.6713 11.1761C27.1367 8.48406 25.8159 6.01095 23.8759 4.06939ZM14.0583 25.4169H14.0538C11.988 25.417 9.96008 24.8617 8.1825 23.8091L7.7611 23.5593L3.3945 24.704L4.56014 20.448L4.28546 20.0117C2.92594 17.8454 2.32491 15.2886 2.57684 12.7434C2.82877 10.1982 3.91938 7.80894 5.67722 5.95113C7.43506 4.09332 9.76045 2.87235 12.2878 2.48017C14.8152 2.08799 17.4013 2.54684 19.6395 3.78457C21.8776 5.02231 23.641 6.96875 24.6524 9.3179C25.6638 11.6671 25.8659 14.2857 25.2268 16.7622C24.5877 19.2387 23.1438 21.4326 21.122 22.999C19.1001 24.5655 16.6151 25.4156 14.0575 25.4157L14.0583 25.4169Z" fill="#E0E0E0"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M10.6291 7.98363C10.3723 7.41271 10.1019 7.40123 9.85771 7.39143C9.65779 7.38275 9.42903 7.38331 9.20083 7.38331C9.0271 7.3879 8.8562 7.42837 8.69887 7.5022C8.54154 7.57602 8.40119 7.68159 8.28663 7.81227C7.899 8.17929 7.59209 8.62305 7.38547 9.11526C7.17884 9.60747 7.07704 10.1373 7.08655 10.6711C7.08655 12.3578 8.31519 13.9877 8.48655 14.2164C8.65791 14.4452 10.8581 18.0169 14.3425 19.3908C17.2382 20.5327 17.8276 20.3056 18.4562 20.2485C19.0848 20.1913 20.4843 19.4194 20.7701 18.6189C21.056 17.8183 21.0557 17.1323 20.9701 16.989C20.8844 16.8456 20.6559 16.7605 20.3129 16.5889C19.9699 16.4172 18.2849 15.5879 17.9704 15.4736C17.656 15.3594 17.4275 15.3023 17.199 15.6455C16.9705 15.9888 16.3139 16.7602 16.1137 16.9895C15.9135 17.2189 15.7136 17.2471 15.3709 17.0758C14.3603 16.6729 13.4275 16.0972 12.6143 15.3745C11.8648 14.6818 11.2221 13.8819 10.7072 13.0007C10.5073 12.6579 10.6857 12.472 10.8579 12.3007C11.0119 12.1472 11.2006 11.9005 11.3722 11.7003C11.5129 11.5271 11.6282 11.3346 11.7147 11.1289C11.7603 11.0343 11.7817 10.9299 11.7768 10.825C11.7719 10.7201 11.7409 10.6182 11.6867 10.5283C11.6001 10.3566 10.9337 8.66151 10.6291 7.98363Z" fill="white"></path><path d="M23.7628 4.02445C21.4107 1.66917 18.2825 0.249336 14.9611 0.0294866C11.6397 -0.190363 8.35161 0.804769 5.70953 2.82947C3.06745 4.85417 1.25154 7.77034 0.600156 11.0346C-0.051233 14.299 0.506321 17.6888 2.16894 20.5724L0.222656 27.6808L7.49566 25.7737C9.50727 26.8692 11.7613 27.4432 14.0519 27.4434H14.0577C16.7711 27.4436 19.4235 26.6392 21.6798 25.1321C23.936 23.6249 25.6947 21.4825 26.7335 18.9759C27.7722 16.4693 28.0444 13.711 27.5157 11.0497C26.9869 8.38835 25.6809 5.94358 23.7628 4.02445ZM14.0577 25.1269H14.0547C12.0125 25.1271 10.0078 24.5782 8.25054 23.5377L7.8339 23.2907L3.51686 24.4222L4.66906 20.2143L4.39774 19.7831C3.05387 17.6415 2.4598 15.1141 2.70892 12.598C2.95804 10.082 4.03622 7.72013 5.77398 5.88366C7.51173 4.04719 9.81051 2.84028 12.3089 2.45266C14.8074 2.06505 17.3638 2.5187 19.5763 3.74232C21.7888 4.96593 23.5319 6.89011 24.5317 9.21238C25.5314 11.5346 25.7311 14.1233 25.0993 16.5714C24.4675 19.0195 23.0401 21.1883 21.0414 22.7367C19.0427 24.2851 16.5861 25.1254 14.0577 25.1255V25.1269Z" fill="white"></path></g><defs><clipPath id="clip0_1024_354"><rect width="27.8748" height="28" fill="white" transform="translate(0.0625)"></rect></clipPath></defs></svg>
    <span class="button-text"></span>
  </a>
</div>


     <script>
        document.addEventListener('DOMContentLoaded', function() {
    var tabs = document.querySelectorAll('.custom-tab');
    var contents = document.querySelectorAll('.custom-tab-content');

    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            var tabId = tab.getAttribute('data-tab');

            // Hide all tab contents
            contents.forEach(function(content) {
                content.classList.remove('active');
            });

            // Remove active class from all tabs
            tabs.forEach(function(t) {
                t.classList.remove('active');
            });

            // Show the selected tab content and add active class to the selected tab
            document.getElementById(tabId).classList.add('active');
            tab.classList.add('active');
        });
    });
});
    </script>
       <script>
        document.addEventListener('DOMContentLoaded', function() {
      // Function to toggle submenu visibility and highlight the active menu
      function toggleSubmenu(event) {
        event.preventDefault();
        const link = event.currentTarget;
        const submenu = link.nextElementSibling;
        const icon = link.querySelector('.sb-menu-icon');

        // Remove active class from all sidebar links
        document.querySelectorAll('.sidebar-link').forEach(function(item) {
          item.classList.remove('active');
        });

        // Close all other open submenus and change icons to plus
        document.querySelectorAll('.sub-menu-ullist').forEach(function(item) {
          if (item !== submenu) {
            item.classList.remove('show');
            item.previousElementSibling.querySelector('.sb-menu-icon').textContent = '+';
          }
        });

        // Toggle the clicked submenu with transition and update icon
        if (submenu.classList.contains('show')) {
          submenu.classList.remove('show');
          icon.textContent = '+'; // Change icon back to plus when closed
        } else {
          submenu.classList.add('show');
          icon.textContent = '-'; // Change icon to minus when open

        }

        // Set the clicked link as active
        link.classList.toggle('active');
        // icon.classList.toggle('active-sideicon');
      }

      // Add click event listeners to sidebar links
      document.querySelectorAll('.sidebar-link').forEach(function(link) {
        link.addEventListener('click', toggleSubmenu);
      });

      // Close the dropdown if clicked outside
      document.addEventListener('click', function(event) {
        if (!event.target.closest('.sidebar-link, .sub-menu-ullist')) {
          document.querySelectorAll('.sub-menu-ullist').forEach(function(submenu) {
            submenu.classList.remove('show');
          });
          document.querySelectorAll('.sb-menu-icon').forEach(function(icon) {
            icon.textContent = '+';
          });
          // Remove active class from all sidebar links
          document.querySelectorAll('.sidebar-link').forEach(function(link) {
            link.classList.remove('active');
          });
        }
      });
    });
</script> 


<script>
        const tabs = document.querySelectorAll(".tab");
        const contents = document.querySelectorAll(".tab-content");

        tabs.forEach(tab => {
            tab.addEventListener("mouseenter", () => {
                tabs.forEach(t => t.classList.remove("active"));
                contents.forEach(c => c.classList.remove("active"));

                tab.classList.add("active");
                document.getElementById(tab.dataset.tab).classList.add("active");
            });
        });
    </script>
 

@section('script')
@endsection
