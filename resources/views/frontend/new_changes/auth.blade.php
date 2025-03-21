 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('public/assets/css/custom-style.css') }}">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
</head>
<body>
<header class="loginHeader">
    <div class="container" style="max-width:1140px">
         <div class="d-flex align-items-center">
                <div class="w-25">
                    <a href="">
                        <img src="{{ url('/public/uploads/all/DOpocsFF5UbkkXMXjmOHv8h4TGg0yB5GJ0tVZ3Ri.webp') }}"
                        style="width:150px">
                    </a>
                </div>
                <div class="row w-75">

                    <div class="col-4 d-flex align-items-center gap-3">
                        <span class="stepWise color1"><i class="ri-user-line"></i></span>
                        <span>Sign Up</span>
                    </div>

                    <div class="col-4 d-flex align-items-center gap-3">
                        <span class="stepWise"><b>2</b></span>
                        <span>Address</span>
                    </div>

                    <div class="col-4 d-flex align-items-center gap-3">
                        <span class="stepWise"><b>3</b></span>
                        <span> Payment</span>
                    </div>

                </div>
         </div>  
    </div>
</header>

<section>
    <div class="container mt-4" style="max-width:1140px">
         <div>
            <p class="accountsh1">Account</p>
            <p class="accountp1 mt-2">To place your order now, log into your existing account or signup</p>
         </div>

         <div class="row mt-5">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                                <img src="{{url('public\assets\img\auth1.svg ')}}">
                                <p class="cardDetails">Have an account?<br>
                                 Reward points on every order you place</p>
                                 <a href="{{ route('user.login') }}" >
                                 <div class="p-2">
                                    <button class="loginElement">Log in</button>
                                 </div>
                                 </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                                <img src="{{url('public\assets\img\auth1.svg ')}}">
                                <p class="cardDetails">Have an account?<br>
                                 Reward points on every order you place</p>
                                 <a href="{{ route('user.login') }}" >
                                 <div class="p-2">
                                    <button class="loginElement bg-white gt23">Sign up</button>
                                 </div>
                                 </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                                <img src="{{url('public\assets\img\auth1.svg ')}}">
                                <p class="cardDetails">Have an account?<br>
                                 Reward points on every order you place</p>
                                 <a href="{{ route('frontend.auth.address') }}">
                                 <div class="p-2">
                                    <button class="loginElement bg-white gt23">Countinue as guest</button>
                                 </div>
                                 </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">   
               @include('frontend.new_changes.side_cart') 
                <div class="mt-3 d-flex gap-2"
                    style="background: rgb(249, 250, 250); padding: 12px 17px;"
                 >
                    <span>
                        <p class="authontic">Buy authentic products. Pay securely. Easy returns and exchange</p>
                    </span>
                    <span>
                        <img src="{{ url('public\assets\img\BuyerAssuran.svg') }}">
                    </span>
                </div>
               <!----->

            </div>
         </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>