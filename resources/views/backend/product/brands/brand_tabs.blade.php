@extends('backend.layouts.app')
@section('content')

 
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
		<h1 class="h3">View All Brands</h1>
	</div>
</div>

<div class="card">
    <div class="card-header row gutters-5"> 
        <div class="col-md-8">
            <form  action="">
                <div class="input-group input-group-sm wdform d-flex gap-2 flex-wrap" >
                    <input type="text" class="form-control" placeholder="Type Name">
                    <input type="number" class="form-control" placeholder="Type Order Number">
                    <button type="submit" class="btn  btn-info text-white btn-sm">Add</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="card-body">
        <table class="table aiz-table mb-0 footable footable-1 breakpoint-xl" >
                <thead>
                <tr class="footable-header">     
                        <th class="footable-first-visible" style="display: table-cell;">#</th>
                        <th style="display: table-cell;">Name</th> 
                        <th class="footable-last-visible">Order Number</th>
                        <th>Action</th>
                </tr>
                </thead>
                <tbody> 	                    
                    <tr>    
                        <td class="footable-first-visible" style="display: table-cell;">1</td>
                        <td style="">Decor</td> 
                        <td>054</td> 
                        <td> 
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input  type="checkbox" checked="">
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr> 
                </tbody>
            </table>
    </div>
</div>

@endsection
