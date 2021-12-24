@extends('backend_master')

@section('content')
<main class="app-content">
	<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Order Detail</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
   </div>
   <div class="container bg-light p-3">
      <div class="text-right">
        <a href="{{route('orders.index')}}" class="btn btn-primary">Back</a>
      </div>
     <div class="row">
        <div class="col-12 col-md-4">
          <div class="mb-3 mt-2" style="font-size: 16px;">
            <table class="table table-borderless">
              <tr>
                <td>Username</td>
                <td>{{$order->user->name}}</td>
              </tr>
              <tr>
                <td>Orderdate</td>
                <td>{{$order->orderdate}}</td>
              </tr>
              <tr>
                <td>Codeno</td>
                <td>{{$order->codeno}}</td>
              </tr>
            </table>
        </div>
        </div>
       <div class="col-12 p-4">
          <table class="table table-bordered">
            <thead>
              <th>#</th>
              <th>Name</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Subtotal</th>
            </thead>
            <tbody>
              @php $i=1;$total=0; @endphp
              @foreach($order->items as $row)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{number_format($row->price)}}MMK</td>
                  <td>{{$row->pivot->qty}}</td>
                  <td>{{number_format($row->price*$row->pivot->qty)}}MMK</td>
                </tr>
                @php  $total +=$row->price*$row->pivot->qty@endphp
              @endforeach
              <td colspan="4" style="font-size: 20px; font-weight: 500;">Total:</td>
              <td>{{number_format($total)}}MMK</td>
            </tbody>
          </table>
       </div>
     </div>
   </div>
</main>
@endsection