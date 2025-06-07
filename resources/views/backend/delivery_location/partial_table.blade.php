<div class="card-body">
  <div class="card-body">@if(count($postcodes) > 0) 
      <table class="table aiz-table p-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pincode</th>
                    <th>Area</th>
                    <th>City</th>
                    <th>District</th>
                    <th>State</th>
                    <th>Status</th>
                    <th width="10%" class="text-right">Action</th>
                </tr>
            </thead>
            <tbody id="postcode_table_body"> 
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
                            <input id="status-toggle" value="{{ $postcode->id }}" data-id="{{ $postcode->id }}" type="checkbox" <?php if ($postcode->status == 1) echo "checked"; ?> >
                            <span class="slider round"></span>
                        </label>
                    </td> 
                    <td>
                        @can('product_edit')
                            @if (Auth::user()->user_type == 'admin')
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('admin.postcode.edit', [$postcode->id]) }}" title="{{ translate('Edit') }}">
                                    <i class="las la-edit"></i>
                                </a>
                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-id="{{ $postcode->id }}" title="{{ translate('Delete') }}">
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