<!-- New Address Modal -->
<div class="modal fade" id="new-address-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ translate('New Address') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-default" role="form" action="{{ route('add_new_address') }}" method="POST">
             @csrf
                <div class="modal-body c-scrollbar-light">
                    <div class="p-3"> 
                        <div class="row">
                            <div class="col-md-3">
                                <label> Pincode</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control mb-3 rounded-0 number_input postalcode" 
                                  placeholder="Pincode"  required id="postalcode" name="postal_code">
                                 <p class="errorSixdigit text-danger" id="errorSixdigit"></p>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-3">
                                <label> Area</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="area" class="form-control mb-3 rounded-0 number_input" placeholder="Area"   id="area" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label> State</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="state" class="form-control mb-3 rounded-0 number_input" placeholder="State" id="state" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>House/Flat/office No</label>
                            </div>
                            <div class="col-md-9">
                                <input class="form-control mb-3 rounded-0" name="house_number" placeholder="House/Flat/office No" rows="2"  required></input>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Road Name/ Area/ Colony</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control mb-3 rounded-0" name="address" placeholder="Road Name/ Area/ Colony" rows="2"  required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Name</label>
                            </div>
                            <div class="col-md-9">
                                <input class="form-control mb-3 rounded-0" placeholder="Name" rows="2" name="name" required></input>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-3">
                                <label> Phone</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control mb-3 rounded-0 number_input" placeholder="Number" name="phone" required id="number">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label> Email</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" class="form-control mb-3 rounded-0 number_input" placeholder="Email" name="email" value="" required>
                            </div>
                        </div>

                         <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary rounded-0 w-150px">Save</button>
                        </div>
                        
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Address Modal -->
<div class="modal fade" id="edit-address-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ translate('Edit Address') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body c-scrollbar-light" id="edit_modal_body">

            </div>
        </div>
    </div>
</div>





@section('script')
    <script type="text/javascript">
        function add_new_address(){
            $('#new-address-modal').modal('show');
        }

        function edit_address(address) {
            console.log(address);
            var url = '{{ route("addresses.edit", ":id") }}';
            url = url.replace(':id', address);
            console.log(url);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: 'GET',
                success: function (response) {
                    $('#edit_modal_body').html(response.html);
                    $('#edit-address-modal').modal('show');
                    AIZ.plugins.bootstrapSelect('refresh'); 
                    @if (get_setting('google_map') == 1)
                        var lat     = -33.8688;
                        var long    = 151.2195;

                        if(response.data.address_data.latitude && response.data.address_data.longitude) {
                            lat     = parseFloat(response.data.address_data.latitude);
                            long    = parseFloat(response.data.address_data.longitude);
                        }

                        initialize(lat, long, 'edit_');
                    @endif
                }
            });
        }
        
        $(document).on('change', '[name=country_id]', function() {
            var country_id = $(this).val();
            get_states(country_id);
        });

        $(document).on('change', '[name=state_id]', function() {
            var state_id = $(this).val();
            get_city(state_id);
        });
        
        function get_states(country_id) {
            $('[name="state"]').html("");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('get-state')}}",
                type: 'POST',
                data: {
                    country_id  : country_id
                },
                success: function (response) {
                    var obj = JSON.parse(response);
                    if(obj != '') {
                        $('[name="state_id"]').html(obj);
                        AIZ.plugins.bootstrapSelect('refresh');
                    }
                }
            });
        }

        function get_city(state_id) {
            $('[name="city"]').html("");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('get-city')}}",
                type: 'POST',
                data: {
                    state_id: state_id
                },
                success: function (response) {
                    var obj = JSON.parse(response);
                    if(obj != '') {
                        $('[name="city_id"]').html(obj);
                        AIZ.plugins.bootstrapSelect('refresh');
                    }
                }
            });
        }  
    </script>

    <script>
        $(document).ready(function () { 
            $("#number").on('input', function(){
                let numberVal = $(this).val();
                numberVal = numberVal.replace(/\D/g, '').slice(0, 10);
                $(this).val(numberVal); 
            })
         });
    </script>

     


    <script>
        $(document).on("change", "#postalcode_edit", async function(){

           // console.log("testing")
           let postalcode = document.getElementById('postalcode_edit').value; 
           console.log(postalcode)
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
                    //$('#postalArea').hide();
                }else{
                    $('#errorSixdigit').hide();
                    let data = await response.json();
                    let myplaces = data.places;
                
                    $('#edit_area').val(myplaces[0]['place name']);
                    $('#edit_state').val(myplaces[0].state);
                  //  $('#postalArea').show();
                } 
            }catch(error){
                console.log(error);
            }
        });

       
</script>

    @if (get_setting('google_map') == 1)
        @include('frontend.'.get_setting('homepage_select').'.partials.google_map')
    @endif
@endsection