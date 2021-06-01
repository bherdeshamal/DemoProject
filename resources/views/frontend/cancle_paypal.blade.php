@extends('frontend.frontdesign2');

@section('content')

<section id="form" style="margin-top:20px;"><!--form-->
		<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="orderreview">Home</a></li>
				  <li class="active">Cancel Payment</li>
				</ol>
			</div>

	<div class="heading" align="center">
		<h1> YOUR PayPal ORDER HAS BEEN CANCELLED</h1>
        </br>
			<p> Please contact us if there is any Enquiry.</P></br>
		</br>
        <p></p>

		
		</div>
		</div>
	</section>

	
@endsection
<?php
Session::forget('grand_total');

Session::forget('order_id');
?>