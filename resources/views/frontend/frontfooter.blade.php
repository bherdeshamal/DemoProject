
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('images/frontimages/home/iframe1.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('images/frontimages/home/iframe2.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('images/frontimages/home/iframe3.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('images/frontimages/home/iframe4.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{asset('images/frontimages/home/map.png')}}" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
				
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
							
								<li><a href="{{url('pages/terms')}}">Online Help</a></li>
								<li><a href="{{url('pages/terms')}}">Contact Us</a></li>
								<li><a href="{{url('pages/order')}}">Order Status</a></li>
								<li><a href="{{url('pages/change')}}">Change Location</a></li>
								<li><a href="{{url('pages/faq')}}">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{url('pages/tshirt')}}">T-Shirt</a></li>
								<li><a href="{{url('pages/mens')}}">Mens</a></li>
								<li><a href="{{url('pages/womens')}}">Womens</a></li>
								<li><a href="{{url('pages/gift')}}">Gift Cards</a></li>
								<li><a href="{{url('pages/shoes')}}">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{url('pages/terms')}}">Terms of Use</a></li>
								<li><a href="{{url('pages/privacy')}}">Privecy Policy</a></li>
								<li><a href="{{url('pages/refund')}}">Refund Policy</a></li>
								<li><a href="{{url('pages/bills')}}">Billing System</a></li>
								<li><a href="{{url('pages/ticket')}}">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="{{url('pages/company')}}">Company Information</a></li>
								<li><a href="{{url('pages/careers')}}">Careers</a></li>
								<li><a href="{{url('pages/store')}}">Store Location</a></li>
								<li><a href="{{url('pages/affillate')}}">Affillate Program</a></li>
								<li><a href="{{url('pages/copyright')}}">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
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
       
							<form action="/newsletter" class="searchform" method="post">
							{{csrf_field()}}
								<input type="email" name="user_email" id="user_email" placeholder="Your email address" required/>
								<button type="submit" class="btn btn-info btn-lg"> > </button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
				
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	