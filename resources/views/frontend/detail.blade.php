@extends('master')
@section('content')
<div class="container">
	<div class="bg-info py-4 my-3">
		<h1 class="text-light text-center">Item Detail</h1>
	</div>
  <div class="text-right">
      <a href="{{route('homepage')}}" class="btn btn-info"><i class="icofont-long-arrow-left"></i>continue shopping</a>
    </div>
    <div class="row my-4" id="detail">
      <div class="col-12 col-md-6">
        <div class="img-file">
          <img src="{{$item->photo}}" width="400px" height="400px">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div>
          <span class="bname text-secondary" style="font-size: 13px;font-style: italic;">{{$item->subcategory->name}}</span>
          <h2 class="itemname" style="font-size: 40px;font-weight: 700;">{{$item->name}}</h2>
          <p class="info text-info mb-2">{!!$item->description!!}</p>
          <div class="row mt-4">
            <div class="col-4">
              <span class="text-dark" style="font-weight: bold;font-size: 20px;">{{number_format($item->price)}}MMK</span>
            </div>
            <div class="col-4">
              <input type="number" name="" class="qty" value="1" style="padding: 10px; width: 100px;text-align:center; border-color: #EBEDEF;border-radius: 10px;" min="1">
            </div>
            <div class="col-4">
                <button class="atc btn btn-outline-info mt-1" data-id="{{$item->id}}" data-name="{{$item->name}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-codeno="{{$item->codeno}}" data-photo="{{$item->photo}}"><i class="icofont-shopping-cart mr-2"></i>Add to Cart</button>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-4">
              <span style="font-size: 20px; font-weight: 500;line-height: 30px;">Brand</span>
            </div>
            <div class="col-4 pt-1">
              <a href="{{route('branditem',$item->brand_id)}}" style="display: inline;color: #111;">{{$item->brand->name}}</a>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-4">
              <span style="font-size: 20px; font-weight: 500;line-height: 30px;">Codeno</span>
            </div>
            <div class="col-4 pt-1">
                <span>{{$item->codeno}}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- show -->
  {{-- <div class="container-fluid" id="showservice">
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
  </div> --}}
  <!-- end show -->
  <!-- all categories -->
  {{-- <div class="container my-5" id="allcategory">
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
  </div> --}}
  <!-- discount -->
  <div class="container" id="discount" style="margin-top: 100px; margin-bottom: 100px;">
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
  {{-- carousel --}}
  <div class="container text-left my-3" id="related">
    <h2 class="font-weight-light my-4 ml-3">Related Item</h2>
    <div class="row mx-auto my-auto">
        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
            <div class="carousel-inner w-100" role="listbox">
              <div class="carousel-item active">
                  <div class="col-md-4">
                      <div class="card card-body">
                          <img src="{{$item->photo}}" class="img-fluid">
                      </div>
                  </div>
              </div>
              @foreach($items as $row)
                @if($row->subcategory_id == $item->subcategory_id)
                <div class="carousel-item">
                    <div class="col-md-4">
                        <div class="card card-body">
                          <a href="{{route('detail',$row->id)}}">
                            <img class="img-fluid" src="{{$row->photo}}">
                          </a>
                        </div>
                    </div>
                </div>
                @endif()
              @endforeach
            </div>
            <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
@endsection
@section('style')
<style type="text/css">
  #detail p{
    font-size: 20px !important;
    color: #111111;
  }
  /*carousel*/
  @media (max-width: 768px) {
    .carousel-inner .carousel-item > div {
        display: none;
    }
    .carousel-inner .carousel-item > div:first-child {
        display: block;
    }
  }

  .carousel-inner .carousel-item.active,
  .carousel-inner .carousel-item-next,
  .carousel-inner .carousel-item-prev {
      display: flex;
  }

  /* display 3 */
  @media (min-width: 768px) {
      
      .carousel-inner .carousel-item-right.active,
      .carousel-inner .carousel-item-next {
        transform: translateX(33.333%);
      }
      
      .carousel-inner .carousel-item-left.active, 
      .carousel-inner .carousel-item-prev {
        transform: translateX(-33.333%);
      }
  }

  .carousel-inner .carousel-item-right,
  .carousel-inner .carousel-item-left{ 
    transform: translateX(0);
  }
  #related h2{
    color: #111111;
    font-weight: 600;
    text-transform: uppercase;
    position: relative;
    display: inline-block;
  }
  #related h2:after{
    position: absolute;
    left: 0;
    bottom: -4px;
    height: 2px;
    width: 70px;
    background: #ca1515;
    content: "";  
  }
</style>
@endsection
@section('script')
<script type="text/javascript">
  $('#recipeCarousel').carousel({
  interval: 10000
})

$('.carousel .carousel-item').each(function(){
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
          next = $(this).siblings(':first');
        }
        
        next.children(':first-child').clone().appendTo($(this));
      }
});

</script>
@endsection
