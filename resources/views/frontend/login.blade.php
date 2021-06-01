
@extends('frontend.frontdesign');

@section('content')

	<section id="form" style="margin-top:30px;"><!--form-->
		<div class="container">
		@if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Forget Password</h2>
						<form method="post" action="/">
						{{ csrf_field() }}  
						<input type="email"  placeholder="Email Address" />
							<span class="text-danger">{{ $errors->first('email') }}</span>
							
							
							<button type="submit" class="btn btn-default">Send Mail</button>
							<br>
							</br><a href="/forget">Forget Passsword ?</a>
						</form>
					</div><!--/login form-->
				</div>
				
				</div>
		
		</div>
	</section><!--/form-->
	@endsection