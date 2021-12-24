	$(document).ready(function (argument) {
	showItems();
	myNoti();
	function addCommas(nStr)
	{
	    nStr += '';
	    x = nStr.split('.');
	    x1 = x[0];
	    x2 = x.length > 1 ? '.' + x[1] : '';
	    var rgx = /(\d+)(\d{3})/;
	    while (rgx.test(x1)) {
	        x1 = x1.replace(rgx, '$1' + ',' + '$2');
	    }
	    return x1 + x2;
	}
	$('.atc').click(function(){
		let name = $(this).data('name');
		let id = $(this).data('id');
		let testprice = $(this).data('price');
		let discount = $(this).data('discount');
		let codeno = $(this).data('codeno');
		let qty = 1;
		let dval = $('.qty').val();
		let price;
		// alert(qty);
		if (discount) {
			 price = discount;
			 // console.log('it has');
		}else{
			price = testprice;
			// console.log('not have');
		}
		if(dval){
			qty=dval;
		}else{
			qty=1;
		}
		// alert(qty);
		let photo = $(this).data('photo');
		// alert(name+id+price+discount+codeno+qty);
		let item ={
			id:id,
			name:name,
			photo:photo,
			price:price,
			codeno:codeno,
			qty:qty
		}
		console.log(item);
		let status = false;
		var cart = localStorage.getItem('carts');
		var cartArr = '';
		if(cart==null){
			cartArr = new Array();
			console.log('hello');
		}else{
			cartArr = JSON.parse(cart);
		}
		$.each(cartArr,function(i,v){
			if (id == v.id) {
				v.qty++;
				console.log('ok');
				status = true;
				return false;
			}else{
				status = false;

			}
		})
		if (status==false) {
			cartArr.push(item);
		}
		localStorage.setItem('carts',JSON.stringify(cartArr));
		myNoti();

	});
	// noti
	function myNoti(){
		cart = localStorage.getItem('carts');
		let total=0;
		let count=0;
		if(cart){
			cartArr = JSON.parse(cart);
			$.each(cartArr,function(i,v){
				if (v.discount>0 && v.discount!=null) {
					total+=v.discount*v.qty;
					count+=parseInt(v.qty);
				}else{
					total+=v.price*v.qty;
					count+=parseInt(v.qty);
				}
				
			})
		}else{
			total = 0;
			count = 0;
		}
		$('#showamt').html(addCommas(total)+'MMK');
		$('.cartNoti').html(count);
	}
	// showitem
	function showItems(){
		cart = localStorage.getItem('carts');
		let html='';
		let total=0;
		if(cart){
			cartArr = JSON.parse(cart);
			$.each(cartArr,function(i,v){
				let price = addCommas(v.price);
						html+= `<tr>
							<td>
								<div class="d-flex">
									<div>
										<button class="del"><i class="icofont-delete-alt" style=""></i></button>
									</div>
									<div>
										<div class="row  ml-2" style="width:500px;">
											<div class="col-6">
												<img src="${v.photo}" width="150px" height="150px">
											</div>
											<div class="col-6">
												<h5 class="d-block mb-2">${v.name}</h5>
												<span class="d-block">${v.codeno}</span>
											</div>
										</div>
									</div>
								</div>
							</td>
							<td>
								<button class="btn btn-outline-secondary plus_btn" data-id="${i}">+</button>
								<input type="text" name="" value="${v.qty}" style="border:0px; text-align:center;width:40px;">
								<button class="btn btn-outline-secondary minus_btn" data-id="${i}">-</button>
							</td>
							<td>
								<h6 class="">${price}MMK</h6>
							</td>
							<td>
								<h6>${addCommas(v.price*v.qty)}MMK</h6>
							</td>
						</tr>`;
				if (v.discount>0) {
					total+=v.discount*v.qty;
				}else{
					total+=v.price*v.qty;
				}
			})
			console.log(total);
			$('#total').html(total+"MMK");
			$('#tbody').html(html);
		}
	}
	// end showitem
	// incre
	$('#tbody').on('click','.plus_btn',function(){
		let id = $(this).data('id');
		// alert(id);
		let cart = localStorage.getItem('carts');
		if(cart){
			let cartArr = JSON.parse(cart);
			$.each(cartArr,function(i,v){
				if(id == i){
					v.qty++;
				}
			})
		localStorage.setItem('carts',JSON.stringify(cartArr));
		showItems();
		myNoti();
		}
	});
	// end incre
	// minus
	$('#tbody').on('click','.minus_btn',function(){
		let id = $(this).data('id');
		if(cart){
			let cartArr = JSON.parse(cart);
			$.each(cartArr,function(i,v){
				if(id == i){
					v.qty--;
					if(v.qty==0){
						let yes = confirm("Are You Sure Do U Want to Delete");
						if(yes){
							cartArr.splice(id,1);
						}else{
							v.qty++;
						}
					}
				}
			})
		localStorage.setItem('carts',JSON.stringify(cartArr));
		showItems();
		myNoti();
		}
	});
	// end minus
	// del
	$('#tbody').on('click','.del',function(){
		let id = $(this).data('id');
		// alert(id);
		let yes = confirm("Are You Sure Do U Want to Delete");
		if(yes){
			let cart = localStorage.getItem('carts');
			let cartArr = JSON.parse(cart);
			// console.log(typeof cartArr);
			cartArr.splice(id,1);
			localStorage.setItem('carts',JSON.stringify(cartArr));
			showItems();
		}
	});
})