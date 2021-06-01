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

</section>

	<section id="do_action" style="margin-top:20px;">

		<div class="container">
		<div class="heading" align="center">
		<h1> YOUR CASH ON DELIVERY ORDER HAS BEEN PLACED</h1>
		<p> Your Order Number is <span>{{Session::get('order_id')}}</span> and total payable amount is Rs. <span>{{Session::get('grand_total')}}</span></p>
		</div>
		</div>
	</section>

	<section id="do_action" style="margin-top:20px;">

		<div class="container">
		<div class="heading" align="center">
		
		</br>
		</br>

		</br>

		</br>
		</br>

		</br>
		</div>
		</div>
	</section>
@endsection
