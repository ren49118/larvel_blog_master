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
          <h2>Edit Form</h2>
         <form method="POST" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="oldphoto" value="{{$category->photo}}">
           <div class="form-group">
             <label for="name">Name</label>
             <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$category->name}}">
             @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
           </div>
           <div class="form-group">
             <label for="photo">Photo</label>
             <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old Photo</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New Photo</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <img src="{{$category->photo}}" class="img-fluid">
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <input type="file" name="newphoto" class="form-contorl-file mt-3">
                </div>
              </div>
           </div>
           <div class="form-group">
             <button type="submit" class="btn btn-success">Update</button>
           </div>
         </form>
       </div>
     </div>
   </div>
</main>



@endsection