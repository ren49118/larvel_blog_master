<div class="col-12 col-md-3 col-lg-3">
          <div class="card text-center border-0 p-2">
            <div class="card-img-top">
              <img src="{{$item->photo}}" height="280px" width="250px">
            </div> 
            <div class="card-body">
              <p class="name">{{$item->name}}</p>
              <p class="rating">
                <i class="icofont-star text-warning"></i>
                <i class="icofont-star text-warning"></i>
                <i class="icofont-star text-warning"></i>
                <i class="icofont-star text-warning"></i>
              </p>
              @if($item->discount)
              <h5 class="text-danger" style="font-size: 16px;">{{number_format($item->discount)}}MMK<s class="ml-2 text-secondary" style="font-size: 13px;">{{number_format($item->price)}}MMK</s></span></h5>
              @else
              <h5 class="text-dark" style="font-size: 16px;">{{number_format($item->price)}}<span>MMK</span></h5>
              @endif
            </div>
            <div class="icon-gp">
              <a href="{{route('detail',$item->id)}}"><i class="icofont-question-circle"></i></a>
              <a href=""><i class="icofont-heart-alt"></i></a>
              <a class="atc" data-id="{{$item->id}}" data-name="{{$item->name}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}" data-codeno="{{$item->codeno}}" data-photo="{{$item->photo}}"><i class="icofont-cart-alt"></i></a>
            </div>
          </div>
        </div>