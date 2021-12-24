@extends('backend_master')
@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Subcategories</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Categories</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h2 class="d-inline-block">Subcategories List</h2>
            <a href="{{route('subcategories.create')}}" class="btn btn-primary float-right">Add New</a>
            <div class="table-responsive mt-3">
              <table class="table table-hover table-bordered mt-3" id="sampleTable">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i= 1; @endphp
                  @foreach($subcategories as $row)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$row->name}}</td>
                    <td>{{$row->category->name}}</td>
                    <td>
                      <a href="{{route('subcategories.edit',$row->id)}}" class="btn btn-warning text-light">Edit</a>
                      <div class="d-inline-block">
                          <form method="POST" action="{{route('subcategories.destroy',$row->id)}}" onsubmit="return confirm('r u sure')">
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