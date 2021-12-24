@extends('backend_master')
@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Orders</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Orders</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h2 class="d-inline-block">Orders List</h2>
            <div class="table-responsive mt-3">
              <table class="table table-hover table-bordered mt-3" id="sampleTable">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codeno</th>
                    <th scope="col">Orderdate</th> 
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i= 1; @endphp
                  @foreach($orders as $row)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$row->codeno}}</td>
                    <td>{{$row->orderdate}}</td>
                    <td>{{number_format($row->total)}}MMK</td>
                      <td>
                        @if($row->status == 1)
                          <a class="btn btn-success btn-sm text-light">Pending</a>
                        @else
                          <a class="btn btn-info btn-sm" href="{{route('order.confirm',$row->id)}}" onclick="return confirm('Are U Sure!')">Confirm </a>
                        @endif
                        <a href="{{route('orders.show',$row->id)}}" class="btn btn-primary btn-sm">Detail</a>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('script')
  <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection