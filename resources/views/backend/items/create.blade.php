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
         <form method="POST" action="{{route('items.store')}}" enctype="multipart/form-data">
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
             <label for="codeno">Code No</label>
             <input type="text" name="codeno" class="form-control @error('name') is-invalid @enderror" id="codeno">
             @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
           </div>
           <div class="row">
             <div class="form-group col-sm-6">
               <label for="price">Price</label>
               <input type="number" name="price" class="form-control @error('photo') is-invalid @enderror" id="price">
               @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
             </div><div class="form-group col-sm-6">
               <label for="discount">Discount</label>
               <input type="number" name="discount" class="form-control @error('photo') is-invalid @enderror" id="discount">
               @error('photo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
             </div>
           </div>
           <div class="row">
             <div class="form-group col-sm-6">
               <label for="brand_id">Brand</label>
               <select class="form-control" name="brand_id">
                 @foreach($brands as $row)
                  <option value="{{$row->id}}">{{$row->name}}</option>
                 @endforeach
               </select>
             </div>
             <div class="form-group col-sm-6">
               <label for="subcategory_id">Subcategory</label>
               <select class="form-control" name="subcategory_id">
                 @foreach($subcategories as $row)
                  <option value="{{$row->id}}">{{$row->name}}</option>
                 @endforeach
               </select>
             </div>
           </div>
           <div class="form-group">
             <label for="description">Description</label>
             <textarea class="form-control testing" id="description" name="description"></textarea>
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
