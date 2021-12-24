@extends('master')
@section('title','Homepage')
@section('content')
	<!-- Home -->
  <div class="container-fluid my-2" id="home">
    <div class="row">
      @foreach($categories as $row)
        @if($row->id == 9)
          <div class="col-12 col-md-6 p-0" id="big">
            <div class="img-div" >
              <img src="{{$row->photo}}">
            </div>
            <div class="content">
                <h4>{{$row->name}}</h4>
                <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore edolore magna aliquapendisse ultrices gravida.</p>
                <a href="{{route('bycategory',$row->id)}}">shop now</a>
              </div>
          </div>
      @endif
      @endforeach
      <div class="col-12 col-md-6">
        <div class="row " id="small">
          @foreach($categories as $row)
          @php $i=0 @endphp
            @if($row->id != 9)
            <div class="col-12 col-md-6 p-0">
              <div class="img-div">
                <img src="{{asset($row->photo)}}">
              </div>
              <div class="content">
                  <h4>{{$row->name}}</h4>
                  @foreach($counts as $count)
                    @if($count->subcategory->category_id == $row->id)
                     @php $i++ @endphp
                    @endif
                  @endforeach
                  <p>{{$i}}<span class="ml-1">Items</span></p>
                  <a href="{{route('bycategory',$row->id)}}">shop now</a>
                </div>
            </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- end -->

  <!-- new product -->
  <div class="container my-5" id="newproduct">
    <div class="title-bar">
      <h4 class="section-title d-inline-block">NEW PRODUCT</h4>
      <div class="float-right d-inline-block">
        <a class="btn mr-2 border-o all">All</a>
        @foreach($subcategories as $row)
        <a class="btn  mr-2 border-0 sub" data-id="s{{$row->id}}">{{$row->name}}</a>
        @endforeach
      </div>

    </div>
    <!-- product card-->
    <div class="row my-4" id="productcard">
	    @foreach($items as $row)
	      <div class="col-12 col-md-3 col-lg-3 s{{$row->subcategory_id}} item">
	        <div class="card text-center border-0 p-2">
	          <div class="card-img-top">
	            <img src="{{$row->photo}}" height="280px" width="250px">
	          </div> 
	          <div class="card-body">
	            <p class="name" style="font-size: 15px;">{{$row->name}}</p>
	            <p class="rating">
	              <i class="icofont-star text-warning"></i>
	              <i class="icofont-star text-warning"></i>
	              <i class="icofont-star text-warning"></i>
	              <i class="icofont-star text-warning"></i>
	            </p>
	            @if($row->discount)
	            <h5 class="text-danger" style="font-size: 16px;">{{number_format($row->discount)}}MMK<s class="ml-2 text-secondary" style="font-size: 13px;">{{number_format($row->price)}}MMK</s></span></h5>
	            @else
	            <h5 class="text-dark" style="font-size: 16px;">{{number_format($row->price)}}<span>MMK</span></h5>
	            @endif
	          </div>
	          <div class="icon-gp">
	            <a href="{{route('detail',$row->id)}}"><i class="icofont-question-circle"></i></a>
	            <a href=""><i class="icofont-heart-alt"></i></a>
	            <a class="atc" data-id="{{$row->id}}" data-name="{{$row->name}}" data-price="{{$row->price}}" data-discount="{{$row->discount}}" data-codeno="{{$row->codeno}}" data-photo="{{$row->photo}}"><i class="icofont-cart-alt"></i></a>
	          </div>
	        </div>
	      </div>
	    @endforeach
    </div>
    <!-- end productcard -->
  </div>
  <!-- end new product -->
  <!-- show -->
  <div class="container-fluid" id="showservice">
      <div class="text-center">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card bg-transparent border-0">
                  <h4 class="">THE CHOICE COLLECTION</h4>
                  <h1>The Project Jacket</h1>
                  <div>
                    <button class="btn">SHOP NOW</button> 
                  </div>
                </div>
            </div>
            <div class="carousel-item">
             <div class="card bg-transparent border-0">
                  <h4 class="">THE CHOICE COLLECTION</h4>
                  <h1>The Project Jacket</h1>
                  <div>
                    <button class="btn">SHOP NOW</button>
                  </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card bg-transparent border-0">
                  <h4 class="">THE CHOICE COLLECTION</h4>
                  <h1>The Project Jacket</h1>
                  <div>
                    <button class="btn">SHOP NOW</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <!-- end show -->

  <!-- all categories -->
  <div class="container my-5" id="allcategory">
    <div class="row">
      <!-- hot trend -->
      <div class="col-12 col-md-4 col-lg-4">
        <h4 class="mb-5 section-title">HOT TREND</h4>
        <div class="row">
          @foreach($its1 as $row)
          <a href="{{route('detail',$row->id)}}" style="display: inline-block;text-decoration: none;">
            <div class="col-12 mb-3">
              <div class="d-flex">
                <div class="img-file mr-2">
                  <img src="{{$row->photo}}" width="100px" height="100px">
                </div>
                <div class="content">
                  <p class="card-text text-dark">{{$row->name}}</p>
                  <p class="rating">
                    <i class="icofont-star text-warning"></i>
                    <i class="icofont-star text-warning"></i>
                    <i class="icofont-star text-warning"></i>
                    <i class="icofont-star text-warning"></i>
                  </p>
                  <h6 class="text-dark"><span>{{$row->price}}</span>MMK</h6>
                </div>
              </div>
            </div>
          </a>
          @endforeach
      </div>
    </div>
      <!-- end hot trend -->
      <!-- bestseller -->
      <div class="col-12 col-md-4 col-lg-4">
        <h4 class="mb-5 section-title">BEST SELLER</h4>
        <div class="row">
          @foreach($its2 as $row)
          <div class="col-12 mb-3">
            <a href="{{route('detail',$row->id)}}" style="display: inline-block;text-decoration: none;">
            <div class="d-flex">
              <div class="img-file mr-2">
                <img src="{{$row->photo}}" width="100px" height="100px">
              </div>
              <div class="content">
                <p class="card-text text-dark">{{$row->name}}</p>
                <p class="rating">
                  <i class="icofont-star text-warning"></i>
                  <i class="icofont-star text-warning"></i>
                  <i class="icofont-star text-warning"></i>
                  <i class="icofont-star text-warning"></i>
                </p>
                <h6 class="text-dark"><span>{{$row->price}}</span>MMK</h6>
              </div>
            </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
      <!-- end -->
      <!-- feature -->
      <div class="col-12 col-md-4 col-lg-4">
        <h4 class="mb-5 section-title">FEATURE</h4>
        <div class="row">
          @foreach($its1 as $row)
          <a href="{{route('detail',$row->id)}}" style="display: inline-block;text-decoration: none;">
            <div class="col-12 mb-3">
              <div class="d-flex">
                <div class="img-file mr-2">
                  <img src="{{$row->photo}}" width="100px" height="100px">
                </div>
                <div class="content">
                  <p class="card-text text-dark">{{$row->name}}</p>
                  <p class="rating">
                    <i class="icofont-star text-warning"></i>
                    <i class="icofont-star text-warning"></i>
                    <i class="icofont-star text-warning"></i>
                    <i class="icofont-star text-warning"></i>
                  </p>
                  <h6 class="text-dark"><span>{{$row->price}}</span>MMK</h6>
                </div>
              </div>
            </div>
          </a>
          @endforeach
        </div>
      </div>
      <!-- end -->
    </div>
  </div>
  <!-- discount -->
  <div class="container my-5" id="discount">
    <!-- discount -->
    <div class="row">
      <div class="col-12 col-md-6 p-0">
        <img src="{{asset('frontend_assests/img/cover.jpg')}}" class="img-fluid">
      </div>
      <div class="col-12 col-md-6 p-0" style="background-color: #f4f4f4;">
        <div class="text-center mt-5">
          <div class="content">
            <span>Discount</span>
            <h2>Summer 2020</h2>
            <h5><span>SALE</span>50%</h5>
          </div>
          <div class="mt-5">
            <a href="" class="hello">SHOP NOW</a>
          </div>
        </div>
      </div>
    </div>
    <!-- end -->
    <!-- support -->
    <div class="row my-5" id="support">
      <div class="col-12 col-md-3">
        <div class="d-flex">
          <div class="mr-3" style="justify-content: center;align-items: center;display: flex;">
            <i class="icofont-car-alt-1 text-danger" style="font-size: 50px;"></i>
          </div>
          <div class="">
            <h4>Free Shipping</h4>
            <span class="text-secondary">For All Order Over $99</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="d-flex">
          <div class="mr-3" style="justify-content: center;align-items: center;display: flex;">
            <i class="icofont-money text-danger" style="font-size: 50px;"></i>
          </div>
          <div class="">
            <h4>Money Back Grarnatee</h4>
            <span class="text-secondary">If good have Problem</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="d-flex">
          <div class="mr-3" style="justify-content: center;align-items: center;display: flex;">
            <i class="icofont-live-support text-danger" style="font-size: 50px;"></i>
          </div>
          <div class="">
            <h4>Online Support</h4>
            <span class="text-secondary">Deticated support</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-3">
        <div class="d-flex">
          <div class="mr-3" style="justify-content: center;align-items: center;display: flex;">
            <i class="icofont-ssl-security text-danger" style="font-size: 50px;"></i>
          </div>
          <div class="">
            <h4>Payment Security</h4>
            <span class="text-secondary">100% security payment</span>
          </div>
        </div>
      </div>
    </div>
    <!-- support -->
  </div>
  <!-- end -->
  <!-- end all categories -->
  <!-- subcategory -->
  <div class="container-fluid" id="subcategory" style="margin-top:80px auto;">
    <div class="row">
    @foreach($brands as $row)
      <div class="col-12 col-md-2 p-0">
        <img src="{{$row->photo}}" class="img-fluid">
        <div class="content text-center">
          <div class="data">
            <div>
              {{-- <i class="icofont-instagram"></i><br> --}}
              <a href="{{route('branditem',$row->id)}}" style="display: inline-block;text-decoration: none;">{{$row->name}}</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <!-- end subcategory -->

@endsection
@section('script')
  <script type="text/javascript">
      $(document).ready(function (argument) {
        $('.sub').click(function(){
          let id = $(this).data('id');
          // console.log(id);
          let classname = "."+id;
          $('.item').hide(500);
          $(classname).show(500);
        });
        $('.all').click(function(){
          $('.item').show(500);
        })
      })
  </script>
@endsection