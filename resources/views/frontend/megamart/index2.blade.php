@extends('frontend.layouts.app')

@section('content')

<style>
    #section_featured .slick-slider .slick-list {
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

    @media (max-width: 575px) {
        #section_featured .slick-slider .slick-list .slick-slide {
            margin-bottom: -4px;
        }
    }

    .list-group-item {
        /* width: 246px!important; */
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

    .benefitsRow img {
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

    .proCate {
        position: absolute;
        left: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
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
        height: 440px;
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

    .hmbg {
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
<style>
    .videoBox {
        width: 100%;
        height: 100%;
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

    .hmbg {
        background: #f6761e;
        width: 35px;
        height: 35px;
    }

    /* TESTIMONIAL SECTION END */
</style>
<!-- by ritik -->
<style>
    /*your custom css goes here*/

    .city_card {
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        width: 97%;
        min-height: 338px;
        margin: 0rem 0.5rem 2rem 0.5rem;
    }

    .Product_card {
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border-radius: 1rem;
        padding: 0;
        width: 260px !important;
        min-height: 360px;
        margin: 0rem 0.5rem 1.6rem 0.5rem;
        padding: 0 !important;
        overflow: hidden;
    }

    .product_contianer {
        padding: 0 !important;
    }

    .product_card_contianer .slick-arrow {
        position: absolute;
        top: 50%;
        z-index: 2;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: #ef7528 !important;
        border-radius: 50em;
        border: 0;
        box-shadow: 0 0 1px 1px rgba(20, 23, 28, 0.1),
            0 3px 1px 0 rgba(20, 23, 28, 0.1);
        font-size: 15px;
        line-height: 40px;
        padding: 0;
        text-align: center;
        color: #fff;
    }

    .product_card_contianer .carousel-box .aiz-card-box {
        overflow: hidden;
        margin-top: 0px;
        margin-bottom: 0px;
    }

    .g-3 {
        gap: 30px;
        align-items: center;
        justify-content: space-between;
    }


    .product_card_contianer .aiz-carousel.arrow-x-0.arrow-inactive-none.slick-initialized.slick-slider {
        height: 100%;
    }

    .home-category-banner::after {
        content: 'View All';
        border-radius: 24px;
        background: rgb(2 0 0 / 80%);
        z-index: 2;
        top: unset;
        bottom: 0;
        left: 50%;
        width: 100px;
        height: 36px;
        transform: translate(-50%, -50%);
        font-size: 14px;
        font-weight: 500;
        color: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* product card */


    .product-card {
        background-color: #fff;
        width: 100%;
        text-align: center;
        position: relative;
        padding: 1rem 0.5rem 1rem 0.5rem;
    }

    .product-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .product-rating {
        font-size: 14px;
        color: #666;
        margin-bottom: 8px;
    }

    .rating-star {
        color: orange;
        margin-right: 4px;
        font-size: 1rem;
    }

    .product-category {
        margin-left: 4px;
    }

    .product-availability {
        font-size: 12px;
        color: #999;
        margin-bottom: 16px;
    }

    .product-price {
        margin-bottom: 16px;
    }


    .original-price {
        font-size: 14px;
        color: #999;
        text-align: center;
    }

    .discounted-price {
        font-size: 15px;
        margin-left: 0.3rem;
        font-weight: 600;
    }

    .add-to-cart {
        background-color: #e86c00;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 0.85rem;
        font-weight: 600;
        text-align: center;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease;
        border-radius: 50px;
        padding: 0.3rem 1.5rem 0.3rem 1.5rem;
    }

    .add-to-cart:hover {
        background-color: #d65b00;
    }

    .add-to-cart .cart-icon {
        margin-left: 8px;
        /* font-size: 20px; */
    }

    .wishlist-icon {
        background-color: transparent;
        border: 2px solid #e86c00;
        color: #e86c00;
        cursor: pointer;
        transition: color 0.3s ease;
        border-radius: 50%;
        height: 30px;
        width: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .wishlist-icon:hover {
        color: #d65b00;
    }

    .btn_wish {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    /* for top city carousel */

    .cities .aiz-carousel .carousel-link {
        display: inline-block;
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        color: #666;
        text-decoration: none;
        transition: color 0.3s ease;
        display: flex;
        justify-content: center;
    }

    .aiz-carousel .carousel-link.active {
        color: #FF6600;
        /* Orange color */
        font-weight: bold;
        position: relative;
    }

    .aiz-carousel .carousel-link.active::after {
        content: "";
        display: block;
        width: 100%;
        height: 2px;
        background-color: #FF6600;
        /* Orange underline */
        position: absolute;
        bottom: -5px;
        left: 0;
    }

    .cities .aiz-carousel .slick-prev {
        left: -20px;
        z-index: 2;
    }

    .cities .aiz-carousel .slick-next {
        right: -15px;
        z-index: 2;
    }

    .cities .aiz-carousel .slick-arrow {
        position: absolute;
        top: 50%;
        z-index: 2;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        width: 25px;
        height: 25px;
        background: #ef7528;
        border-radius: 50em;
        font-size: 14px;
        line-height: 26px;
        padding: 0;
        text-align: center;
        color: #fff;
    }

    .top_heading {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 20px;
    }

    .top_heading span:last-child {
        background: #ef7528;
        width: 100px;
        display: block;
        height: 2px;
    }

    .seller_name {
        font-size: 1.1rem;
        font-weight: 700;
        margin: 2rem 0 1rem 0;
    }

    .rating {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        /* gap: 5px; */
    }

    .rating_star i {
        color: #ef7528;
    }

    .seller_cards {
        border: 1px solid #ef7528;
        padding: 2rem 1rem;
        margin: 2rem 1rem;
        border-radius: 20px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;

    }

    .btn-visit {
        position: relative;
        display: flex;
        cursor: pointer;
        outline: none;
        border: 0;
        vertical-align: middle;
        text-decoration: none;
        background: #ef7528;
        padding: 0;
        font-size: inherit;
        font-family: inherit;
        margin: auto;
    }

    .btn-visit .button-textt {
        transition: all 0.5s cubic-bezier(0.65, 0, .076, 1);
        padding: 0.65rem 0;
        margin: 0 0 0 1.85rem;
        color: #fff;
        font-weight: 700;
        line-height: 1.6;
        text-align: center;
        text-transform: uppercase;
        /* border-radius: 43px; */
    }

    .btn-visit .button-textt {
        transition: all 0.5s cubic-bezier(0.65, 0, .076, 1);
        padding: 0.65rem 0;
        margin: 0 0 0 1.85rem;
        color: #fff;
        font-weight: 700;
        line-height: 1.6;
        text-align: center;
        text-transform: uppercase;
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: auto;
    }

    .top_seller_list .aiz-carousel .slick-arrow {
        position: absolute;
        top: unset;
        bottom: -50px;
        color: #fff;
        z-index: 2;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: #ef7528;
        border-radius: 50em;
        border: 0;
        box-shadow: 0 0 1px 1px rgba(20, 23, 28, 0.1),
            0 3px 1px 0 rgba(20, 23, 28, 0.1);
        font-size: 15px;
        line-height: 40px;
        padding: 0;
        text-align: center;
    }

    .top_seller_list .aiz-carousel.arrow-x-0 .slick-prev {
        left: 46% !important;
        transform: translate(-50%, -40%);
    }

    .top_seller_list .aiz-carousel.arrow-x-0 .slick-next {
        right: 46% !important;
        transform: translate(-50%, -40%);
    }

    .top_seller_list .aiz-carousel .slick-arrow {
        position: absolute;
        top: unset;
        bottom: -50px;
        z-index: 2;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: #ef7528;
        border-radius: 50em;
        border: 1px solid #ef7528;
        font-size: 15px;
        line-height: 40px;
        padding: 0;
        text-align: center;
        color: #fff;
    }


    .winPro {
        background-image: url(public/assets/img/winbg.png);
    }

    .shead {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
    }

    .shead span:last-child {
        background: #ef7528;
        width: 100px;
        display: block;
        height: 2px;
    }

    /* winning section */

    .winnig_card {
        width: 92%;
        height: 180px;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        margin: 0rem 1rem;
    }



    .winnig_tag {
        width: 100%;
        position: absolute;
        bottom: 0;
        text-align: right;
    }

    .xyz_img {
        width: 100%;
        height: 100%;
    }

    .home-category-name {
        border-radius: 20px;
        margin-right: 1rem;
        background: #ef7528;
        padding: 0.5rem 0.5rem;
    }

    .winnig_container_card .aiz-carousel .slick-prev {
        left: -43px;
    }

    .winnig_container_card .aiz-carousel .slick-next {
        right: -53px;
    }

    .winnig_container_card .aiz-carousel .slick-arrow {
        position: absolute;
        top: 50%;
        z-index: 2;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        width: 25px;
        height: 25px;
        background: #ef7528;
        border-radius: 50em;
        font-size: 12px;
        line-height: 27px;
        padding: 0;
        text-align: center;
        color: #fff;
    }


    /* winning kart */

    .winnigKart_box {
        display: flex;
        align-items: center;
        justify-content: space-around;
        width: 100%;
        padding: 1rem 0.5rem;
        border-radius: 0.8rem;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    .winnigKart_box img {
        width: 60px;
        height: 60px;
    }


    .winnig_kart_Con .listgtitle {
        font-size: 26px;
        font-family: "Inter", sans-serif;
        font-weight: 600;
        color: #000;
        text-align: left;
    text-transform: uppercase;
    }

    .winnig_kart_Con .listgsubtitle {
        font-size: 16px;
        color: #fc6000;
        font-weight: 400;
    }

    .section-header h1 {
        position: relative;
        font-size: 2rem;
        color: #fff;
        font-family: "Montserrat", sans-serif;
        letter-spacing: 1px;
    }

    .testimonials-section {
        width: 100%;
        padding: 10px 0% 2.5rem 0%;
        background: #ea7427;
        margin: 50px 0;
        /* padding: 2rem 0rem; */
    }

    .testimonial-card .test-card-body {
        background-color: #fff;
        padding: 22px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border-radius: 10px;
        margin: 1rem auto;
        max-width: 350px;
    }

    .test-card-body .quote i {
        font-size: 1rem;
        color: #ea7427;
        margin-right: 20px;
        margin-top: 1rem;
    }

    .test-card-body .ratings {
        margin-top: 10px;
    }

    .test-card-body .ratings i {
        font-size: 1rem;
        color: #fc6000;
        cursor: pointer;
        margin: 0rem .1rem;
    }


    .testimonials-section .aiz-carousel .slick-dots .slick-active button {
        background: #ffffff;
    }

    .testimonials-section .aiz-carousel .slick-dots button {
        height: 11px;
        width: 11px;
        padding: 0px;
        color: transparent;
        border: 0;
        background: #ffffff7a;
        border-radius: 50%;
        margin: 0 3px;
    }




    /* shop by concern */

    .shopbyconcern {
        margin: 4rem 0;
    }

    .top_heading {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 20px;
        font-size: 1.8rem;
    }

    .martext {
        font-size: 13px;
        font-weight: 300;
        margin: 0 0 0 20dvw;
    }

    /* new winning kart */

    .newKart {
        text-align: center;
        align-items: center;
        justify-content: center;
        display: flex;
        margin: 2rem 0;
    }

    .win_kart_txt {
        font-size: 1.6rem;
        font-weight: 700;
    }

    .newKart h3 {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .newKart h3 span:first-child {
        width: 130px;
        display: block;
        height: 4px;
        background: #ef7528;
    }

    .newKart h3 span:last-child {
        width: 130px;
        display: block;
        height: 4px;
        background: #ef7528;
    }

    #section_newest h3 span {
        position: relative;
    }

    .newWinningKart .aiz-carousel .slick-next {
        right: -29px;
    }

    .newWinningKart .aiz-carousel .slick-arrow {
        position: absolute;
        top: 50%;
        z-index: 2;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        width: 25px;
        height: 25px;
        background: #ef7528;
        border-radius: 50em;
        border: 0;
        box-shadow: 0 0 1px 1px rgba(20, 23, 28, 0.1),
            0 3px 1px 0 rgba(20, 23, 28, 0.1);
        font-size: 12px;
        line-height: 28px;
        padding: 0;
        text-align: center;
        color: #ffffff;
    }

    .city-content {
        display: flex;
    }

    .shoBy span {
        position: absolute;
        bottom: 10px;
        left: 15px;
        background: #000000a3;
        color: #fff;
        padding: 0.3rem 0.5rem;
        border-radius: 20px;
        border: 1px solid #000;
    }

    .img_col1,
    .img_co21,
    .img_col3,
    .img_col4,
    .img_col5,
    .img_col6 {
        width: max-content !important;
    }

    .shoBy {
        position: relative;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .product_image {
        max-height: 200px !important;
        object-fit: contain !important;
    }

    #section_newest h3 span {
        font-size: 1.5rem;
    }

    #section_newest h3 span::before {
        content: '';
        position: absolute;
        background: #ef7528;
        width: 82px;
        display: block;
        height: 2px;
        top: 50%;
        right: -93px;
    }

    .top_heading {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 20px;
        font-weight: 600;
        font-size: 1.6rem;
    }

    .shead {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        font-size: 1.6rem !important;
    }

    @media screen and (max-width: 768px) {
        .city-content {
            display: flex;
            /* flex-direction: column; */
        }

        .Product_card {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 1rem;
            padding: 0;
            min-width: 240px !important;
            min-height: 300px;
            margin: 0rem 0.5rem 1.6rem 0.5rem;
            padding: 0 !important;
            overflow: hidden;
        }

        .product-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .product-availability {
            font-size: 12px;
            color: #999;
            margin-bottom: 8px;
        }

        .add-to-cart {
            background-color: #e86c00;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 500;
            text-align: center;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
            border-radius: 50px;
            padding: 0.3rem .7rem 0.3rem 0.7rem;
        }

        .wishlist-icon {
            background-color: transparent;
            border: 2px solid #e86c00;
            color: #e86c00;
            cursor: pointer;
            transition: color 0.3s ease;
            border-radius: 50%;
            height: 25px;
            width: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .city_card {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            width: 100%;
            min-height: 313px;
            margin: 0rem 0.5rem 2rem 0.5rem;
        }

        .top_heading {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 20px;
            font-size: 1.5rem;
        }

        .testimonial-card .test-card-body {
            background-color: #fff;
            padding: 22px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border-radius: 10px;
            margin: 1rem 0rem;
            width: 270px;
            margin-left: auto;
        }

        .testimonial-card {
            width: max-content !important;
        }

        .top_seller_list .aiz-carousel.arrow-x-0 .slick-next {
            right: 40% !important;
            transform: translate(-50%, -40%);
        }

        .img1 {
            width: 150px;
        }

        .img2 {
            width: 150px;
        }

        .img3 {
            width: 311px;
        }



        .img4 {
            width: 167px;
        }

        .top_seller_list h3 span {
            font-size: 1.5rem;
        }

        #section_newest h3 span::before {
            content: '';
            position: absolute;
            background: #ef7528;
            width: 82px;
            display: block;
            height: 2px;
            top: 50%;
            right: -93px;
        }
    }


    @media screen and (max-width: 600px) {
        .city-content {
            display: flex;
            flex-direction: column;
        }

        .cities .aiz-carousel .carousel-link {
            display: inline-block;
            padding: 0.5rem 0.5rem;
            font-size: 0.9rem;
            color: #666;
            text-decoration: none;
            transition: color 0.3s ease;
            display: flex;
            justify-content: center;
            min-width: 75%;
        }

        .cities .aiz-carousel .carousel-link .carousel-item {
            display: flex !important;
            align-items: center;
            width: 100px !important;
            justify-content: center;
        }

        .Product_card {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 1rem;
            padding: 0;
            width: 210px !important;
            min-height: 300px;
            margin: 0rem auto 1.6rem auto;
            padding: 0 !important;
            overflow: hidden;
            display: flex !important;
        }

        .newKart h3 {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .newKart h3 span:first-child {
            width: 100px;
            display: block;
            height: 4px;
            background: #ef7528;
        }

        .newKart h3 span:last-child {
            width: 100px;
            display: block;
            height: 4px;
            background: #ef7528;
        }

        .win_kart_txt {
            font-size: 1rem;
            font-weight: 700;
        }

        .newWinningKart .aiz-carousel .slick-next {
            right: 10px;
        }

        .top_heading {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 20px;
            font-size: 1rem;
        }

        .shead {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            font-size: 1rem !important;
        }

        .top_heading span:last-child {
            background: #ef7528;
            width: 82px;
            display: block;
            height: 2px;
        }

        .top_seller_list h3 span {
            font-size: 1rem;
        }

        .to_h_mob {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
            font-size: 1rem;
        }

        .top_seller_list .aiz-carousel.arrow-x-0 .slick-prev {
            left: 40% !important;
            transform: translate(-50%, -44%);
        }

        .top_seller_list .aiz-carousel.arrow-x-0 .slick-next {
            right: 29% !important;
            transform: translate(-50%, -44%);
        }

        .winnig_container_card .aiz-carousel .slick-prev {
            left: -18px;
        }

        .winnig_container_card .aiz-carousel .slick-prev {
            left: -18px;
        }


        .fa-shopping-cart {
            color: #919199
        }


        .aiz-carousel .slick-arrow {
            position: absolute;
            top: 50%;
            z-index: 2;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background: #fff;
            border-radius: 50em;
            border: 0;
            box-shadow: 0 0 1px 1px rgba(20, 23, 28, 0.1),
                0 3px 1px 0 rgba(20, 23, 28, 0.1);
            font-size: 18px;
            line-height: 25px;
            padding: 0;
            text-align: center;
        }

        .policy-file h4 {
            font-size: 0.75rem !important;
        }

        .policy-file img {
            width: 30px;
        }

        .city_card {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            width: 75%;
            min-height: 320px;
            margin: 0rem 0.5rem 2rem 0.5rem;
        }

        .Product_card {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 1rem;
            padding: 0;
            min-width: 251px;
            max-width: 280px !important;
            min-height: 300px;
            margin: 0rem auto 1.6rem auto;
            padding: 0 !important;
            overflow: hidden;
            display: flex !important;
        }

        .carousel-box .aiz-card-box {
            overflow: hidden;
            margin-top: 0px;
            margin-bottom: 2px;
            width: 100%;
        }

        .proVideoSec iframe {
            width: 80%;
            display: flex;
            margin: auto;
            text-align: center;
        }

        .proVideoSec p {
            text-align: center;
            margin-top: 0.3rem;
        }

        .winnig_container_card .aiz-carousel .slick-next {
            right: -23px;
        }

        .testimonial-card {
            width: 100% !important;
            display: flex !important;
            align-items: center;
            justify-content: center;
            margin: auto;
        }

        .testimonial-card .test-card-body {
            background-color: #fff;
            padding: 22px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border-radius: 10px;
            margin: 1rem auto;
            width: 290px;
            /* margin-left: auto; */
        }

        .section-header h1 {
            position: relative;
            font-size: 1.5rem;
            color: #fff;
            font-family: "Montserrat", sans-serif;
            letter-spacing: 1px;
        }

        .img3 {
            width: 308px;
        }

        .img5 {
            width: 150px;
        }

        .img4 {
            width: 150px;
        }

        .img6 {
            width: 150px;
        }

        .shoBy span {
            position: absolute;
            bottom: 10px;
            left: 8px;
            background: #000000a3;
            color: #fff;
            padding: 0.3rem 0.5rem;
            border-radius: 15px;
            border: 1px solid #000;
            font-size: 12px;
        }

        .aiz-carousel .slick-arrow {
            position: absolute;
            top: 50%;
            z-index: 2;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            width: 25px;
            height: 25px;
            background: #ef7528;
            border-radius: 50em;
            border: 0;
            box-shadow: 0 0 1px 1px rgba(20, 23, 28, 0.1),
                0 3px 1px 0 rgba(20, 23, 28, 0.1);
            font-size: 14px;
            line-height: 17px;
            padding: 0;
            text-align: center;
            color: #fff;
        }

        .floating-buttons-section-control {
            display: block;
            background: #ef7528;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
        }

        .cities .aiz-carousel .slick-prev {
            left: -10px;
            z-index: 2;
        }

        #section_newest h3 span {
            font-size: 1rem;
            position: relative;
        }


        #section_newest h3 span::before {
            content: '';
            position: absolute;
            background: #ef7528;
            width: 82px;
            display: block;
            height: 2px;
            top: 50%;
            right: -93px;
        }

        #section_newest a:nth-child() {
            font-size: 1.5rem;
        }

        .top_seller_list h3 span {
            font-size: 1.5rem;
        }
    }
</style>

<!-- Top Categories -->
@if (count($featured_categories) > 0)
<section class="pt-2" style="border-top: 0.5px solid lightgrey; border-bottom: .5px solid lightgrey;">
    <div class="container">
        <!-- Categories -->
        <div class="bg-white px-sm-3">
            <div class="aiz-carousel sm-gutters-17" data-items="8" data-xxl-items="8" data-xl-items="8"
                data-lg-items="6" data-md-items="5" data-sm-items="3" data-xs-items="3" data-arrows="true"
                data-dots="false" data-autoplay="false" data-infinite="true" data-center="false">
                @foreach (get_level_zero_categories()->take(12) as $key => $category)
                @php
                $category_name = $category->getTranslation('name');
                @endphp
                <div class="carousel-box px-md-4 px-2 d-flex flex-column align-items-center">
                    <div class="size-45px overflow-hidden hov-scale-img">
                        <a class="d-block" href="{{ route('products.category', $category->slug) }}">
                            <img src="{{ isset($category->catIcon->file_name) ? my_asset($category->catIcon->file_name) : static_asset('assets/img/placeholder.jpg') }}"
                                class="lazyload img-fit h-100 mx-auto has-transition"
                                alt="{{ $category->getTranslation('name') }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';" style="width: 40px;border-radius: 55px;">
                        </a>
                    </div>
                    <div class="text-center h-35px text-truncate-2" style="margin-top: 0px;">
                        <a class="fs-13 fw-500 text-center text-reset hov-text-primary dropdown-toggle"
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

@php $lang = get_system_language()->code; @endphp

<!-- Featured Categories -->
@if (count($featured_categories) > 0)
<section style="background-color: #f2feff !important;">
    <div class="container">
        <!-- Categories -->
        <div class="px-sm-3">
            <div class="aiz-carousel sm-gutters-17" data-items="8" data-xxl-items="8" data-xl-items="8"
                data-lg-items="6" data-md-items="5" data-sm-items="3" data-xs-items="3" data-arrows="true"
                data-dots="false" data-autoplay="false" data-infinite="true" data-center="false">
                @foreach ($featured_categories as $key => $category)
                @php
                $category_name = $category->getTranslation('name');
                @endphp
                <div class="carousel-box px-md-4 px-2 d-flex flex-column align-items-center">
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

<section class="bg-light mt-auto" style="background-color:#1e1e1e08!important;">
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
                    <img src="{{ asset('public/assets/img/earn.svg') }}" width="39" alt="" title="" class="img-small d-inline">
                    <h4 class="d-inline text-dark fs-14 fw-700 ml-3 mt-2">{{ translate('Made In India') }}</h4>
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
        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col-12">
                    <div class="col-lg-4 col-md-6 mx-auto my-md-4 my-3 cities">
                        <!-- Title -->
                        <div class="aiz-carousel" data-items="5"
                            data-xxl-items="4" data-xl-items="4" data-lg-items="3" data-md-items="3" data-sm-items="3"
                            data-xs-items="3" data-arrows='true' data-infinite='false'>
                            <div class="carousel-item active">
                                <a href="#" class="carousel-link city-btn  active" data-city="delhi">Delhi</a>
                            </div>
                            <div class="carousel-item">
                                <a href="#" class="carousel-link city-btn" data-city="mumbai">Mumbai</a>
                            </div>
                            <div class="carousel-item">
                                <a href="#" class="carousel-link city-btn" data-city="bangalore">Bangalore</a>
                            </div>
                            <div class="carousel-item">
                                <a href="#" class="carousel-link city-btn" data-city="chennai">Chennai</a>
                            </div>
                            <div class="carousel-item">
                                <a href="#" class="carousel-link city-btn" data-city="pune">Pune</a>
                            </div>
                            <div class="carousel-item">
                                <a href="#" class="carousel-link city-btn" data-city="pune">Pune</a>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- container of cites -->
                <div class="city_container col-md-12">
                    <div class="city-content active" id="delhi">
                        <!-- city card -->
                        <div class="col-lg-3 col-md-4 d-flex justify-content-center p-0">
                            <!-- Home category banner & name -->
                            <div class="city_card">
                                <div class="w-100 h-100"> <!---w-sm-260px h-260px mx-auto-->
                                    <a href="/" class="d-block h-100 w-100 w-xl-auto hov-scale-img overflow-hidden home-category-banner">
                                        <span class="position-absolute h-100 w-100 overflow-hidden">
                                            <img src="https://img.freepik.com/premium-photo/photo-india-gate-new-delhi-india_583952-56792.jpg?w=1060"
                                                alt="Women clothings"
                                                class="img-fit h-100 has-transition"
                                                onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--  carousel -->
                        <div class="col-lg-9 col-md-8 product_card_contianer">
                            <div class="w-100 h-100 overflow-hidden ">
                                <div class="aiz-carousel arrow-x-0 arrow-inactive-none" data-items="3.5"
                                    data-xxl-items="3" data-xl-items="2.5" data-lg-items="2" data-md-items="2" data-sm-items="1"
                                    data-xs-items="1" data-arrows='true' data-infinite='false'>
                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="/" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="/" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="/" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="city-content" id="mumbai" style="display:none;">
                        <!-- city card -->
                        <div class="col-md-3 d-flex justify-content-center">
                            <!-- Home category banner & name -->
                            <div class="city_card">
                                <div class="w-100 h-100"> <!---w-sm-260px h-260px mx-auto-->
                                    <a href="https://localhost/aecom/category/women-clothings" class="d-block h-100 w-100 w-xl-auto hov-scale-img overflow-hidden home-category-banner">
                                        <span class="position-absolute h-100 w-100 overflow-hidden">
                                            <img src="https://img.freepik.com/free-photo/prasat-pha-nom-wan-ancient-stone-thailand_554837-307.jpg?t=st=1723487398~exp=1723490998~hmac=7f3da3ba5671925d69e38f8bd1156c4205014839a8778442ba54925685349fb4"
                                                alt="Women clothings"
                                                class="img-fit h-100 has-transition"
                                                onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--  carousel -->
                        <div class="col-md-9 product_card_contianer">
                            <div class="w-100 h-100 overflow-hidden ">
                                <div class="aiz-carousel arrow-x-0 arrow-inactive-none" data-items="3.5"
                                    data-xxl-items="3" data-xl-items="2.5" data-lg-items="2" data-md-items="2" data-sm-items="1"
                                    data-xs-items="1" data-arrows='true' data-infinite='false'>
                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="city-content" id="bangalore" style="display:none;">
                        <!-- city card -->
                        <div class="col-md-3 d-flex justify-content-center">
                            <!-- Home category banner & name -->
                            <div class="city_card">
                                <div class="w-100 h-100"> <!---w-sm-260px h-260px mx-auto-->
                                    <a href="https://localhost/aecom/category/women-clothings" class="d-block h-100 w-100 w-xl-auto hov-scale-img overflow-hidden home-category-banner">
                                        <span class="position-absolute h-100 w-100 overflow-hidden">
                                            <img src="https://img.freepik.com/free-photo/city-mumbai-with-text_23-2150907706.jpg?t=st=1723487303~exp=1723490903~hmac=bb7a8f0b4171cc289d4f4e2efc95f9a381b2f7adac4b9e31bd13aba3f1ef605f"
                                                alt="Women clothings"
                                                class="img-fit h-100 has-transition"
                                                onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--  carousel -->
                        <div class="col-md-9 product_card_contianer">
                            <div class="w-100 h-100 overflow-hidden ">
                                <div class="aiz-carousel arrow-x-0 arrow-inactive-none" data-items="3.5"
                                    data-xxl-items="3" data-xl-items="2.5" data-lg-items="2" data-md-items="2" data-sm-items="1"
                                    data-xs-items="1" data-arrows='true' data-infinite='false'>
                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="city-content" id="chennai" style="display:none;">
                        <!-- city card -->
                        <div class="col-md-3 d-flex justify-content-center">
                            <!-- Home category banner & name -->
                            <div class="city_card">
                                <div class="w-100 h-100"> <!---w-sm-260px h-260px mx-auto-->
                                    <a href="https://localhost/aecom/category/women-clothings" class="d-block h-100 w-100 w-xl-auto hov-scale-img overflow-hidden home-category-banner">
                                        <span class="position-absolute h-100 w-100 overflow-hidden">
                                            <img src="https://img.freepik.com/free-photo/vivid-colors-navratri-celebration-festival_23-2151262795.jpg?t=st=1723487454~exp=1723491054~hmac=315c6ab5688b308b845e0c5a791e3553683ce46675ef62bd16cbfdf6a881725a"
                                                alt="Women clothings"
                                                class="img-fit h-100 has-transition"
                                                onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--  carousel -->
                        <div class="col-md-9 product_card_contianer">
                            <div class="w-100 h-100 overflow-hidden ">
                                <div class="aiz-carousel arrow-x-0 arrow-inactive-none" data-items="3.5"
                                    data-xxl-items="3" data-xl-items="2.5" data-lg-items="2" data-md-items="2" data-sm-items="1"
                                    data-xs-items="1" data-arrows='true' data-infinite='false'>
                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="city-content" id="pune" style="display:none;">
                        <!-- city card -->
                        <div class="col-md-3 d-flex justify-content-center">
                            <!-- Home category banner & name -->
                            <div class="city_card">
                                <div class="w-100 h-100"> <!---w-sm-260px h-260px mx-auto-->
                                    <a href="https://localhost/aecom/category/women-clothings" class="d-block h-100 w-100 w-xl-auto hov-scale-img overflow-hidden home-category-banner">
                                        <span class="position-absolute h-100 w-100 overflow-hidden">
                                            <img src="https://img.freepik.com/free-photo/colourful-mexican-house_23-2151769247.jpg?t=st=1723487511~exp=1723491111~hmac=b9dbd404301925b44a229d92c0b79cee2cbbbdbfe588ca76ced95536dd5cf84a"
                                                alt="Women clothings"
                                                class="img-fit h-100  has-transition"
                                                onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--  carousel -->
                        <div class="col-md-9 product_card_contianer">
                            <div class="w-100 h-100 overflow-hidden ">
                                <div class="aiz-carousel arrow-x-0 arrow-inactive-none" data-items="3.5"
                                    data-xxl-items="3" data-xl-items="2.5" data-lg-items="2" data-md-items="2" data-sm-items="2"
                                    data-xs-items="1" data-arrows='true' data-infinite='false'>
                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <button class="wishlist-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                        <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                    </svg>
                                                                </button>
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                    <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                </svg>
                                                            </button>
                                                            <button class="wishlist-icon">
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="carousel-box px-3 position-relative has-transition Product_card">
                                        <div class="aiz-card-box h-auto bg-white hov-scale-img">
                                            <div class="position-relative h-140px h-md-170px img-fit overflow-hidden">
                                                <!-- Image -->
                                                <a href="https://localhost/aecom/product/decor-Y5FR2" class="d-block h-100">
                                                    <img class="lazyload mx-auto img-fit has-transition"
                                                        src="{{ asset('public/assets/img/P_img.png') }}"
                                                        alt="Decor" title="Decor"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/assets/img/placeholder.jpg')}}">
                                                </a>
                                                <!-- Discount percentage tag -->
                                                <!-- Wholesale tag -->
                                                <!-- wishlisht & compare icons -->
                                            </div>
                                            <div class="text-left">
                                                <div class="productCardInfo">
                                                    <div class="product-card">
                                                        <h2 class="product-title">Multifunctional Sewing Kit</h2>
                                                        <div class="product-rating">
                                                            <span class="rating-star">★</span>
                                                            <span class="rating-value">4.8</span>
                                                            <span class="product-category">| Category</span>
                                                        </div>
                                                        <p class="product-availability">100 Available</p>
                                                        <div class="product-price">
                                                            <span class="original-price">₹1,400</span>
                                                            <span class="discounted-price">₹1,188</span>
                                                        </div>
                                                        <div class="btn_wish">
                                                            <button class="wishlist-icon">
                                                                <button class="wishlist-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                                        <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea" d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z" transform="translate(-2.037 -2.038)" fill="#d65b00"></path>
                                                                    </svg>
                                                                </button>
                                                                <img src="{{ asset('public/assets/img/wishlist.svg') }}" alt="">
                                                            </button>
                                                            <button class="add-to-cart">
                                                                <span>Add to Cart</span>
                                                                <span class="cart-icon">
                                                                    <img src="{{ asset('public/assets/img/bag.svg') }}" alt="">
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- ----------------------------------------------------- -->

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
<!-- ----------------------------------------------------- -->
<div id="section_newest"></div>
<!-- ----------------------------------------------------- -->

<!-- shop by concern start -->

<!-- for big devices -->
<section class="shopbyconcern d-lg-block d-md-block d-sm-none d-none">
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
                <div class="row">
                    <div class="col">
                        <div class="row justify-content-end">
                            <div class="img_col1 shoBy">
                                <img src=" {{asset('public/assets/img/image1.png')}}" alt="" class="img-fluid img1">
                                <span><a href="{{ route('products.category', "decor-2jywo") }}" class="text-white">Decor</a></span>
                            </div>
                            <div class=" img_co2l shoBy">
                                <img src="{{ asset('public/assets/img/image2.png') }}" alt="" class="img-fluid d-flex img2">
                                <span><a href="{{ route('products.category', "women-clothings") }}" class="text-white">Women Clothing</a></span>
                            </div>
                            <div class=" img_col3 shoBy">
                                <img src="{{ asset('public/assets/img/image3.png') }}" alt="" class="img-fluid img3">
                                <span><a href="{{ route('products.category', "demo-category-2") }}" class="text-white">Kids clothings</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                                <div class=" img_col4 shoBy" style="margin-right: 25px;">
                                    <img src="{{ asset('public/assets/img/image4.png') }}" alt="" class="img-fluid img4">
                                    <span><a href="{{ route('products.category', "demo-category-3") }}" class="text-white">Handbags</a></span>
                                </div>
                            <div class="row flex-column">
                                <div class=" img_col5 shoBy">
                                    <img src="{{ asset('public/assets/img/image5.png') }}" alt="" class="img-fluid img5">
                                    <span><a href="{{ route('products.category', "gadgets-md7fv") }}" class="text-white">Gadgets</a></span>
                                </div>
                                <div class=" img_col6 shoBy">
                                    <img src="{{ asset('public/assets/img/image6.png') }}" alt="" class="img-fluid img6">
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
                <div class="row justify-content-center">
                    <div class="img_col1 shoBy">
                        <img src=" {{asset('public/assets/img/image1.png')}}" alt="" class="img-fluid img1">
                        <span><a href="{{ route('products.category', "decor-2jywo") }}" class="text-white">Decor</a></span>
                    </div>

                    <div class=" img_co2l shoBy">
                        <img src="{{ asset('public/assets/img/image2.png') }}" alt="" class="img-fluid d-flex img2">
                        <span><a href="{{ route('products.category', "women-clothings") }}" class="text-white">Women Clothing</a></span>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class=" img_col4 shoBy">
                        <img src="{{ asset('public/assets/img/image4.png') }}" alt="" class="img-fluid img4">
                        <span><a href="{{ route('products.category', "demo-category-3") }}" class="text-white">Handbags</a></span>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class=" img_col3 shoBy">
                        <img src="{{ asset('public/assets/img/image3.png') }}" alt="" class="img-fluid img3">
                        <span><a href="{{ route('products.category', "demo-category-2") }}" class="text-white">Kids clothings</a></span>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="img_col5 shoBy">
                        <img src="{{ asset('public/assets/img/image5.png') }}" alt="" class="img-fluid img5">
                        <span><a href="{{ route('products.category', "gadgets-md7fv") }}" class="text-white">Gadgets</a></span>
                    </div>
                    <div class=" img_col6 shoBy">
                        <img src="{{ asset('public/assets/img/image6.png') }}" alt="" class="img-fluid img6">
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
    <div class="container">
        <!-- Top Section -->
        <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
            <!-- Title -->
            <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0 px-3">
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
        <div class="aiz-carousel arrow-x-0 arrow-inactive-none" data-items="4" data-xxl-items="4"
            data-xl-items="4" data-lg-items="3.4" data-md-items="2.5" data-sm-items="2" data-xs-items="1"
            data-arrows="true" data-dots="false" data-infinite="true">
            @foreach ($best_selers as $key => $seller)
            @if ($seller->user != null)
            <div class="carousel-box h-100 position-relative text-center @if ($key == 0) @endif has-transition">
                <div class="seller_cards">
                    <!-- Shop logo & Verification Status -->
                    <div class="position-relative mx-auto size-100px size-md-120px">
                        <a href="{{ route('shop.visit', $seller->slug) }}"
                            class="d-flex mx-auto justify-content-center align-item-center size-100px size-md-120px border overflow-hidden hov-scale-img"
                            tabindex="0"
                            style="border: 1px solid #e5e5e5; border-radius: 50%; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.06);">
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
                        <span class="button-textt">{{ translate('Visit Store') }} <img src="{{ asset('public/assets/img/arrow.svg') }}" alt=""> </span>
                        <!-- <span class="circlee" aria-hidden="true">
                            <span class="icon arrow"></span>
                        </span> -->
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
<section class="proVideoSec">
    <div class="container">

        <div class="row g-4 mt-5">

            <div class="col-sm-6 col-md-3 col-lg-4 col-xl-3">
             <video width="100%" height="400" controls style="
    border-radius: 23px;
">
  <source src="https://ik.imagekit.io/etu0sqx9h/Meet%20the%20mini%20shoulder%20bag%20from%20Winning%20Kart.%20Compact,%20stylish,%20and%20ready%20to%20complement%20your%20outfit.%20Get%20yours%20today!%20_slingbag%20_stylishbags%20_trendingbag%20_classicbag%20_slingbags%20_winningkart.mp4?updatedAt=1723485890639" type="video/mp4">
  <source src="https://ik.imagekit.io/etu0sqx9h/Meet%20the%20mini%20shoulder%20bag%20from%20Winning%20Kart.%20Compact,%20stylish,%20and%20ready%20to%20complement%20your%20outfit.%20Get%20yours%20today!%20_slingbag%20_stylishbags%20_trendingbag%20_classicbag%20_slingbags%20_winningkart.mp4?updatedAt=1723485890639" type="video/ogg">
  Your browser does not support the video tag.
</video>
                <!--<p class="fw-normal fs-4">Title</p>-->
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
               <video width="100%" height="400" controls style="
    border-radius: 23px;
">
  <source src="https://ik.imagekit.io/etu0sqx9h/instagram%20-%203358398136128592204%20-%20shopwinningkart%20-%20C6bbU-uR1lM.mp4?updatedAt=1723486553153" type="video/mp4">
  <source src="https://ik.imagekit.io/etu0sqx9h/instagram%20-%203358398136128592204%20-%20shopwinningkart%20-%20C6bbU-uR1lM.mp4?updatedAt=1723486553153" type="video/ogg">
  Your browser does not support the video tag.
</video>
               <!-- <p class="fw-normal fs-4">Title</p>-->
            </div>
            <div class="col-sm-6 col-md-3 col-lg-4 col-xl-3">
             <video width="100%" height="400" controls style="
    border-radius: 23px;
">
  <source src="https://ik.imagekit.io/etu0sqx9h/Embrace%20timeless%20elegance%20with%20this%20exquisite%20traditional%20embroidered%20suit,%20where%20heritage%20craftsmanship%20meets%20contemporary%20style.%20_anarkalikurti%20%20_chikankarisuit%20_chikankarikurtis%20_indianfashionstore%20_handmadedres.mp4?updatedAt=1723486554036" type="video/mp4">
  <source src="https://ik.imagekit.io/etu0sqx9h/Embrace%20timeless%20elegance%20with%20this%20exquisite%20traditional%20embroidered%20suit,%20where%20heritage%20craftsmanship%20meets%20contemporary%20style.%20_anarkalikurti%20%20_chikankarisuit%20_chikankarikurtis%20_indianfashionstore%20_handmadedres.mp4?updatedAt=1723486554036" type="video/ogg">
  Your browser does not support the video tag.
</video>
                <!--<p class="fw-normal fs-4">Title</p>-->
            </div>
            <div class="col-sm-6 col-md-3 col-lg-4 col-xl-3">
               <video width="100%" height="400" controls style="
    border-radius: 23px;
">
  <source src="https://ik.imagekit.io/etu0sqx9h/Experience%20timeless%20elegance%20with%20our%20Pure%20Lucknowi%20Chikankari%20Coord%20Set.%20Handcrafted%20with%20intricate%20Chikankari%20embroidery%20_chikankarisuit%20_indianwear%20_kurticollection%20_traditionalwear%20_lucknowchikankari%20_culturewe.mp4?updatedAt=1723486590159" type="video/mp4">
  <source src="https://ik.imagekit.io/etu0sqx9h/Experience%20timeless%20elegance%20with%20our%20Pure%20Lucknowi%20Chikankari%20Coord%20Set.%20Handcrafted%20with%20intricate%20Chikankari%20embroidery%20_chikankarisuit%20_indianwear%20_kurticollection%20_traditionalwear%20_lucknowchikankari%20_culturewe.mp4?updatedAt=1723486590159" type="video/ogg">
  Your browser does not support the video tag.
</video>
               <!-- <p class="fw-normal fs-4">Title</p>-->
            </div>
        </div>

    </div>
</section>
<!-- video slider end -->

<!-- Featured Categories -->
@if (count($featured_categories) > 0)
<section class="mb-2 mb-md-3 mt-2 mt-md-3 winPro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white">
                    <!-- Top Section -->
                    <div class="d-flex mt-2 mt-md-3 mb-2 mb-md-3 align-items-baseline justify-content-between">
                        <!-- Title -->
                        <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0 shead">
                            <span class="">{{ translate('Wining Products') }}</span>
                            <span></span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="col-md-11 m-auto winnig_container_card">
            <div class="px-sm-3">
                <div class="aiz-carousel sm-gutters-17" data-items="3" data-xxl-items="3" data-xl-items="3"
                    data-lg-items="3" data-md-items="2" data-sm-items="2" data-xs-items="1" data-arrows="true"
                    data-dots="false" data-autoplay="false" data-infinite="true">
                    @foreach ($featured_categories as $key => $category)
                    @php
                    $category_name = $category->getTranslation('name');
                    @endphp
                    <div class="carousel-box position-relative p-0 has-transition @if ($key == 0) @endif">
                        <div class="winnig_card">
                            <div class="h-100  w-xl-auto position-relative hov-scale-img overflow-hidden">
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
    </div>
</section>
@endif

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
                    <div class="px-3 pt-3">
                        <!-- Top Section -->
                        <div class="d-flex mb-3 mb-md-4 align-items-baseline justify-content-between">
                            <!-- Title -->
                            <h3 class="top_heading">
                                <span class="">{{ translate('Best of The Winnig Kart') }}</span>
                                <span></span>
                            </h3>
                            <!-- Links -->
                            <!-- <div class="d-flex">
                                <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                                    href="{{ route('brands.all') }}">{{ translate('View All Brands') }}</a>
                            </div> -->
                        </div>
                        <!-- Brands Section -->
                        <div class="aiz-carousel1 arrow-x-0 arrow-inactive-none py-4 row" data-rows="{{ $data_rows }}" data-items="{{ $xxl_items }}" data-xxl-items="{{ $xxl_items }}"
                            data-xl-items="{{ $xl_items }}" data-lg-items="{{ $lg_items }}" data-md-items="{{ $md_items }}" data-sm-items="{{ $sm_items }}" data-xs-items="{{ $xs_items }}"
                            data-arrows="true" data-dots="false">
                            @foreach ($brands as $brand)
                            <div class="carousel-box position-relative text-center hov-scale-img has-transition z-1 col-sm-12 col-md-4 col-lg-4 mb-4">
                                <a href="{{ route('products.brand', $brand->slug) }}" class="winnigKart_box" aria-current="true">
                                    <img src="{{ isset($brand->brandLogo->file_name) ? my_asset($brand->brandLogo->file_name) : static_asset('assets/img/placeholder.jpg') }}" alt="{{ $brand->getTranslation('name') }}" width="32" height="32" class="rounded-circle flex-shrink-0 border border-dark-subtle" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                    <div class="winnig_kart_Con">
                                        <div>
                                            <h6 class="mb-0 listgtitle">{{ $brand->getTranslation('name') }}</h6>
                                            <p class="mb-0 listgsubtitle">Get 60% off on first order</p>
                                        </div>
                                    </div>
                                </a>
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

    <div class="aiz-carousel overflow-hidden arrow-inactive-none arrow-dark arrow-x-0"
        data-items="4" data-xxl-items="4"
        data-xl-items="3" data-lg-items="2" data-md-items="2" data-sm-items="1" data-xs-items="1"
        data-arrows="false" data-dots="true" data-infinite="true">

        <!-- Item1 Starts -->
        <div class="item testimonial-card">
            <main class="test-card-body">
                <div class="profile-image">
                    <img src="https://media.istockphoto.com/id/1248743262/photo/portrait-of-handsome-professional-indian-man-at-his-working-desk-looking-at-the-camera.jpg?s=170667a&w=0&k=20&c=BIkWkZ80snfJeHZeO64_yewArHOe3Dprv66mkeQV9VU=">
                </div>
                <div class="quote">
                    <i class="fa fa-quote-left"></i>
                </div>
                <p class="text-center">WinningKart has quickly become my favorite shopping destination! I recently bought a kurta and a few shirts, and they’ve become my go-to outfits. The quality is fantastic, and I love that I can find something stylish without breaking the bank. Plus, the compliments I’ve been getting don’t hurt either! I’m so glad I found a brand that just gets my style.</p>

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
                    <img src="https://www.fujitsu.com/global/Images/Srinita_2_tcm100-3656044.jpg">
                </div>
                <div class="quote">
                    <i class="fa fa-quote-left"></i>
                </div>
                <p class="text-center">I’m someone who loves making my home cozy and inviting, and WinningKart helped me do just that. I ordered a few decor pieces, and they’ve completely transformed my living room. The quality is great, and the designs are even better in person. It feels so good to walk into a space that reflects my style. I’m definitely going back for more!</p>

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
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/027/215/198/small/smiling-young-indian-freelancer-posing-at-home-office-free-photo.jpg">
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
                    <img src="https://st2.depositphotos.com/4153545/8121/i/450/depositphotos_81211808-stock-photo-young-woman-at-outdoors.jpg">
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
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVNJ_kKCThnq6TXdzkZQGy_OdsvnNtOdLgXMWb5j_bZ4aKwq-5oZmgDj217QQnqELL9vE&usqp=CAU">
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
<!--<div id="section_home_categories"></div>-->

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
            selectedContent.style.display = 'flex'; // Set display to flex
            selectedContent.classList.add('active');
        });
    });

    // Initially display the first city and set it as active
    const initialCity = document.querySelector('.city-btn.active');
    if (initialCity) {
        const initialCityId = initialCity.getAttribute('data-city');
        const initialContent = document.getElementById(initialCityId);
        if (initialContent) {
            initialContent.style.display = 'flex'; // Set display to flex
            initialContent.classList.add('active');
        }
    }
</script>


@endsection