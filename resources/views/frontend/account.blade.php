
@extends('frontend.frontdesign2');

@section('content')
	<section id="form" style="margin-top:20px;"><!--form-->
		<div class="container">
	
			<div class="row">
			@if(Session::has('success'))
				<div class="alert alert-success alert-block" > 
					<button type="button" class="close" data-dismiss="alert">x</button>
						{{session('success')}}
				</div>
			@endif
			@if(Session::has('error'))
				<div class="alert alert-error alert-block" style="background-color:#f4d2d2"> 
					<button type="button" class="close" data-dismiss="alert">x</button>
						{{session('error')}}
				</div>
			@endif
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Update Account</h2>
					
						<form action="/account" method="post" >
							{{csrf_field()}}
							<input value="{{$userDetails->name}}" name="name" id="name" type="text" placeholder="Name" />
							<input value="{{$userDetails->address}}" type="text" name="address" id="address" placeholder="Address"  />
							<input value="{{$userDetails->city}}" type="text" name="city"  id="city" placeholder="City"  />
							<input value="{{$userDetails->state}}" type="text" name="state" id="state"  placeholder="State"  />
							<input value="{{$userDetails->country}}" type="text" name="country" id="country"  placeholder="Country" />
							<input value="{{$userDetails->pincode}}" type="text" name="pincode" id="pincode"  placeholder="Pin-Code" />
							<input value="{{$userDetails->mobile}}" type="text" name="mobile" id="mobile"  placeholder="Mobile Number" />
							<button type="submit" class="btn btn-default">Update</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Update Password</h2>
					
						<form action="/update-user-pwd" method="post" >
							{{csrf_field()}}
							<input type="password" name="current_pwd" id="current_pwd"  placeholder="Cuurent Password" />
							<input type="password" name="new_pwd" id="new_pwd" placeholder="New Password"  />
							<input type="password" name="confirm_pwd"  id="confirm_pwd" placeholder="Confirm Password"  />
								<button type="submit" class="btn btn-default">Update</button>
						</form>
						
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	@endsection