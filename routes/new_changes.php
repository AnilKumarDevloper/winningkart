<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewChangesController;
 

Route::middleware('guest')->group(function () {
    Route::controller(NewChangesController::class)->group(function(){
        Route::get('/auth/cart', 'authCartLogin')->name('frontend.auth_cart_login');
        
        Route::get('/login', 'allUserLoginView')->name('user.login');
        Route::post('/login', 'allUserLoginSubmit');
        
        Route::get('/auth/verify-otp/{platform}/{user_id}', 'verifyOtpToLogin')->name('frontend.verify_otp');
        Route::post('/auth/verify-otp-submit', 'verifyOtpToLoginSubmit')->name('frontend.verify_otp_submit');
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
    
    Route::middleware(['auth', 'web'])->group(function () {
        Route::get('/auth/payment', [NewChangesController::class, 'authPayment'])->name('frontend.auth.payment');
    });

