<form class="form-default" role="form" action="{{ route('update_add_from_profile', $address_data->id) }}" method="POST">
    @csrf
    <div class="p-3">
        <div class="row">
           <div class="col-md-3">
                <label> Pincode</label>
            </div>
            <div class="col-md-9">
                <input type="number" class="form-control mb-3 rounded-0 number_input postalcode" 
                 placeholder="Pincode"  required id="postalcode_edit" name="postal_code" value="{{ $address_data->postal_code }}">
                 <p class="errorSixdigit text-danger" id="errorSixdigit"></p>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-3">
                <label> Area</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="area" class="form-control mb-3 rounded-0 number_input" placeholder="Area"  id="edit_area" required value="{{ $address_data->area }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label> State</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="state" class="form-control mb-3 rounded-0 number_input" placeholder="State" id="edit_state" required value="{{ $address_data->state }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label>House/Flat/office No</label>
            </div>
            <div class="col-md-9">
                <input class="form-control mb-3 rounded-0" name="house_number" placeholder="House/Flat/office No" rows="2"  required value="{{ $address_data->house_number }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Road Name/ Area/ Colony</label>
            </div>
            <div class="col-md-9">
                <textarea class="form-control mb-3 rounded-0" name="address" placeholder="Road Name/ Area/ Colony" rows="2">{{ $address_data->address }}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label>Name</label>
            </div>
            <div class="col-md-9">
                <input class="form-control mb-3 rounded-0" placeholder="Name" rows="2" name="name" required value="{{ $address_data->name }}"></input>
            </div>
        </div>
         <div class="row">
            <div class="col-md-3">
                <label> Phone</label>
            </div>
            <div class="col-md-9">
                <input type="number" class="form-control mb-3 rounded-0 number_input" placeholder="Number" name="phone" required id="edit_number" value="{{ $address_data->phone }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label> Email</label>
            </div>
            <div class="col-md-9">
                <input type="email" class="form-control mb-3 rounded-0 number_input" placeholder="Email" name="email"    required value="{{ $address_data->email }}">
            </div>
        </div>



        <!-- Address -->
        <!-- <div class="row">
            <div class="col-md-2">
                <label>{{ translate('Address')}}</label>
            </div>
            <div class="col-md-10">
                <textarea class="form-control mb-3 rounded-0" placeholder="{{ translate('Your Address')}}" rows="2" name="address" required>{{ $address_data->address }}</textarea>
            </div>
        </div> -->

        <!-- Country -->
        <!-- <div class="row">
            <div class="col-md-2">
                <label>{{ translate('Country')}}</label>
            </div>
            <div class="col-md-10">
                <div class="mb-3">
                    <select class="form-control aiz-selectpicker rounded-0" data-live-search="true" data-placeholder="{{ translate('Select your country')}}" name="country_id" id="edit_country" required>
                        <option value="">{{ translate('Select your country') }}</option>
                        @foreach (get_active_countries() as $key => $country)
                        <option value="{{ $country->id }}" @if($address_data->country_id == $country->id) selected @endif>
                            {{ $country->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div> -->

        <!-- State -->
        <!-- <div class="row">
            <div class="col-md-2">
                <label>{{ translate('State')}}</label>
            </div>
            <div class="col-md-10">
                <select class="form-control mb-3 aiz-selectpicker rounded-0" name="state_id" id="edit_state"  data-live-search="true" required>
                    @foreach ($states as $key => $state)
                        <option value="{{ $state->id }}" @if($address_data->state_id == $state->id) selected @endif>
                            {{ $state->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div> -->

        <!-- City -->
        <!-- <div class="row">
            <div class="col-md-2">
                <label>{{ translate('City')}}</label>
            </div>
            <div class="col-md-10">
                <select class="form-control mb-3 aiz-selectpicker rounded-0" data-live-search="true" name="city_id" required>
                    @foreach ($cities as $key => $city)
                        <option value="{{ $city->id }}" @if($address_data->city_id == $city->id) selected @endif>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div> -->
        
        @if (get_setting('google_map') == 1)
            <!-- Google Map -->
            <!-- <div class="row mt-3 mb-3">
                <input id="edit_searchInput" class="controls" type="text" placeholder="Enter a location">
                <div id="edit_map"></div>
                <ul id="geoData">
                    <li style="display: none;">Full Address: <span id="location"></span></li>
                    <li style="display: none;">Postal Code: <span id="postal_code"></span></li>
                    <li style="display: none;">Country: <span id="country"></span></li>
                    <li style="display: none;">Latitude: <span id="lat"></span></li>
                    <li style="display: none;">Longitude: <span id="lon"></span></li>
                </ul>
            </div> -->
            <!-- Longitude -->
            <!-- <div class="row">
                <div class="col-md-2" id="">
                    <label for="exampleInputuname">{{ translate('Longitude')}}</label>
                </div>
                <div class="col-md-10" id="">
                    <input type="text" class="form-control mb-3 rounded-0" id="edit_longitude" name="longitude" value="{{ $address_data->longitude }}" readonly="">
                </div>
            </div> -->
            <!-- Latitude -->
            <!-- <div class="row">
                <div class="col-md-2" id="">
                    <label for="exampleInputuname">{{ translate('Latitude')}}</label>
                </div>
                <div class="col-md-10" id="">
                    <input type="text" class="form-control mb-3 rounded-0" id="edit_latitude" name="latitude" value="{{ $address_data->latitude }}" readonly="">
                </div>
            </div> -->
        @endif

        <!-- Postal code -->
        <!-- <div class="row">
            <div class="col-md-2">
                <label>{{ translate('Postal code')}}</label>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control mb-3 rounded-0" placeholder="{{ translate('Your Postal Code')}}" value="{{ $address_data->postal_code }}" name="postal_code" value="" required>
            </div>
        </div>

      
        <div class="row">
            <div class="col-md-2">
                <label>{{ translate('Phone')}}</label>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control mb-3 rounded-0" placeholder="{{ translate('+880')}}" value="{{ $address_data->phone }}" name="phone" value="" required>
            </div>
        </div> -->

        <!-- Save button -->
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary rounded-0 w-150px">{{translate('Save')}}</button>
        </div>
    </div>
</form>

@section('script')

    <script>
        $(document).ready(function () { 
            $("#edit_number").on('input', function(){
                let numberVal = $(this).val();
                numberVal = numberVal.replace(/\D/g, '').slice(0, 10);
                $(this).val(numberVal); 
            })
         });
    </script>

@endsection