@extends('frontend.frontdesign2');

@section('content')

<section id="form" style="margin-top:20px;"><!--form-->
		<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="indexcheckout">Home</a></li>
				  <li class="active">My Orders</li>
				</ol>
			</div>
		@if(Session::has('success'))
				<div class="alert alert-success alert-block" > 
					<button type="button" class="close" data-dismiss="alert" aria hidden="true">x</button>
						{{session('success')}}
				</div>
			@endif
			@if(Session::has('error'))
				<div class="alert alert-error alert-block" style="background-color:#f4d2d2"> 
					<button type="button" class="close" data-dismiss="alert">x</button>
						{{session('error')}}
				</div>
			@endif
			{{ csrf_field()}}
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="signup-form"><!--login form-->
						<h2>Billing Address</h2>
						<div class="form-group">
							{{$userDetails->name}}
						</div>
						<div class="form-group">
							{{$userDetails->address}}
						</div>
						<div class="form-group">
				                	{{$userDetails->city}}
						</div>
						<div class="form-group">
		                            	{{$userDetails->state}}
						</div>
						<div class="form-group">
							{{$userDetails->country}}
						</div>
						<div class="form-group">
				        	{{$userDetails->pincode}}
						</div>
						<div class="form-group">
				        	{{$userDetails->mobile}}
						</div>
						
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
				
				</div>
				<div class="col-sm-4 col-sm-offset-1">
					<div class="signup-form"><!--login form-->
						<h2>Shipping Address</h2>
						<div class="form-group">
						{{$shippingDetails->name}}
						</div>
						<div class="form-group">
						{{$shippingDetails->address}}
						</div>
						<div class="form-group">
						{{$shippingDetails->city}}
						</div>
						<div class="form-group">
						{{$shippingDetails->state}}
						</div>
						<div class="form-group">
						{{$shippingDetails->country}}
						</div>
						<div class="form-group">
						{{$shippingDetails->pincode}}
						</div>
						<div class="form-group">
						{{$shippingDetails->mobile}}
						</div>
						
					</div><!--/login form-->
				</div>

				</hr>
			</div>
			
		</div>
	</hr>

	
	</section><!--/form-->
	
	<section id="cart_items" style=" margin-top:20px;">
		<div class="container">
		<div> <h2> Review & Make Payment</h2></div>
			</br>
			</br>
			</br>
			<div class="table-responsive cart_info">
            
                <table class="table table-condensed">
                
                    <thead> 
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description">Product Id</td>
                            <td class="price">Price</td>
                            <td class="quantity">Name</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td class="Remove">Remove</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
					<?php $total_amount =0; ?>
                    @foreach($userCart as $cart)
                        <tr>
                        
                            <td class="cart_product">
                            <img src="{{asset('pimg/'.$cart->image)}} " width="150px" height="150px">
                                                    
                            </td>
                            <td class="cart_description">
                                
                                <p>Product ID:{{$cart->product_id}} </p>
                            </td>
                            <td class="cart_price">
                                <p>Price: Rs {{$cart->price}}</p>
                            </td>
                            <td class="cart_price">
                                <p>Name: {{$cart->name}}</p>
                            </td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<p>Quantity: {{$cart->quantity}}</p>
                                   	</div>
							</td>

							<td class="cart_total">
								<p class="cart_total_price">Rs {{ $cart->price * $cart-> quantity }}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('/orderreview/delete-orderproduct/' .$cart->id)}}"><i class="fa fa-times">X</i></a>
							</td>
                        </tr>
						<?php $total_amount = $total_amount + ($cart->price * $cart-> quantity) ; ?>
						@endforeach	
  
                        <tr>
                            <td colspan="4">&nbsp;</td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tr>
                                        <td> Price </td>
                                        <td> <span>Rs. <?php echo $total_amount; ?></span></td>
                                    </tr>
                                   
                                    <tr>
                                        <td>Coupon Discount (-)</td>
									<td>
										@if(!empty(Session::get('CouponAmount')) && ($total_amount > (Session::get('CouponAmount'))))
                                        		<span>Rs. {{Session::get('CouponAmount')}}</span>
										@else
												<span>Rs. 0 </span>
										@endif	
									</td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Grand Total (+)</td>
                                        <td>
										@if(!empty(Session::get('CouponAmount'))  && ($total_amount > (Session::get('CouponAmount'))))
											<span>Rs. {{ $grand_total =  $total_amount - Session::get('CouponAmount') }}</span>
										@else
											<span>Rs. {{ $grand_total =  $total_amount }}</span>
										@endif
										</td>
								   </tr>
                                </table>
                            </td>
                        </tr>
					
                    </tbody>
                </table>
            </div> 

				<form action="/place_order" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="grand_total" value="{{$grand_total}}" >
				<div class="payment-options">
			
					<span>
						<label> Select any one payment option </label>
					</span>
					<span>
						<label><input type="radio" name="payment_method" id="COD" value="COD"> Cash on Delivery</label>
					</span>
					<span>
						<label><input type="radio" name="payment_method" id="paypal" value="paypal"> Paypal</label>
					</span>
					<span style="float:right;">
					<button type="submit" class="btn btn-primary" onclick="return selectPaymentMethod();">Place Order</button>
					</span>
				</div>
			</form>
		</div>
	</section> <!--/#cart_items-->

		
@endsection
