@extends('backend_master')
@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Items</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Items</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h2 class="d-inline-block">Items List</h2>
            <a href="{{route('items.create')}}" class="btn btn-primary float-right">Add New</a>
            <div class="table-responsive mt-3">
              <table class="table table-hover table-bordered mt-3" id="sampleTable">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Codeno</th> 
                    <th scope="col">Price</th>
                    <th scope="col">Brand</th>
                    {{-- <th scope="col">Description</th> --}}
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i= 1; @endphp
                  @foreach($items as $row)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>
                      <div class="d-flex">
                        <div class="mr-2">
                          <img src="{{$row->photo}}" width="50px" height="50px">
                        </div>
                        <div>
                            <p>{{$row->name}}</p>
                            <span>{{$row->subcategory->name}}</span>
                        </div>
                      </div>
                    </td>
                    <td>{{$row->codeno}}</td>
                    <td>
                      @if($row->discount>0)
                          <span class="text-danger"><s>{{ number_format($row->price, 2) }}MMK</s></span>
                          <span>{{ number_format($row->discount) }}MMK</span>
                      @else
                          <span>{{ number_format($row->price, 2) }}MMK</span>
                      @endif
                    </td>
                    <td>
                      {{$row->brand->name}}
                    </td>
                    {{-- <td>{!!$row->description!!}</td> --}}
                    <td>
                      <a href="{{route('items.edit',$row->id)}}" class="btn btn-warning text-light">Edit</a>
                        <a href="{{route('items.show',$row->id)}}" class="btn btn-info">Detail</a>
                      <div class="d-inline-block">
                          <form method="POST" action="{{route('items.destroy',$row->id)}}" onsubmit="return confirm('r u sure')">
                            @csrf
                            @method('DELETE')
                          <input type="submit" name="" value="Delete" class="btn btn-danger" name="btn-delete" >
                        </form>
                      </div>
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