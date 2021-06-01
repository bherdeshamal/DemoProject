
@extends('frontend.frontdesign');

@section('content')

	<section id="form" style="margin-top:50px;"><!--form-->
		
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        
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
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
               
				
					<div class="signup-form"><!--sign up form-->
					<b>	<h2>New User Signup!</h2></b>
						<form method="post" action="/registeraction" >
						{{ csrf_field() }}  
							<input type="text" name="name" placeholder="Name"/>
							  <span class="text-danger">{{ $errors->first('name') }}</span>
                              </br>
                            <input type="email" name="email" placeholder="Email Address"/>
							 <span class="text-danger">{{ $errors->first('email') }}</span>
                             </br>    
							<input type="password" name="password"  placeholder="Password"/>
							 <span class="text-danger">{{ $errors->first('password') }}</span>
                             </br>   
							<button type="submit" class="btn btn-default">Signup</button>

                            <h2>Already have an account !!!  <a href="frontlogin">Login</a>
						</form>
					</div><!--/sign up form-->
				</div>
               
            </div>
        </div>
    </div>
</div>
	</section><!--/form-->
	@endsection