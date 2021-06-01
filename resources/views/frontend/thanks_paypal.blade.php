@extends('frontend.frontdesign2');

@section('content')

<section id="form" style="margin-top:20px;"><!--form-->
		<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="orderreview">Home</a></li>
				  <li class="active">Thanks</li>
				</ol>
			</div>

	<div class="heading" align="center">
		<h1> Payment Done Successfully  </h1></br>
			<p> Your order number is {{Session::get('order_id')}} and total amount paid is Rs. {{Session::get('grand_total')}} </br></p>
		</br>
		</br>
        <p></p>

		
		</div>
		</div>
	</section>

	
@endsection
