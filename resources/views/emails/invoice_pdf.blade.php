
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Order confirmation </title>
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;" />

<style type="text/css">
 .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
    
 .table-bordered {
    border: 1px solid #ddd;
}   
    
 .table thead > tr > td, .table tbody > tr > td {
    vertical-align: middle;
}   
 .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
    border: 1px solid #ddd;
} 
    
 table {
    border-spacing: 0;
    border-collapse: collapse;
}   

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}    
 address {
    margin-bottom: 20px;
    font-style: normal;
    line-height: 1.42857143;
}   
    
b, strong {
    font-weight: bold;
} 
    
.table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child > td {
    border-top: 0;
} 
.text-right {
    text-align: right;
}      
</style> 
    <h1>Invoice {{$order->order_id}}</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td colspan="2">Order Details</td>
        </tr>
      </thead>
      <tbody>
  
        <tr>
          <td style="width: 50%;">
            <img src="{{$imageSrc}}" width="80%" alt="{{ env('APP_NAME') }}" border="0" /> <br> 
            H.NO. 1862/6 PANA MAMURPUR DELHI</address>
            <b>Telephone</b> +91-7982742869<br>
            <b>E-Mail:</b> winningkartglobal@gmail.com<br>
            <b>Web Site:</b><a href="https://winningkart.com/"> https://winningkart.com/</a></td>
          <td style="width: 50%;"><b>Date Added:</b> {{\Carbon\Carbon::parse($order->created_at)->format('M d, Y')}}<br>
          <b>Order Code:</b> {{$order->code}}<br>
          <b>Payment Method:</b>
          @if($order->payment_type == "cash_on_delivery")
          Cash On Delivery
          @elseif($order->payment_type == "razorpay")
          Online
          @else
          Not Available
          @endif 
          <br>
        </td>
        </tr>
      </tbody>
    </table>
       @php
			$shipping_address = json_decode($order->shipping_address);
		@endphp

    <table class="table table-bordered">
      <thead>
        <tr>
          <td style="width: 50%;"><b>{{ translate('Bill to') }}</b></td> 
        </tr>
      </thead>
      <tbody> 
			<tr><td class="strong">{{ $shipping_address->name }}</td></tr>
			<tr><td class="gry-color small">{{ $shipping_address->address }}</td></tr>
			<tr><td class="gry-color small">{{ translate('Email') }}: {{ $shipping_address->email }}</td></tr>
			<tr><td class="gry-color small">{{ translate('Phone') }}: {{ $shipping_address->phone }}</td></tr>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
     	<thead>
	                <tr class="gry-color" style="background: #eceff4;">
	                    <th width="35%">{{ translate('Product Name') }}</th> 
	                    <th width="10%">{{ translate('Qty') }}</th>
	                    <th width="15%">{{ translate('Unit Price') }}</th>
	                    <th width="10%">{{ translate('Tax') }}</th>
	                    <th width="15%" class="text-right">{{ translate('Total') }}</th>
	                </tr>
				</thead>
      	<tbody class="strong">
	                @foreach ($order->orderDetails as $key => $orderDetail)
		                @if ($orderDetail->product != null)
							<tr class="">
								<td>{{ $orderDetail->product->getTranslation('name') }} @if($orderDetail->variation != null) ({{ $orderDetail->variation }}) @endif</td>
								<td class="gry-color">{{ $orderDetail->quantity }}</td>
								<td class="gry-color currency">Rs. {{ $orderDetail->price/$orderDetail->quantity }}</td>
								<td class="gry-color currency">Rs. {{ $orderDetail->tax/$orderDetail->quantity }}</td>
			                    <td class="text-right currency">Rs. {{ $orderDetail->price+$orderDetail->tax }}</td>
							</tr>
		                @endif
					@endforeach
	            </tbody>
    </table>
   <script> 
        window.onload = function() {
            window.print();
        }
    </script>  