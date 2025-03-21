@extends('auth.layouts.authentication')

@section('content')
    <!-- aiz-main-wrapper -->
    <div class="aiz-main-wrapper d-flex flex-column justify-content-center bg-white">
        <section class="bg-white overflow-hidden" style="min-height:100vh;">
            <div class="row" style="min-height: 100vh;">
                <!-- Left Side Image-->
                <div class="col-xxl-6 col-lg-7">
                    <div class="h-100">
                        <img src="{{ uploaded_asset(get_setting('customer_login_page_image')) }}" alt="" class="img-fit h-100">
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
                                    <h1 class="fs-20 fs-md-24 fw-700 text-primary" style="text-transform: uppercase;">{{ translate('Welcome Back !')}}</h1>
                                    <h5 class="fs-14 fw-400 text-dark">Login / Register</h5>
                                </div>
                                <!-- Login form -->
                                <div class="pt-3 pt-lg-4 bg-white">
                                    <div class="">
                                        <form class="form-default" role="form" action="{{ route('user.login') }}" method="POST">
                                            @csrf  
                                                <div class="form-group phone-form-group mb-1">
                                                    <label for="phone" class="fs-12 fw-700 text-soft-dark">{{  translate('Phone') }}</label>
                                                    <input type="tel" id="phone-code" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} rounded-0" value="{{ old('phone') }}" placeholder="Enter Phone Number" name="phone">
                                                </div> 
                                                <input type="hidden" name="country_code" value=""> 
                                                <div class="form-group email-form-group mb-1 d-none">
                                                    <label for="email" class="fs-12 fw-700 text-soft-dark">{{  translate('Email') }}</label>
                                                    <input type="email" class="form-control rounded-0 {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Enter Email Id" name="email" id="email" autocomplete="off">
                                                    
                                                </div>
                                                
                                                <div class="form-group text-right">
                                                @error('email')
                                                        <p style="color:red;"><strong>{{ $message }}</strong></p>
                                                    @enderror
                                                    @error('phone')
                                                        <p style="color:red;"><strong>{{ $message }}</strong></p>
                                                    @enderror
                                                    @error('custom_error')
                                                        <p style="color:red;"><strong>{{ $message }}</strong></p>
                                                    @enderror
                                                    
                                                    <button class="btn btn-link p-0 text-primary" type="button" onclick="toggleEmailPhone(this)"><i>*{{ translate('Use Email Instead') }}</i></button>
                                                </div> 
                                            <div class="mb-4 mt-4">
                                                <button type="submit" class="btn btn-primary btn-block fw-700 fs-14 rounded-0">{{  translate('Login') }}</button>
                                            </div>
                                        </form>
 
                                        <div class="text-center mb-3">
                                                <span class="bg-white fs-12 text-gray">{{ translate('Or Login With')}}</span>
                                            </div>
                                            <ul class="list-inline social colored text-center mb-4">
                                            <li class="list-inline-item">
                                                        <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google">
                                                            <i class="lab la-google"></i>
                                                        </a>
                                                    </li>
                                                    </ul>
                                        <!-- Social Login -->
                                        @if(get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1 || get_setting('apple_login') == 1)
                                            <div class="text-center mb-3">
                                                <span class="bg-white fs-12 text-gray">{{ translate('Or Login With')}}</span>
                                            </div>
                                            <ul class="list-inline social colored text-center mb-4">
                                                @if (get_setting('facebook_login') == 1)
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="facebook">
                                                            <i class="lab la-facebook-f"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if(get_setting('google_login') == 1)   
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google">
                                                            <i class="lab la-google"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (get_setting('twitter_login') == 1)
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="twitter">
                                                            <i class="lab la-twitter"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (get_setting('apple_login') == 1)
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('social.login', ['provider' => 'apple']) }}"
                                                            class="apple">
                                                            <i class="lab la-apple"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        @endif
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
    <script type="text/javascript">
        function autoFillCustomer(){
            $('#email').val('customer@example.com');
            $('#password').val('123456');
        }
    </script>
@endsection