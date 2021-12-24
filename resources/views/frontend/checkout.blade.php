@extends('master')
@section('content')
<div class="container my-5">
	<div class="text-right">
		<a href="{{route('homepage')}}" class="btn btn-info text-light"><i class="icofont-prestashop mr-2"></i>Continue Shopping</a>
	</div>
	<div class="bg-info py-4 my-3">
		<h1 class="text-light text-center">Your Shopping Cart</h1>
	</div>
	<div class="row" id="check">
		<div class="col-12 col-md-12">
			<div class="table">
				<table class="table">
					<tr>
						<th>Product</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Total</th>
					</tr>
					<tbody id="tbody">
						
					</tbody>
					<tr>
						<td colspan="2">
							<textarea class="form-control" name="comment" rows="4">
								
							</textarea>
						</td>
						<td colspan="2">
							<div class="text-right">
								<h4 class="d-inline-block">Total:</h4>
								<span id="total" name="total" style="font-size: 20px;"></span>
								<div>
									@auth()
									<button class="btn btn-outline-info mt-3 checkout">Check Out</button>
									@else()
									<a class="btn btn-outline-info mt-3" href="{{route('login')}}">Login to Checkout</a>

									@endauth
								</div>				
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="noorder text-center border-secondary p-5">
		<h1>No Have Items</h1>
	</div>
</div>
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
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function (argument) {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
		});
		$('.checkout').click(function(event) {
			/* Act on the event */
			let ls = localStorage.getItem('carts');
			let total =JSON.parse(ls).reduce((acc,item)=>acc+(item.price*item.qty),0);
			$.post("{{route('orders.store')}}",{ls:ls,total:total},function(response){
				console.log(response);
				localStorage.clear();
				window.location.href = "{{URL::to('login')}}"
			})
		});
		function check(){
			let check = localStorage.getItem('carts');
			$('.noorder').hide();
			if(check){
				$('.noorder').hide();
				$('#check').show();
			}else{
				$('.noorder').show();
				$('#check').hide();
			}
		}
		check();
	})
</script>

@endsection
