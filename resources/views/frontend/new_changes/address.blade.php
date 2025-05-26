 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy cosmetics & beauty products online from Winningkart, the online shopping beauty store. Browse makeup, health products & more from top beauty brands. ✔ free shipping* ✔ Cash on Delivery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('public/assets/css/custom-style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <style>
        .inp {
            position: relative;
            margin: auto;
            width: 100%;
            border-radius: 3px;
            overflow: hidden;
        }
        .inp .label {
            position: absolute;
            top: 20px;
            left: 12px;
            font-size: 15px;
            color: rgba(0, 0, 0, 0.5);
            font-weight: 400;
            transform-origin: 0 0;
            transform: translate3d(0, 0, 0);
            transition: all 0.2s ease;
            pointer-events: none;
        }
        .inp .focus-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:#f3f5f6;
            z-index: -1;
            transform: scaleX(0);
            transform-origin: left;
        }
        .inp input {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 100%;
            border: 0;
            font-family: inherit;
            padding: 16px 12px 0 12px;
            height: 56px;
            font-size: 15px;
            font-weight: 500;
            background: #f3f5f6;
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.3);
            color: #333;
            transition: all 0.15s ease;
        } 
        .inp input:not(:-moz-placeholder-shown) + .label {
            color: rgba(0, 0, 0, 0.5);
            transform: translate3d(0, -12px, 0) scale(0.75);
        }
        .inp input:not(:-ms-input-placeholder) + .label {
            color: rgba(0, 0, 0, 0.5);
            transform: translate3d(0, -12px, 0) scale(0.75);
        }
        .inp input:not(:placeholder-shown) + .label {
            color: rgba(0, 0, 0, 0.5);
            transform: translate3d(0, -12px, 0) scale(0.75);
        }
        .inp input:focus {
            outline: none;
            box-shadow: inset 0 -2px 0#f60;
        }
        .inp input:focus + .label {
            transform: translate3d(0, -12px, 0) scale(0.75);
        }
        .inp input:focus + .label + .focus-bg {
            transform: scaleX(1);
            transition: all 0.1s ease;
        }
        .textareawid{
            width: 100%;
            background: #f3f5f6;
            min-height: 100px;
            outline: none;
            border: none;
            padding: 7px 13px;
            font-size: 15px;
        }
        .form-check-input:checked{
            background-color: #f60;;
            border-color: #f60;
        }
        .form-check-input:focus{
            box-shadow: none;
            border-color: #f60;
            color: #f60;
        }
        #shipaddress:disabled{
            background: #c68860;
            color: gainsboro;
        }
    </style>
