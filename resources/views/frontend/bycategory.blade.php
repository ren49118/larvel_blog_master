@extends('master')
@section('content')
<div class="container">
	<div class="bg-info py-4 my-3">
		<h1 class="text-light text-center">{{$category->name}}</h1>
	</div>
  <div class="text-right">
      <a href="{{route('homepage')}}" class="btn btn-info"><i class="icofont-long-arrow-left"></i>continue shopping</a>
  </div>
  <div class="row my-5" id="productcard">
    @foreach($category->items as $item)
        <x-item-card-component :item="$item"></x-item-card-component>
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
