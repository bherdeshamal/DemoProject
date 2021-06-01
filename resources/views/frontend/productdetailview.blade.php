
@extends('frontend.frontdesign');

@section('content')


<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								@foreach($key as $cat)
						    	<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="{{$cat->id}}" href="{{$cat->url}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{{$cat->name}}
										</a>
									</h4>
								</div>
								@endforeach
							</div>	
						</div><!--/category-productsr-->
					
				
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class ="view-product">
								<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
								</div>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active thumbnail">
											@foreach($pkey as $product)
											<a href="{{asset('pimg/'.$product->image)}}" data-standard="{{asset('pimg/'.$product->image)}}">
											</br></br> </br><img src="{{asset('pimg/'.$product->image)}} " width="250px" height="250px">
											</br>
											</a><hr>
											</hr>
											@endforeach
										</div>
									
									</div>

								  <!-- Controls -->
								  
							</div>

						</div>
						<div class="col-sm-7">
							<form method="post" action="/cartaction">
								{{csrf_field()}}

								<div class="product-information"><!--/product-information-->
                                
									@foreach($pkey as $product)
									</hr><hr>
									
									<p>Web ID: {{$product->id}}</p>
									<img src="{{asset('pimg/'.$product->image)}} " width="150px" height="150px">
							
									<span>

									<span></br></span>
									
									</span>
									<p>&nbsp</p>
									<p><b>Availability:</b> In Stock</p>
									<p><b>Condition:</b> New</p>
									<p><b>Price :</b> {{$product->price}} Rs</p>
									<p><b>Product Name :</b> {{$product->name}}</p>
									<p><b>Brand:</b> E-SHOPPER</p>
									<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
									@endforeach
								</div><!--/product-information-->
							</form>
						</div>
					</div><!--/product-details-->
					
				
							
							</div>
						
							
				
				</div>
			</div>
		</div>
	</section>
	@endsection