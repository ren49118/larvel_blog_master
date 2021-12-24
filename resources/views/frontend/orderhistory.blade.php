@extends('master')
@section('content')
<div class="container my-5">
	<div class="text-right">
		<a href="{{route('homepage')}}" class="btn btn-info text-light"><i class="icofont-prestashop mr-2"></i>Continue Shopping</a>
	</div>
	<div class="bg-info py-4 my-3">
		<h1 class="text-light text-center">My Order History</h1>
	</div>
	<div class="row my-5" id="check">
		<div class="col-12 col-md-12">
			<div class="table">
				<table class="table border">
					<tr>
						<th>No</th>
						<th>CodeNo</th>
						<th>Order Date</th>
						<th>Total</th>
						<th>Status</th>
					</tr>
					<tbody>
						@php $i=1 @endphp
						@foreach($orders as $order)
						 	<tr>
						 		<td>{{$i++}}</td>
						 		<td>{{$order->codeno}}</td>
						 		<td>{{$order->orderdate}}</td>
						 		<td>{{number_format($order->total)}}</td>
						 		<td>
						 			@if($order->status == 0)
						 				<button class="btn btn-info btn-sm">Pending</button>
						 			@else
						 				<button class="btn btn-info btn-sm">Confirm	</button>
						 			@endif
						 		</td>
						 	</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function (argument) {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
		});
		$('.checkout').click(function(event) {
			/* Act on the event */
			let ls = localStorage.getItem('carts');
			let total =JSON.parse(ls).reduce((acc,item)=>acc+(item.price*item.qty),0);
			$.post("{{route('orders.store')}}",{ls:ls,total:total},function(response){
				console.log(response);
				localStorage.clear();

			})
		});
	})
</script>

@endsection
