@extends('backend_master')

@section('content')
<main class="app-content">
	<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Create</h1>
          <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
   </div>
   <div class="container">
     <div class="row">
       <div class="col-12 col-md-10 offset-md-1 bg-light p-4">
          <h2>Create Form</h2>
         <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
          @csrf
           <div class="form-group">
             <label for="name">Name</label>
             <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
             @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
           </div>
           <div class="form-group">
             <label for="photo">Photo</label>
             <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror" id="photo">
             @error('photo')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
           </div>
           <div class="form-group">
             <button type="submit" class="btn btn-success">Save</button>
           </div>
         </form>
       </div>
     </div>
   </div>


</main>



@endsection