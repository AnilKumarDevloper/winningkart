@extends('auth.layouts.authentication')

@section('content')
    
     <!-- aiz-main-wrapper -->
 <div class="aiz-main-wrapper d-flex flex-column justify-content-center bg-white">
    <section class="bg-white overflow-hidden" style="min-height:100vh;">
        <div class="row no-gutters" style="min-height:100vh;">
            <!-- Left Side Image-->
            <div class="col-xxl-6 col-lg-7">
                <div class="h-100">
                    <img src="{{ uploaded_asset(get_setting('admin_login_page_image')) }}" alt="" class="img-fit h-100">
                </div>
            </div>
            
            <!-- Right Side -->
            <div class="col-xxl-6 col-lg-5">
                <div class="right-content">
                    <div class="row align-items-center justify-content-center justify-content-lg-start h-100">
                        <div class="col-xxl-6 p-4 p-lg-5">
                            <!-- Site Icon -->
                            <div class="size-48px mb-3 mx-auto mx-lg-0">
                                <img src="{{ uploaded_asset(get_setting('site_icon')) }}" alt="{{ translate('Site Icon')}}" class="img-fit h-100">
                            </div>
                            <!-- Titles -->
                            <div class="text-center text-lg-left">
                                <h1 class="fs-20 fs-md-20 fw-700 text-primary" style="text-transform: uppercase;">{{ translate('Welcome to') }} {{ env('APP_NAME') }}</h1>
                                <h5 class="fs-14 fw-400 text-dark">{{ translate('Login to your account')}}</h5>
                            </div>
                            <!-- Login form -->
                            <div class="pt-3 pt-lg-4 bg-white">
                                <div class="">
                                    <form class="form-default" role="form" action="{{ route('backend.admin_login_submit') }}" method="POST">
                                        @csrf
                                        
                                        <!-- Email-->
                                        <div class="form-group">
                                            <label for="email" class="fs-12 fw-700 text-soft-dark">{{  translate('Email') }}</label>
                                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} rounded-0" value="{{ old('email') }}" placeholder="{{  translate('johndoe@example.com') }}" name="email" id="email" autocomplete="off">
                                             @error('email')
                                                <p style="color:red;">{{ $message }}</p>
                                             @enderror
                                             @error('custom_error_email')
                                                <p style="color:red;">{{ $message }}</p>
                                             @enderror
                                        </div>
                                            
                                        <!-- password -->
                                        <div class="form-group">
                                            <label for="password" class="fs-12 fw-700 text-soft-dark">{{  translate('Password') }}</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control rounded-0 {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ translate('Password')}}" name="password" id="password">
                                                <i class="password-toggle las la-2x la-eye"></i>
                                            </div>
                                            @error('password')
                                                <p style="color:red;">{{ $message }}</p>
                                             @enderror
                                            @error('custom_error_phone')
                                                <p style="color:red;">{{ $message }}</p>
                                             @enderror
                                        </div>

                                        <div class="row mb-2">
                                            <!-- Remember Me -->
                                            <div class="col-6">
                                                <label class="aiz-checkbox">
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <span class="has-transition fs-12 fw-400 text-gray-dark hov-text-primary">{{  translate('Remember Me') }}</span>
                                                    <span class="aiz-square-check"></span>
                                                </label>
                                            </div>
                                            <!-- Forgot password -->
                                            <div class="col-6 text-right">
                                                <a href="{{ route('password.request') }}" class="text-reset fs-12 fw-400 text-gray-dark hov-text-primary"><u>{{ translate('Forgot password?')}}</u></a>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mb-4 mt-4">
                                            <button type="submit" class="btn btn-primary btn-block fw-700 fs-14 rounded-0">{{  translate('Login') }}</button>
                                        </div>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('script') 
@endsection
