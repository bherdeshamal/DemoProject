
@extends('frontend.frontdesign');

@section('content')

	<section id="form" style="margin-top:30px;"><!--form-->
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
                <div class="panel-heading">Login</div>

                <div class="panel-body">
			
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="post" action="/check">
						{{ csrf_field() }}  
								<input type="email" name="email" placeholder="Email Address" class="required form controls"/>
							<span class="text-danger">{{ $errors->first('email') }}</span>

                            <input type="password" name="password" placeholder="Password" />
							<span class="text-danger">{{ $errors->first('password') }}</span>
						
							<span>
							</br>	<input type="checkbox" class="checkbox"> 
							Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>

                            </br>  </br><a href ="forget">Forget Password ?</a>
						</form>
					</div><!--/login form-->
				</div>
                </div>
            
        </div>
    </div>
</div>
	</section><!--/form-->
	@endsection