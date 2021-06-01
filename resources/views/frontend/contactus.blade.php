@extends('frontend.frontdesign2');

@section('content')
<section>


	 <div id="contact-page" class="container"  style="margin-top:30px;">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
					</div>
				</div>			 		
			</div>    	
    		<div class="row"  style="margin-top:30px;">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
						@if (session('success'))
                    <div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert"></button>
              
                        {{ session('success') }}
                    </div>
                    @endif
				    	<form  method="post" action="/sendaction">
						{{ csrf_field() }}  
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" placeholder="Name">
								</br>  <span class="text-danger">{{ $errors->first('name') }}</span>
						    </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control"  placeholder="Email">
								</br>  <span class="text-danger">{{ $errors->first('email') }}</span>
                               
						    </div>

				            <div class="form-group col-md-12">
				                <textarea name="message" id="message"  class="form-control" rows="8" placeholder="Your Message Here"></textarea>
								</br>  <span class="text-danger">{{ $errors->first('message') }}</span>
                                   
						    </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>E-Shopper Inc.</p>
							<p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
							<p>Newyork USA</p>
							<p>Mobile: +2346 17 38 93</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: info@e-shopper.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div>
</section>
    @endsection