@extends('auth.layouts.authentication')

@section('content')

<style>
    .userOtpElements{
        gap:10px;
        justify-content: center;
    }
    .userOtpElements input{
    	width: 50px;
        background-color: rgb(243 245 246);
        outline: none;
        text-align: center;
    }
    .resendotp p{
        text-align: right;
        color: rgb(243 245 246) !important;
        margin-right: 13%;
    }
    
  .grayscal4{
	position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 100;
    display: none;
 
  }
 
 
.loader {
  width: 50px;
  aspect-ratio: 1;
  display: grid;
  border-radius: 50%;
  background:
    linear-gradient(0deg, rgb(255 255 255 / 50%) 30%, #ffffff00 0 70%, rgb(255 255 255 / 100%) 0) 50% / 8% 100%,
    linear-gradient(90deg, rgb(255 255 255 / 25%) 30%, #ffffff00 0 70%, rgb(255 255 255 / 75%) 0) 50% / 100% 8%;

  background-repeat: no-repeat;
  animation: l23 1s infinite steps(12);
}
.loader::before,
.loader::after {
   content: "";
   grid-area: 1/1;
   border-radius: 50%;
   background: inherit;
   opacity: 0.915;
   transform: rotate(30deg);
}
.loader::after {
   opacity: 0.83;
   transform: rotate(60deg);
}
@keyframes l23 {
  100% {transform: rotate(1turn)}
}
 
</style>
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
                         <!-- Go Back -->
                            <a href="{{ url()->previous() }}" class="mt-3 fs-14 fw-700 d-flex align-items-center text-primary" style="max-width: fit-content;">
                                <i class="las la-arrow-left fs-20 mr-1"></i> 
                            </a>
                            
                        <div class="row align-items-center justify-content-center justify-content-lg-start h-100">
                            <div class="col-xxl-6 p-4 p-lg-5">
                                <!-- Site Icon -->
                                <div class="size-48px mb-3 mx-auto mx-lg-0">
                                    <img src="{{ uploaded_asset(get_setting('site_icon')) }}" alt="{{ translate('Site Icon')}}" class="img-fit h-100">
                                </div>
                                <!-- Titles -->
                                <div class="text-center text-lg-left">
                                    <h1 class="fs-20 fs-md-24 fw-700 text-primary" style="text-transform: uppercase;">{{ translate('OTP Verification')}}</h1>
                                    <h5 class="fs-14 fw-400 text-dark">{{ translate('Enter OTP received on')}} 
                                        @if($platform == 'email')
                                        <span>{{ $user->email }}</span>
                                        @elseif($platform == 'phone')
                                        <span>{{ $user->phone }}</span>
                                        @endif
                                   </h5>
                                </div>
                                <!-- Login form -->
                                <div class="pt-3 pt-lg-4 bg-white">
                                    <div class="">

                                         <form id="verifyOTP" action="{{ route('frontend.verify_otp_submit') }}" method="POST">  
                                            <div class="userOtpElements d-flex" id="maxotp">
                                                <input type="number" name="otp_digit_first" class="form-control otp-input fin" maxlength="1" autocomplete="off">
                                                <input type="number" name="otp_digit_second" class="form-control otp-input" maxlength="1"  autocomplete="off">
                                                <input type="number" name="otp_digit_third" class="form-control otp-input" maxlength="1" autocomplete="off">
                                                <input type="number" name="otp_digit_forth" class="form-control otp-input" maxlength="1" autocomplete="off">
                                                <input type="number" name="otp_digit_fifth" class="form-control otp-input" maxlength="1" autocomplete="off">
                                                <input type="number" name="otp_digit_sixth" class="form-control otp-input" maxlength="1" autocomplete="off"> 
                                            </div> 
                                            <input type="hidden" name="platform" value="{{ $platform }}">
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">

                                            @error('custom_error')
                                                        <p style="color:red;" class="text-center mt-2">{{ $message }}</p>
                                            @enderror
                                        </form>
                                        <div class="mt-3 resendotp">
                                           <p><a href="{{ route('frontend.resend_otp', [$platform, $user->id]) }}" id="resent_otp_btn" class="">Resend OTP</a></p>
                                        </div>
                                        <div>
                                            <p class="text-center">By Continuing | agree to winningcart <a href="">T&C</a></p>
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
    <div class="card toast-container position-fixed bottom-0 right-0 end-0 text-white p-2 tostscontainer" id="liveToas" style="background-color: #f60; display: none;">
        <div class="toasts" role="alert" aria-live="assertive" aria-atomic="true"> 
            <div class="toast-body">
            OTP resend successfully!
            </div>
        </div>
    </div>
    
    <div class="grayscal4">
        <div class="d-flex h-100 justify-content-center align-items-center">
           
                <div class="loader"></div>
            
        </div> 
    </div>
@endsection

@section('script')
@if(Session::has('otp_sent_success'))
    <script>
        $("#liveToas").show();
        setTimeout(() =>{
                        $('#liveToas').hide();
                     },3000)
    </script>
@endif

<script>
    $("#resent_otp_btn").on("click", function(){
        $('.grayscal4').show();
    });
</script>
    
    <script>
        $(document).ready(function(){  

            $('.fin').focus();
             $('.otp-input').on('input', function(e) { 
                 this.value  = this.value.replace(/[^0-9]/g, '').slice(0, 1);
                $(this).next('.otp-input').focus(); 
            }); 

            $('.otp-input').on('keydown', function(e){ 
                if(e.key === "Backspace") {
                    $(this).prev('.otp-input').focus().val('');
                }   
                if(e.key === 'ArrowDown' || e.key === 'ArrowUp'){
                    e.preventDefault();
                }

            });

                // form submited function
            $('.otp-input').on('input', function(e) { 
                let allFilled = true;
                e.preventDefault();
                $('.otp-input').each(function() {
                    if ($(this).val().trim() === '') {
                        allFilled = false;
                        return false; 
                    }
                }); 
                if (allFilled) {   
                    $('.grayscal4').show();
                    $('#verifyOTP').submit(); 
                }
            });


        });
    </script>
@endsection