@extends('backend.layouts.app')
@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{translate('Delivery Postcode')}}</h1>
		</div>
        @can('add_postcode')
            <div class="col-md-6 text-md-right">
                <a href="{{ route('admin.postcode.create') }}" class="btn btn-circle btn-info">
                    <span>{{translate('Add New Postcode')}}</span>
                </a>
            </div>
        @endcan
	</div>
</div> 
<div class="card">
  <div class="card-header">
      <h5 class="mb-0 h6">Postcode Information</h5>
  </div>
  <div class="card-body">
  <div class="card-body">@if(count($postcodes) > 0) 
      <table class="table aiz-table p-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th>Pincode</th>
                    <th data-breakpoints="lg">Area</th>
                    <th data-breakpoints="lg">City</th>
                    <th data-breakpoints="lg">District</th>
                    <th data-breakpoints="lg">State</th>
                    <th data-breakpoints="lg">Status</th>
                    <th width="10%" class="text-right">Action</th>
                </tr>
            </thead>
            <tbody> 
                @php
                $sn = 1;
                @endphp
              @foreach($postcodes as $postcode)
                <tr>
                    <td>{{ $sn++ }}</td>
                    <td>{{ $postcode->pincode }}</td>
                    <td>{{ $postcode->area_name }}</td>
                    <td>{{ $postcode->city }}</td>
                    <td>{{ $postcode->district }}</td>
                    <td>{{ $postcode->state }}</td>
                    <td>
                        <label class="aiz-switch aiz-switch-success mb-0">
                            <input onchange="update_featured(this)" value="{{ $postcode->id }}" type="checkbox" <?php if ($postcode->status == 1) echo "checked"; ?> >
                            <span class="slider round"></span>
                        </label>
                    </td> 
                    <td>
                        @can('product_edit')
                            @if (Auth::user()->user_type == 'admin')
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('admin.postcode.edit', [$postcode->id]) }}" title="{{ translate('Edit') }}">
                                    <i class="las la-edit"></i>
                                </a>
                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href=" " title="{{ translate('Delete') }}">
                                    <i class="las la-trash"></i>
                                </a>
                            @endif
                        @endcan
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        <div>
            {{ $postcodes->links() }}
        </div>
        @endif
    </div>
</div>

@endsection
@section('script')
@endsection
