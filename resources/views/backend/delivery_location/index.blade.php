@extends('backend.layouts.app')
@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{translate('All Coupons')}}</h1>
		</div>
        @can('add_coupon')
            <div class="col-md-6 text-md-right">
                <a href="{{ route('admin.delivery_location.create') }}" class="btn btn-circle btn-info">
                    <span>{{translate('Add New Location')}}</span>
                </a>
            </div>
        @endcan
	</div>
</div>

<div class="card">
  <div class="card-header">
      <h5 class="mb-0 h6">{{translate('Coupon Information')}}</h5>
  </div>
  <div class="card-body">
      <table class="table aiz-table p-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th>{{translate('Code')}}</th>
                    <th data-breakpoints="lg">{{translate('Type')}}</th>
                    <th data-breakpoints="lg">{{translate('Start Date')}}</th>
                    <th data-breakpoints="lg">{{translate('End Date')}}</th>
                    <th data-breakpoints="lg">{{translate('Validation Days')}}</th>
                    <th data-breakpoints="lg">{{translate('Status')}}</th>
                    <th width="10%" class="text-right">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    
                </tr> 
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('script')
@endsection
