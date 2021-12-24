@extends('backend_master')

@section('content')
<main class="app-content">
	<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Item Create</h1>
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
          <h2>Item Create Form</h2>
         <form method="POST" action="{{route('items.update',$item->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="oldphoto" value="{{$item->photo}}">
           <div class="form-group">
             <label for="name">Name</label>
             <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$item->name}}">
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
                  <img src="{{$item->photo}}" class="img-fluid">
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <input type="file" name="newphoto" class="form-contorl-file mt-3">
                </div>
              </div>
           </div>
           <div class="form-group">
             <label for="codeno">Code No</label>
             <input type="text" name="codeno" class="form-control @error('name') is-invalid @enderror" id="codeno" value="{{$item->codeno}}" readonly="readonly">
             @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
           </div>
           <div class="row">
             <div class="form-group col-sm-6">
               <label for="price">Price</label>
               <input type="number" name="price" class="form-control @error('photo') is-invalid @enderror" id="price" value="{{$item->price}}">
               @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
             </div><div class="form-group col-sm-6">
               <label for="discount">Discount</label>
               <input type="number" name="discount" class="form-control @error('photo') is-invalid @enderror" id="discount" value="{{$item->discount}}">
               @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
             </div>
           </div>
           <div class="row">
             <div class="form-group col-sm-6">
               <label for="brand_id">Brand</label>
               <select class="form-control" name="brand_id" id="brand_id">
                 @foreach($brands as $row)
                  <option value="{{$row->id}}">{{$row->name}}</option>
                 @endforeach
               </select>
             </div>
             <div class="form-group col-sm-6">
               <label for="subcategory_id">Subcategory</label>
               <select class="form-control" name="subcategory_id" id="subcategory_id">
                 @foreach($subcategories as $row)
                  <option value="{{$row->id}}">{{$row->name}}</option>
                 @endforeach
               </select>
             </div>
           </div>
           <div class="form-group">
             <label for="description">Description</label>
             <textarea class="form-control testing" id="description" name="description">
               {{$item->description}}
             </textarea>
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
@section('script')
<script type="text/javascript">
  $(document).ready(function (argument) {
    $("#subcategory_id option[value={{$item->subcategory->id}}]").prop('selected',true);
    $("#brand_id option[value={{$item->brand->id}}]").prop('selected',true);
  });
</script>
@endsection