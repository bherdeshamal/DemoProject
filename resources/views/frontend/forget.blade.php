
@extends('frontend.frontdesign');

@section('content')

	<section id="form" style="margin-top:30px;"><!--form-->
		<div class="container">
	
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Forget Password</h2>
								@if (session('success'))
                   					 <div class="alert alert-success" role="alert">
                       					 {{ session('success') }}
                   					 </div>
                   				 @endif
						<form method="post" action="/forgotPassword">
								{{ csrf_field() }}  
									<input type="email" name="email" placeholder="Email Address" />
									</br>  <span class="text-danger">{{ $errors->first('email') }}</span>
							
							
							<button type="submit" class="btn btn-default">Send Mail</button>
							<br>
							
						</form>
					</div><!--/login form-->
				</div>
			
				
			</div>
		</div>
	</section><!--/form-->
	@endsection