@extends('layouts.front')
@section('page_title')
    Cart
@endsection
@section('content')
    <div class="shopping-cart-steps">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart-steps">
						<ul class="clearfix">
							<li class="active">
								<div class="inner">
									<span class="step">01</span> <span class="inner-step">Shopping Cart</span>
								</div>
							</li>
							<li>
								<div class="inner">
									<span class="step">02</span> <span class="inner-step">Checkout </span>
								</div>
							</li>
							<li>
								<div class="inner">
									<span class="step">03</span> <span class="inner-step">Order Completed </span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="shopping-cart-area">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
                        @php $cart_total = 0; @endphp
                        @if($cart_items = json_decode(Illuminate\Support\Facades\Redis::get('cart')))
						<table class="cart-table">
							<thead>
								<tr>
									<th>Image</th>
									<th>Product Name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
									<th class="text-center"><i class="fa fa-times" aria-hidden="true"></i></th>
								</tr>
							</thead>
                                <tbody>
                                    @foreach($cart_items as $key => $cart_item)
                                        @php $cart_total+= $cart_item->total @endphp
                                        <tr>
                                            <td>
                                                <div class="cart-product-thumb">
                                                    <a href="#"><img src="{{$cart_item->image}}" alt="" ></a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cart-product-name">
                                                    <h5><a href="product-details"> {{$cart_item->name}}</a></h5>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="cart-product-price">${{number_format($cart_item->price)}}</span>
                                            </td>
                                            <td>
                                                <div class="cart-quantity-changer">
                                                    <a class="value-decrease qtybutton" data-product-id="{{$key}}">-</a>
                                                    <input type="text" id="cartItem{{$key}}" value={{$cart_item->quantity}} >
                                                    <a class="value-increase qtybutton" data-product-id="{{$key}}">+</a>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="cart-product-price">${{number_format($cart_item->total)}}</span>
                                            </td>
                                            <td>
                                                <div class="product-remove">
                                                    <a href="javascript:void(0)">
                                                        <i class="fa fa-times" aria-hidden="true" data-product-id="{{$key}}"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>

						</table>
					</div>
				</div>
			</div>
			<div class="row mt-30">
				<div class="col-lg-6">
					<div class="cart-update">
						<a href="shop" class="btn-common">CONTINUE SHOPPING</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="cart-update pull-right">
						<a href="javascript:void(0)" id="update-cart" class="btn-common">UPDATE CART</a>
					</div>
				</div>
			</div>
			<div class="row mt-40">
				<div class="col-lg-4">
					<div class="cart-box shpping-tax">
						<h5>Estimate Shipping And Tax</h5>
						<div class="cart-box-inner">
							<p>Enter your destination to get shipping & tax</p>
							<table class="table">
								<tr>
									<td>
										<label>COUNTRY *:</label>
									</td>
									<td>
										<select>
											<option>Select options</option>
											<option>United States</option>
											<option>China</option>
											<option>Canada</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										<label>STATE / PROVINCE *:</label>
									</td>
									<td>
										<select>
											<option>Select options</option>
											<option>United States</option>
											<option>China</option>
											<option>Canada</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										<label>ZIP / POSTAL CODE *:</label>
									</td>
									<td>
										<select>
											<option>Select options</option>
											<option>United States</option>
											<option>China</option>
											<option>Canada</option>
										</select>
									</td>
								</tr>
							</table>
							<a href="#" class="btn-common">GET A QUOTE</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="cart-box cart-coupon fix">
						<h5>Discount Codes</h5>
						<div class="cart-box-inner">
							<p>Enter your coupin if you have one</p>
							<input type="text" >
							<a href="#" class="btn-common">Apply</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="cart-box cart-total">
						<h5>Cart Total</h5>
						<div class="cart-box-inner">
							<table class="table">
								<tr>
									<td>SUB TOTAL:</td>
									<td><span>${{number_format($cart_total)}}</span></td>
								</tr>x
								<tr>
									<td>GRAND TOTAL:</td>
									<td><span>${{number_format($cart_total)}}</span></td>
								</tr>
							</table>
							<div class="proceed-checkout">
{{--								<div class="col-lg-12">--}}
{{--									<a href="#">Checkout with multiple address</a>--}}
{{--								</div>--}}
								<div class="col-lg-12">
									<a href="checkout" class="btn-common">PROCEED TO CHECK OUT</a>
								</div>
							</div>
						</div>
					</div>
                    @else
                        <h3> Your Cart is  empty, <a href="shop">start shopping</a></h3>
                    @endif

				</div>

			</div>
		</div>
	</div>

@endsection
@push('scripts')
    <script>


        [...document.getElementsByClassName('fa-times')].map(element => {
            element.onclick = async e => {
                const response = await (await fetch(`/api/v1/cart/remove/${e.target.getAttribute('data-product-id')}`, {
                    method: 'GET',
                    headers: {
                        'Accept':'application/json'
                    }
                })).json();

                if(response.success){
                    return swal({
                        title: 'Success',
                        text: 'Product removed from cart successfully',
                        icon: 'success'
                    }).then( () => window.location.reload());
                }
            }
        });


        [...document.getElementsByClassName('value-increase')].map(element => {
            element.onclick = e => {
                const cart_quantity_element = document.getElementById(`cartItem${e.target.getAttribute('data-product-id')}`);
                cart_quantity_element.value = +cart_quantity_element.value + 1;
                fetch(`/api/v1/cart/add/${e.target.getAttribute('data-product-id')}/${cart_quantity_element.value}`, {
                    method: 'GET',
                    headers: {
                        'Accept':'application/json'
                    }
                })
            }
        });

            [...document.getElementsByClassName('value-decrease')].map(element => {
            element.onclick = e => {
                const cart_quantity_element = document.getElementById(`cartItem${e.target.getAttribute('data-product-id')}`);
                if(+cart_quantity_element.value === 1) return;
                cart_quantity_element.value = +cart_quantity_element.value - 1;
                fetch(`/api/v1/cart/add/${e.target.getAttribute('data-product-id')}/${cart_quantity_element.value}`, {
                    method: 'GET',
                    headers: {
                        'Accept':'application/json'
                    }
                })
            }
        });

        document.getElementById('update-cart').onclick = e => {
            window.location.reload();
        }

    </script>
@endpush
