@extends('layouts.front')
@section('page_title')
CheckOut
@endsection
@php
$cartItems = json_decode(\Illuminate\Support\Facades\Redis::get('cart'), true) ?? []
@endphp
@section('content')
<div class="shopping-cart-steps">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="cart-steps">
					<ul class="clearfix">
						<li>
							<div class="inner">
								<span class="step">01</span> <span class="inner-step">Shopping Cart</span>
							</div>
						</li>
						<li class="active">
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


<div class="checkout-area mt-15">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				@if(!Auth::user() && $cartItems )
				<p>Returning customer? <a href="login">Click here</a> to login</p>
				@endif
			</div>
		</div>

		<div class="row mt-10">
			<div class="col-lg-8">
				
				<form name="billingForm">
					<div class="billing-form">
						<h4>Billing Address</h4>
						<div class="row">
							<div class="col-lg-3 align-items-center">
								<label for="country">COUNTRY *</label>
							</div>
							<div class="col-lg-9">
						
								<select required name="country" id="country">

								@foreach(allCountries() as $country)	
								<option value="{{$country->cca3}}">{{ $country->name->common}}</option>
								@endforeach
								
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<label id="first_name">FULL NAME *</label>
							</div>
							<div class="col-lg-9">
								<input id="first_name" value="{{Auth::user()?Auth::user()->name:''}}" required name="first_name" type="text" />
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<label>COMPANY NAME(optional)</label>
							</div>
							<div class="col-lg-9">
								<input type="text" value="{{Auth::user()?Auth::user()->company_name:''}}" required name="company_name" value="">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<label>ADDRESS *</label>
							</div>
							<div class="col-lg-9">
								<input type="text" name="address" placeholder="Street Address" required>
								{{-- <input type="text" placeholder="Apartment, suite, unite ect (optinal)" class="mt-sm-30" >--}}
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<label>TOWN / CITY *</label>
							</div>
							<div class="col-lg-9">
								<input type="text" value="{{ Auth::user()?Auth::user()->city:'' }}" required name="city">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<label>COUNTRY / STATES</label>
							</div>
							<div class="col-lg-9">
								<input type="text" value="{{Auth::user()?Auth::user()->state:''}}" required name="state">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<label>POSTCODE / ZIP *</label>
							</div>
							<div class="col-lg-9">
								<input type="text" value="{{Auth::user()?Auth::user()->zip_code:''}}" required name="zip_code">
							</div>
						</div>

						<div class="row">
							<div class="col-lg-3">
								<label>EMAIL ADDRESS *</label>
							</div>
							<div class="col-lg-9">
								@if(Auth::user())
								<input disabled id="email_address" value="{{Auth::user()?Auth::user()->email:'' }}" required value="" name="email" type="text">
								@else
								<input  id="email_address" value=""  required value="" name="email" type="text">
								@endif
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<label>PHONE *</label>
							</div>
							<div class="col-lg-9">
								<input type="text"  value="{{Auth::user()?Auth::user()->phone:''}}" required name="phone">
							</div>
						</div>
						@if(!Auth::user())
						<div class="row">
							<div class="col-lg-12">
								<p>Create an account by entering the information below. </p>
							</div>
						</div>
						
						<div class="row" >
							<div class="col-lg-3" >
								<label>ACCOUNT PASSWORD *</label>
							</div>
							<div class="col-lg-9">
								<input type="password" value="" required name="password">
							</div>
						</div>
						@endif
						<div class="row">
							<div class="col-lg-3">
								<label class="p-0">ORDER NOTES</label>
							</div>
							<div class="col-lg-9">
								<textarea class="p-0 form-control" name="order_notes"></textarea>
							</div>
						</div>
					</div>
				</form>
				
			</div>
			@php $cart_total = 0 @endphp
			@if(count($cartItems ?? []) )
			<div class="col-lg-4">
				<div class="sidebar-checkout">
					<div class="cart-box cart-coupon fix">
						<h5>Promotional Code</h5>
						<div class="cart-box-inner">
							<p>Enter your coupon code if you have one</p>
							<input type="text" name="coupon" value="">
							<p></p>
							<a href="#" class="btn-common">Apply</a>
						</div>
					</div>
				</div>
				<div class="order-details mt-30">
					<h4>Your Order</h4>
					<div class="order-details-inner">
						<table>
							<thead>
								<tr>
									<th>PRODUCT</th>
									<th>TOTAL</th>
								</tr>
							</thead>
							<tbody>

								@foreach( $cartItems as $cart_item )
								@php $cart_total+= $cart_item['total'] @endphp
								<tr>
									<td>{{$cart_item['name']}}</td>
									<td><strong>${{number_format($cart_item['total'])}}</strong></td>
								</tr>
								@endforeach

								<tr>
									<td>Cart Subtotal</td>
									<td><strong>${{number_format($cart_total)}}</strong></td>
								</tr>
								<tr>
									<td>Shipping and Handling</td>
									<td>Free Shipping</td>
								</tr>
								<tr>
									<td>ORDER TOTAL</td>
									<td><strong>${{number_format($cart_total)}}</strong></td>
								</tr>

							</tbody>
						</table>

						<div class="payment-gateways mt-30">
							<div id="payment_gateways">
								<div class="single-payment-gateway">
									<input type="radio" name="payment_gateway" value="paystack" id="system2">
									<label for="system2">Paystack</label>
								</div>
								<div class="single-payment-gateway">
									<input type="radio" name="payment_gateway" value="paypal" id="system3">
									<label for="system3">PayPal</label>
								</div>
								
							</div>
						</div>
						<div class="place-order text-center mt-60">
							<a href="javascript:void(0)" class="btn-common width-180" id="place_order">Place Order</a>
						</div>
					</div>

				</div>
			</div>
			@else
			<h3> Your Cart is empty, <a href="shop">start shopping</a></h3>
			@endif
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script src="https://js.paystack.co/v1/inline.js" async></script>


