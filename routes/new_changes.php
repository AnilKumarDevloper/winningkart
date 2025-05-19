<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewChangesController;
use App\Http\Controllers\ReviewController;
 

Route::middleware('guest')->group(function () {
    Route::controller(NewChangesController::class)->group(function(){
        Route::get('/auth/cart', 'authCartLogin')->name('frontend.auth_cart_login');
        Route::get('/login', 'allUserLoginView')->name('user.login');
        Route::post('/login', 'allUserLoginSubmit');
        Route::get('/auth/verify-otp/{platform}/{user_id}/{redirection_url?}', 'verifyOtpToLogin')->name('frontend.verify_otp');
        Route::post('/auth/verify-otp-submit/{redirection_url?}', 'verifyOtpToLoginSubmit')->name('frontend.verify_otp_submit');
        Route::get('/auth/resend-otp/{platform}/{user_id}', 'resendOtp')->name('frontend.resend_otp');
    });
});

    Route::middleware('guest')->group(function () {
        Route::controller(NewChangesController::class)->group(function(){
            Route::get('/admin/login', 'adminLoginView')->name('backend.admin_login_view'); 
            Route::post('/admin/login', 'adminLoginSubmit')->name('backend.admin_login_submit'); 
        });
    });
    
    // Route::get('/admin', [NewChangesController::class, 'redirectAdminLogin'])->name('frontend.redirect_admin_login');
    // Route::get('/admin/login', [NewChangesController::class, 'adminLoginView'])->name('frontend.admin_login_view');
    
    Route::get('/auth/address', [NewChangesController::class, 'authAddress'])->name('frontend.auth.address');
    Route::get('/auth/payment', [NewChangesController::class, 'authPayment'])->name('frontend.auth.payment');
    Route::get('/auth/deliver-here/{id}', [NewChangesController::class, 'deliverHere'])->name('frontend.auth.deliver_here');
 
    // Route::post('/payment/create-razorpay-order', [NewChangesController::class, 'createOrder'])->name('payment.create_razorpay_order');
    // Route::post('/payment/verify-razorpay-payment', [NewChangesController::class, 'verifyPayment'])->name('payment.verify_razorpay_payment');
    Route::get('/offers/special-offer', [NewChangesController::class, 'specialOffer'])->name('payment.special_offer');
    Route::get('/review/all-images/{slug}', [NewChangesController::class, 'reviewImages'])->name('product.review_images');
   
    Route::get('/product_review/get-all-review-on-product-page', [ReviewController::class, 'getAllReviewOnProductPage'])->name('get_all_review_on_product_page');
    Route::get('/api/brand-list', [NewChangesController::class, 'getBrandListFromFilter'])->name('get_brand_list_from_filter');
    Route::get('/api/color-list', [NewChangesController::class, 'getAllColorList'])->name('get_all_color_list');
 
    
    Route::middleware(['auth', 'web'])->group(function () {
    });

