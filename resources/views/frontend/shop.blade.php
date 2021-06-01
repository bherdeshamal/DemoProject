@extends('frontend.frontdesign');

@section('content')

	<section id="advertisement">
		<div class="container">
			<img src="{{asset('images/frontimages/shop/advertisement.jpg')}}" alt="" />
		</div>
	</section>
	
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
					
					
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="{{asset('images/frontimages/home/shipping.jpg')}}" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($pkey as $product)
						<div class="col-sm-4">
						
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
                                    <img src="{{asset('pimg/'.$product->image)}} " width="300px" height="300px">
									<h2>{{$product->price}}</h2>
										<p>{{$product->name}}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
										<h2>{{$product->price}}</h2>
										<p>{{$product->name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
							
						</div>
						@endforeach
						</br>
						
						
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	@endsection