<script>

	var orders = <?= json_encode($cartItems); ?>;
	orders = Object.values(orders)
	console.log(orders)
	orders.forEach(function(el){
		el.payment_method = 1;
		el.buyer_id = `{{Auth::user()?Auth::user()->id:0}}`;
		el.total_amount = `{{$cart_total}}` * 100;
		el.status = 'processing';
	})

	
	const get_order_request = (payment_response) => {
		return {
			data: {
				order: orders,
				payment: {
					response: JSON.stringify(payment_response)
				}
			}
		};
	};


	window.paymentMethod = 'paystack';
	document.getElementById('payment_gateways').onclick = e => window.paymentMethod = e.target.value;

	document.getElementById('place_order').addEventListener('click', e => {

		@if(Auth::user())
		const paymentMethodHandler = {
			'paystack': () => {
				let handler = PaystackPop.setup({
					key: 'pk_test_09382aa6313abb13f39a4994ce801a2abfa26dd6',
					email: `{{Auth::user()->email}}`,
					amount: `{{$cart_total}}` * 100,
					onClose: function() {

					},
					callback: function(response) {
						const {
							status
						} = response;
						// if payment successful post order
						if (status === 'success') {
							const request_data = get_order_request(response);
							fetch('/api/v1/orders/store', {
									method: 'POST',
									body: JSON.stringify(request_data),
									headers: {
										'Accept': 'application/json',
										'Content-Type': 'application/json'
									}
								}).then(response => response.json())
								.then(res => 
								 console.log(res)
								);
						}
					}
				});
				handler.openIframe();
			},
			'paypal': () => {
				alert('You choose paypal');
			}
		};
		paymentMethodHandler[window.paymentMethod]();

		@else
		const orderFormElements = [...document.forms['billingForm'].elements];
		const errors = [];
		const userData = orderFormElements.reduce((container, element) => {
			if (element.name !== 'order_notes') {
				element.style.borderColor = '';
			}
			if (element.value === '' && element.name !== 'order_notes') {
				errors.push([`${element.name} is required`]);
				element.style.borderColor = 'red';
			} else {
				container[element.name] = element.value;
			}
			return container;
		}, {});

		if (errors.length) {
			return swal({
				'title': 'Required Fields Missing',
				'text': 'The fields marked as red are required',
				'icon': 'error'
			})
		}

		userData.name = `${userData.first_name} ${userData.last_name}`;
		userData.account_type = 'buyer';
		userData.billing_address = userData.address;
		const {
			order_notes
		} = userData;
		userData.order_notes = userData.first_name = userData.last_name = undefined;
		const data = {
			data: {
				user: userData
			}
		};

		fetch('/api/v1/crud/users', {
				method: 'POST',
				body: JSON.stringify(data),
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json'
				}
			}).then(response => response.json())
			.then(res => {

				// log user in

				fetch('/auth/login/web', {
						method: 'POST',
						body: JSON.stringify({
							email: res.data.email,
							password: userData.password
						}),
						headers: {
							'Content-Type': 'application/json',
							'Accept': 'application/json',
						}
					}).then(response => response.json())
					.then(resp => {
						if (resp.success) {
							// handle payment
							const paymentMethodHandler = {
								'paystack': () => {
									let handler = PaystackPop.setup({
										key: 'pk_test_09382aa6313abb13f39a4994ce801a2abfa26dd6',
										email: resp.data.user.email,
										amount: `{{$cart_total}}` * 100,
										onClose: function() {

										},
										callback: function(response) {
											const {
												status
											} = response;

											// if payment successful post order
											if (status === 'success') {
												const request_data = get_order_request(response, resp.data.user.id);
												fetch('/api/v1/crud/orders', {
														method: 'POST',
														body: JSON.stringify(request_data),
														headers: {
															'Accept': 'application/json',
															'Content-Type': 'application/json'
														}
													}).then(response => response.json())
													.then(res => console.log(res));
											}
											window.location.reload();
										}
									});
									handler.openIframe();
								},
								'paypal': () => {
									alert('You choose paypal');
								}
							};
							paymentMethodHandler[window.paymentMethod]();
						}
					})
			});
		@endif
	});
</script>
@endpush