@extends('master')
@section('content')
<div class="container">
	<div class="bg-info py-4 my-3">
		<h1 class="text-light text-center">{{$cname->name}}</h1>
	</div>
  <div class="text-right">
      <a href="{{route('homepage')}}" class="btn btn-info"><i class="icofont-long-arrow-left"></i>continue shopping</a>
  </div>
  <div class="row my-5" id="productcard">
    @foreach($items as $row)
        <div class="col-12 col-md-3 col-lg-3">
          <div class="card text-center border-0 p-2">
            <div class="card-img-top">
              <img src="{{$row->photo}}" height="280px" width="250px">
            </div> 
            <div class="card-body">
              <p class="name">{{$row->name}}</p>
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
