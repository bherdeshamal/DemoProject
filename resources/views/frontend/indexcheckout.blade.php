@extends('frontend.frontdesign2');

@section('content')

<section id="form" style="margin-top:20px;"><!--form-->
		<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="cart">Home</a></li>
				  <li class="active">Checkout</li>
				</ol>
			</div>
		@if(Session::has('success'))
				<div class="alert alert-success alert-block" > 
					<button type="button" class="close" data-dismiss="alert">x</button>
						{session('success')}
				</div>
			@endif
			@if(Session::has('error'))
				<div class="alert alert-error alert-block" style="background-color:#f4d2d2"> 
					<button type="button" class="close" data-dismiss="alert">x</button>
						{{session('error')}}
				</div>
			@endif
			<form action="/indexcheckout" method="post">
			{{ csrf_field()}}
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="signup-form"><!--login form-->
						<h2>Bill To</h2>
						<div class="form-group">
							<input type="text" name="billing_name" placeholder="Billing Name" value="{{$userDetails->name}}" class="form-control"/>
						</div>
						<div class="form-group">
							<input type="text" name="billing_address" placeholder="Billing Address" value="{{$userDetails->address}}" class="form-control"/>
						</div>
						<div class="form-group">
							<input type="text" name="billing_city" placeholder="Billing City" value="{{$userDetails->city}}" class="form-control" />
						</div>
						<div class="form-group">
							<input type="text" name="billing_state" placeholder="Billing State" value="{{$userDetails->state}}" class="form-control" />
						</div>
						<div class="form-group">
							<input type="text" name="billing_country" placeholder="Billing Country" value="{{$userDetails->country}}" class="form-control" />
						</div>
						<div class="form-group">
							<input type="text" name="billing_pincode" placeholder="Billing Pincode" value="{{$userDetails->pincode}}" class="form-control" />
						</div>
						<div class="form-group">
							<input type="text" name="billing_mobile" placeholder="Billing Mobile" value="{{$userDetails->mobile}}" class="form-control" />
						</div>

				
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
				
				</div>
				<div class="col-sm-4 col-sm-offset-1">
					<div class="signup-form"><!--login form-->
						<h2>Ship To</h2>
						<div class="form-group">
							<input name="shipping_name" id="shipping_name" type="text"   placeholder="Shipping Name"  class="form-control"/>
						</div>
						<div class="form-group">
							<input name="shipping_address" id="shipping_address" type="text"   placeholder="Shipping Address"  class="form-control"/>
						</div>
						<div class="form-group">
							<input name="shipping_city" id="shipping_city" type="text"  placeholder="Shipping City"  class="form-control" />
						</div>
						<div class="form-group">
							<input name="shipping_state" id="shipping_state" type="text"   placeholder="Shipping State"  class="form-control" />
						</div>
						<div class="form-group">
							<input name="shipping_country" id="shipping_country" type="text"  placeholder="Shipping Country"  class="form-control" />
						</div>
						<div class="form-group">
							<input name="shipping_pincode" id="shipping_pincode" type="text"  placeholder="Shipping Pincode"  class="form-control" />
						</div>
						<div class="form-group">
							<input name="shipping_mobile" id="shipping_mobile" type="text"  placeholder="Shipping Mobile"  class="form-control" />
						</div>
						<button type="submit" class="btn btn-success">Checkout</button>
						
					</div><!--/login form-->
				</div>
			</div>
			</form>
		</div>
	
	</section><!--/form-->
	
	
		
@endsection