</head>
<body>
    <header class="loginHeader">
        <div class="container" style="max-width:1140px">
            <div class="d-flex align-items-center">
                <div class="w-25">
                    <a href="{{ route('home') }}">
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
                        <span class="stepWise addre"><b>2</b></span>
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
            <div class="adr1">
                <p class="accountsh1">Choose Address</p>
                <p class="accountp1 mt-2">Detailed address will help our delivery partner reach your doorstep quickly</p>
            </div>
            <div class="row mt-5">
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <div class="adressBorder dxt5 d-flex justify-content-center align-items-center" id="add_new_address_box">
                                <div class="addAdress">
                                    <div class="d-flex justify-content-center" style="font-size:40px;"><i class="ri-add-fill"></i></div>
                                    <div>Add New Address</div>
                                </div>
                            </div>
                        </div>
                        @if(count($addresses) > 0)
                            @foreach($addresses as $address)
                                <div class="col-md-6 mt-3">
                                    <div class="adressBorder adressBorder2  d-flex justify-content-center align-items-center">
                                        <div class="addressDetails p-4"> 
                                            <span class="userName">{{ $address->name ?? '' }}</span><br>
                                            @if($address->set_default == 1)
                                                <p>Default</p>
                                            @endif
                                            <span>{{ $address->house_number ?? '' }}, {{ $address->address ?? '' }}</span><br>
                                            <span>{{ $address->area}}, {{ $address->state}} - {{ $address->postal_code ?? '' }}</span><br>
                                            <span>{{ $address->phone ?? '' }}</span>
                                            <div class="d-flex gap-3 editbuttons">
                                                <a href="javascript:void(0)" id="edit_btn" class="edit_btn"
                                                    data-id="{{ $address->id ?? '' }}"
                                                    data-house-number="{{ $address->house_number ?? '' }}"
                                                    data-address="{{ $address->address ?? '' }}" 
                                                    data-area="{{ $address->area }}" 
                                                    data-state="{{ $address->state }}" 
                                                    data-postalcode="{{ $address->postal_code ?? '' }}" 
                                                    data-phone="{{ $address->phone ?? '' }}"
                                                    data-user-name="{{ $address->name ?? '' }}"
                                                    data-user-email="{{ $address->email ?? '' }}" 
                                                    data-set-default="{{ $address->set_default }}" 
                                                    >Edit</a>
                                                <a href="{{ route('frontend.auth.deliver_here', [$address->id]) }}" class="deliverhere text-white">Deliver here</a>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif 
                    </div>
                </div>
                <div class="col-4">
                    @include('frontend.new_changes.side_cart') 
                    <div class="mt-3 d-flex gap-2" style="background: rgb(249, 250, 250); padding: 12px 17px;">
                        <span><p class="authontic">Buy authentic products. Pay securely. Easy returns and exchange</p></span>
                        <span><img src="{{ url('public\assets\img\BuyerAssuran.svg') }}"></span>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <div class="right_sidebarAdress">
        <div class="overlayer-02"></div>
        <div class="sidebarRight" id="cart_elements">
            <div class="sidbar_Header">
                <div class="d-flex gap-3 align-items-center">
                    <span class="closeArrow"><i class="ri-close-circle-line"></i></span><b>Add New Address</b>
                </div>
            </div>  
            <div class="card_body"> 
                <div>
                    <form id="address_form" method="POST">
                        @csrf
                        @if(Auth::user())
                            <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}">
                        @endif
                        <div class="p-2">   
                            <div class="contactsection mt-4 mb-2">
                                <h2>Address</h2>
                            </div> 
                            <div>
                                <label for="inp" class="inp mb-1">
                                    <input type="number" class="postalcode" id="postalcode" name="postal_code" placeholder="&nbsp;" required>
                                    <span class="label">Pincode</span>
                                </label>
                                <p class="errorSixdigit text-danger" id="errorSixdigit"></p>
                            </div> 
                            <div id="postalArea">
                                <div class="d-flex" style="gap:10px">
                                    <div>
                                        <label for="area" class="inp mb-1">
                                            <input type="text" id="area" readonly name="area" placeholder="&nbsp;" required>
                                            <span class="label">Area</span> 
                                        </label>
                                    </div>
                                    <div>
                                        <label for="inp" class="inp mb-1">
                                            <input type="text" id="state" readonly name="state" placeholder="&nbsp;" required>
                                            <span class="label">State</span> 
                                        </label>
                                    </div>
                                </div>
                            </div> 
                            <div>
                                <label for="house_number" class="inp mb-1">
                                    <input type="text" id="house_number" name="house_number"  placeholder="&nbsp;" required>
                                    <span class="label">House/Flat/office No</span> 
                                </label>
                            </div> 
                            <div>
                                <textarea  class="textareawid" id="address" name="address" placeholder="Road Name/ Area/ Colony" required></textarea>
                            </div> 
                            @if(Auth::user()) 
                            <div class="d-flex justify-content-between align-content-center mt-3">
                                <p class="mb-0 textcheck">Use as default address</p>
                                <div class="form-check form-switch flex-column-reverse">
                                    <input class="form-check-input" id="is_default_address" type="checkbox" role="switch" name="is_default_address" checked>
                                </div> 
                            </div> 
                            @endif
                            <div class="mt-4 mb-4 contactsection">
                                <h2>Contact</h2>
                                <p>Information provided here will be used to contact you for delivery updates</p>
                            </div>
                            <div>
                                <label for="username" class="inp mb-1">
                                    <input type="text" id="name" name="name" placeholder="&nbsp;" required>
                                    <span class="label">Name</span> 
                                </label>
                            </div>
                            <div>
                                <label for="number" class="inp mb-1">
                                    <input type="hidden" value="+91" name="country_code">
                                    <input type="number" id="phone" name="phone" placeholder="&nbsp;" required>
                                    <span class="label">Phone</span> 
                                </label>
                                <p style="font-size: 12px;" id="error_number" class="text-danger">Please Enter 10 Digits Number</p>
                            </div>
                            <div>
                                <label for="email" class="inp mb-1">
                                    <input type="email" id="email" name="email" placeholder="&nbsp;" required>
                                    <span class="label">Email</span> 
                                </label>
                            </div>
                        </div>
                        <div class="cart_footer"> 
                            <div class="proceed_cart" style="width: 100%;">
                                <input type="submit" id="shipaddress" class="shipaddress" value="SHIP TO THIS ADDRESS">
                            </div> 
                        </div> 
                    </form>
                </div> 
            </div> 
        </div>               
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script src="{{ url('public\assets\js\custom_new_changes.js') }}"></script>
    
    <script>
        $(document).ready(function(){
            $("#error_number").hide();
            $('#add_new_address_box').on('click', function(){
                $(".right_sidebarAdress").toggleClass("showSidebarAddress");
                $(".overlayer-02").toggleClass("showOverlayAddress");
                let submit_url = "{{ route('addresses.store') }}"; 
                $('#address_form').attr('action', submit_url);
            });
            $(".overlayer-02").click(function () {
                $(".right_sidebarAdress").removeClass("showSidebarAddress");
                $(this).removeClass("showOverlayAddress");
            });
            $(".closeArrow").click(function () { 
                $(".right_sidebarAdress").removeClass("showSidebarAddress");
                $('.overlayer-02').removeClass("showOverlayAddress");
            });
            $(".edit_btn").on("click", function(){
                let id = $(this).data('id');
                let house_number = $(this).data('house-number');
                let address = $(this).data('address');
                let city_id = $(this).data('city-id');
                let city_name = $(this).data('city-name');
                let state_id = $(this).data('state-id');
                let state_name = $(this).data('state-name');
                let postalcode = $(this).data('postalcode');
                let phone = $(this).data('phone');
                let user_name = $(this).data('user-name');
                let user_email = $(this).data('user-email');
                let area = $(this).data('area');
                let state = $(this).data('state');
                let is_default = $(this).data('set-default');
                $('#postalArea').show();
                let submit_url = "{{ route('addresses.update', [':id']) }}";
                submit_url = submit_url.replace(':id', id);
                $('#address_form').attr('action', submit_url);
                $(".right_sidebarAdress").toggleClass("showSidebarAddress");
                $(".overlayer-02").toggleClass("showOverlayAddress");
                $("#postalcode").val(postalcode);
                $("#house_number").val(house_number);
                $("#address").val(address);
                $("#name").val(user_name);
                $("#email").val(user_email);
                $("#phone").val(phone);
                $("#area").val(area);
                $("#state").val(state);
                if (is_default) {
                    $("input[name='is_default_address']").prop("checked", true);
                } else {
                    $("input[name='is_default_address']").prop("checked", false);
                }
            });

            $('#errorSixdigit').hide();
            $('#postalArea').hide(); 
            
            // document.getElementById('postalcode').addEventListener('change', async function(){
            //     let postalcode = document.getElementById('postalcode').value; 
            //     let postalUrl = `https://api.zippopotam.us/IN/${postalcode}`; 
            //     if(postalcode.length < 6){
            //         $('#errorSixdigit').text('Please enter a 6-digit pincode').show();
            //     }else{
            //         $('#errorSixdigit').hide(); 
            //     }
            //     try{
            //         let response = await fetch(postalUrl);
            //         if(!response.ok){
            //             if(postalcode.length >= 6){
            //                 $('#errorSixdigit').text('Invalid Pincode').show(); 
            //             } 
            //             $('#postalArea').hide();
            //         }else{
            //             $('#errorSixdigit').hide();
            //             let data = await response.json();
            //             let myplaces = data.places;
            //             console.log(myplaces)
            //             $('#area').val(myplaces[0]['place name']);
            //             $('#state').val(myplaces[0].state);
            //             $('#postalArea').show();
            //         } 
            //     }catch(error){
            //         console.log(error);
            //     }
            //  }); 

           }); 
        
    </script> 
    <script>
        document.getElementById("phone").addEventListener('input', function(e){ 
             let value = e.target.value; 
             value = value.replace(/\D/g, ''); 
          
            if (value.length >= 10) {
                value = value.slice(0, 10);
                $("#shipaddress").prop('disabled', false);
                $("#error_number").hide();
            }else{
                  $("#shipaddress").prop('disabled', true);
                  $("#error_number").show();
            }
            e.target.value = value; 
        });
    </script>
</body>
</html>