@extends('backend.layouts.app')

@section('content')

    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Add Delivery Location')}}</h5>
            </div>
            <div class="card-body">
              <form class="form-horizontal" action="{{ route('admin.delivery_location.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group row">
                    <label class="col-lg-3 col-from-label" for="name">{{translate('Pincode')}}</label>
                    <div class="col-lg-9">
                        <input type="text" id="coupon_type" class="form-control aiz-selectpicker" required placeholder="Pincode">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-from-label" for="name">{{translate('Area')}}</label>
                    <div class="col-lg-9">
                        <input type="text" id="coupon_type" class="form-control aiz-selectpicker" required placeholder="Area">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-from-label" for="name">{{translate('City')}}</label>
                    <div class="col-lg-9">
                        <input type="text" id="coupon_type" class="form-control aiz-selectpicker" required placeholder="City">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-from-label" for="name">{{translate('State')}}</label>
                    <div class="col-lg-9">
                        <input type="text" id="coupon_type" class="form-control aiz-selectpicker" required placeholder="State">
                    </div>
                </div>

                
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
     
@endsection
