@extends('backend.layouts.app')

@section('content')

    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Edit Delivery Location')}}</h5>
            </div>
            <div class="card-body">
              <form class="form-horizontal" action="{{ route('admin.postcode.update', [$postcode->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group row">
                    <label class="col-lg-3 col-from-label" for="name">{{translate('Pincode')}}</label>
                    <div class="col-lg-9">
                        <input type="text" value="{{ $postcode->pincode ?? '' }}" id="pincode" class="form-control aiz-selectpicker" name="pincode" required placeholder="Pincode">
                        @error('pincode')
                        <p style="color:red;"><b>{{ $message }}</b></p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-from-label" for="name">{{translate('Area')}}</label>
                    <div class="col-lg-9">
                        <input type="text" id="area_name" value="{{ $postcode->area_name ?? '' }}" class="form-control aiz-selectpicker" name="area_name" required placeholder="Area">
                        @error('area_name')
                        <p style="color:red;"><b>{{ $message }}</b></p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-from-label" for="name">{{translate('City')}}</label>
                    <div class="col-lg-9">
                        <input type="text" id="city" value="{{ $postcode->city ?? '' }}" class="form-control aiz-selectpicker" name="city" required placeholder="City">
                        @error('city')
                        <p style="color:red;"><b>{{ $message }}</b></p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-from-label" for="name">{{translate('District')}}</label>
                    <div class="col-lg-9">
                        <input type="text" id="district" value="{{ $postcode->district ?? '' }}" class="form-control aiz-selectpicker" name="district" required placeholder="District">
                        @error('district')
                        <p style="color:red;"><b>{{ $message }}</b></p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-from-label" for="name">{{translate('State')}}</label>
                    <div class="col-lg-9">
                        <input type="text" id="state" value="{{ $postcode->state ?? '' }}" class="form-control aiz-selectpicker" name="state" required placeholder="State">
                        @error('state')
                        <p style="color:red;"><b>{{ $message }}</b></p>
                        @enderror
                    </div>
                </div>

                
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-primary">{{translate('Update')}}</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
     
@endsection
