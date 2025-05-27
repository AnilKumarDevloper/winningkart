(function ($) { 
    "use strict"; 
    
    let app_url = $('meta[name="app-url"]').attr('content');

    $(document).on("click", "#coupon-apply", function() {
        var code = $("#coupon_code_val").val(); 
        applyCoupon(code);
    });  

    $(document).on("click", ".applycoupon", function(){
        let couponcode = $(this).data('couponcode');
        applyCoupon(couponcode);
    });
    $(document).on("click", ".removecoupon", function(){ 
        removeCoupon();
    });

    function applyCoupon(code) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: app_url + 'checkout/apply-coupon-code',
            data: { code: code },
            cache: false,
            success: function(data, textStatus, jqXHR) {
                if (data.response_message.response !== "success") {
                    $("#apply_coupon_errror").text(data.response_message.message);
                    return false;
                }
                AIZ.plugins.notify(data.response_message.response, data.response_message.message);
                $("#cart_items").html(data.html);
                $(".right_sidebar").addClass('showSidebar');
                $(".overlayer-2").addClass('showOverlay');
            },
            error: function(xhr) {
                console.error("Error:", xhr.responseText);
                $("#apply_coupon_errror").text("Something went wrong. Please try again.");
            }
        });
    }

    function removeCoupon() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: app_url + 'checkout/remove-coupon-code',
            data: { },
            cache: false,
            success: function(data, textStatus, jqXHR) {
                console.log(data);
                if (data.response_message.response !== "success") {
                    $("#apply_coupon_errror").text(data.response_message.message);
                    return false;
                }
                AIZ.plugins.notify(data.response_message.response, data.response_message.message);
                $("#cart_items").html(data.html);
                $(".right_sidebar").addClass('showSidebar');
                $(".overlayer-2").addClass('showOverlay');
            },
            error: function(xhr) {
                console.error("Error:", xhr.responseText);
                $("#apply_coupon_errror").text("Something went wrong. Please try again.");
            }
        });
    } 

//    $('#customerReviewImg').carousel({
//         interval: false
//     });

    /// address pincode functions   
    document.getElementById('postalcode').addEventListener('change', async function(){
        let postalcode = document.getElementById('postalcode').value; 
        let postalUrl = `https://api.zippopotam.us/IN/${postalcode}`; 
        if(postalcode.length < 6){
            $('#errorSixdigit').text('Please enter a 6-digit pincode').show();
        }else{
            $('#errorSixdigit').hide(); 
        }
        try{
            let response = await fetch(postalUrl);
            if(!response.ok){
                if(postalcode.length >= 6){
                    $('#errorSixdigit').text('Invalid Pincode').show(); 
                } 
            // $('#postalArea').hide();
            }else{
                $('#errorSixdigit').hide();
                let data = await response.json();
                let myplaces = data.places;
            
                $('#area').val(myplaces[0]['place name']);
                $('#state').val(myplaces[0].state);
            // $('#postalArea').show();
            } 
        }catch(error){
            console.error(error);
        }
    });

})(jQuery);


    // product detail function check address with pinchod
    // document.getElementById('delivery_option_pincode').addEventListener('submit', async function(e){
        
    //     e.preventDefault();
    //     const delivery_pincode = document.getElementById('delivery_pincode').value;
    //     const response = await fetch(`https://api.zippopotam.us/IN/${delivery_pincode}`); 
    //     delivery_pincode.value 

    //     if(delivery_pincode.length === 6){
    //         try{
    //             if(!response.ok){ 
    //                 $('#validPincode').show();
    //                 $('#validPincode').text('Please enter valid pincode');
    //                 $('#notShipping_pincode').show();
    //                 $('#pincode_element').hide();
    //                 $('#Shipping_thisPincode').hide();
    //                 $('.pincodeDetails').show();
    //                 $('.tooltiptext').show();
    //                 $('#userPincode').text(delivery_pincode);
    //             }else{
    //                 $('#validPincode').hide();
    //                 const responseData = await response.json();
    //                 $('#Shipping_thisPincode').show();
    //                 $('#pincode_element').hide();
    //                 $('.pincodeDetails').show();
    //                 $('.tooltiptext').show();
    //                 $('#placeName').text(responseData.places[0]['place name']+', '+ responseData.places[0].state)
    //                 $('#userPincode').text(delivery_pincode);
    //             }
    
    //         }catch(error){
    //             console.log(error)
    //         }
    //     }else{
    //         $('#validPincode').show();
    //         $('#validPincode').text('Please enter valid pincode');
    //     }

    // }); 
    // /// change pincode function 
    // document.getElementById('changepincode').addEventListener('click', function(){
    //     // console.log('change function work..!')
    //     $('.pincodeDetails').hide();
    //     $('.tooltiptext').hide();
    //     $('#notShipping_pincode').hide();
    //     $('#Shipping_thisPincode').hide();
    //     $('#pincode_element').show();
    // });  




    