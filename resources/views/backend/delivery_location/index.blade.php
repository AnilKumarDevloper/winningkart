@extends('backend.layouts.app')
@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-3">
			<h1 class="h3">{{translate('Delivery Postcode')}}</h1>
		</div>
       @if (Auth::user()->user_type == 'admin')
            <div class="col-md-9 text-md-right">
                <a href="javascript:void(0)" class="btn btn-circle btn-success enable_all_postcode">
                    <span>{{translate('Enable All')}}</span>
                </a>
                <a href="javascript:void(0)" class="btn btn-circle btn-danger disable_all_postcode">
                    <span>{{translate('Disable All')}}</span>
                </a>
                <a href="{{ route('admin.postcode.create') }}" class="btn btn-circle btn-info">
                    <span>{{translate('Add New')}}</span>
                </a>
            </div>
        @endif
	</div>
</div>
<div class="card">
  <div class="card-header">
      <h5 class="mb-0 h6">Postcode Information</h5>
      <div class="search-box d-flex">
        <form action="" method="GET">
        <input type="text" class="form-control aiz-selectpicker search_field" placeholder="Enter Postcode" width="100px;">
        <input type="submit" id="search_btn" class="btn btn-success mx-1" value="Search">
        </form>
    </div>
  </div>
  <div id="table_content">
  @include('backend.delivery_location.partial_table', $postcodes)
  </div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    $(document).on("click", "#search_btn", function(e){
        e.preventDefault();
        let search_value = $('.search_field').val();
         let url = "{{ route('admin.postcode') }}/?search_value="+search_value; 
        let csrf_token = $('meta[name="csrf-token"]').attr('content');
           fetch(`${url}`, {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
                }
            })
        .then(response => response.json())
        .then(responseData => { 
            $('#table_content').html(responseData.postcode_table); 
            $('.aiz-table').css('opacity', '1');

        })
        .catch(error => console.error('Fetch error:', error)); 
    });

    $(document).on("click", ".confirm-delete", function(){
        let id = $(this).data('id');
        let url = "{{ route('admin.postcode.destroy') }}";
        let csrf_token = $('meta[name="csrf-token"]').attr('content');
        Swal.fire({
            title: "Are you sure?", 
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if(result.isConfirmed){
                fetch(url, {
                    method:'POST',
                    headers:{
                        "Content-Type":"application/json",
                        "X-CSRF-TOKEN":csrf_token
                    },
                    body:JSON.stringify({id:id}),
                }).then(response => response.json())
                .then(responseData => {
                    if(responseData.status == "success"){
                        $(this).closest('tr').remove();
                        Swal.fire({
                            title: "Success",
                            text: "Postcode has been deleted successfully!",
                            icon: "success"
                        });
                    }else{
                        Swal.fire({
                            title: "Warning",
                            text: "Something went wrong please try again!",
                            icon: "warning"
                        });
                    }
                }).catch(error => console.error("Error:", error));
            }
        });
    });

    $(document).on("change", "#status-toggle", function(){
        let id = $(this).data('id');
        let url = "{{ route('admin.postcode.change_status') }}";
        let csrf_token = $('meta[name="csrf-token"]').attr('content');
        let status = $(this).is(':checked') ? 1 : 0;
        let isChecked = $(this).is(":checked");
        Swal.fire({
            title: "Are you sure?",
            text: "You want to change status ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, change it!"
            }).then((result) => {
            if(result.isConfirmed){
                fetch(url, {
                    method:"POST",
                    headers:{
                        "Content-Type":"application/json",
                        "X-CSRF-TOKEN":csrf_token
                    },
                    body:JSON.stringify({id:id, status:status})
                }).then(response => response.json())
                .then(responseData => {
                   if(responseData.status == "success"){
                        Swal.fire({
                            title: "Success",
                            text: "Postcode status has been changed successfully!",
                            icon: "success"
                        });
                    }else{
                        Swal.fire({
                            title: "Warning",
                            text: "Something went wrong please try again!",
                            icon: "warning"
                        });
                         $(this).prop('checked', !isChecked);
                    }
                }).catch(error => {
                    console.error("Error:", error);
                    Swal.fire({
                                title: "Warning",
                                text: "Something went wrong please try again!",
                                icon: "warning"
                            });
                    $(this).prop('checked', !isChecked);
                });
            }else if(result.isDismissed){  
                $(this).prop('checked', !isChecked);
            }
        }); 
    });
</script>
@endsection
