@extends('frontend.frontdesign2');

@section('content')

<section id="form" style="margin-top:20px;"><!--form-->
		<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="orderreview">Home</a></li>
				  <li class="active">Make Payment Online</li>
				</ol>
			</div>

	<div class="heading" align="center">
		<h1> YOUR PayPal ORDER HAS BEEN PLACED</h1>
			<p> Your order number is {{Session::get('order_id')}} and total payable about is Rs. {{Session::get('grand_total')}} </br></br>Please make payment by clicking on below Payment Button</p>
		</br>
		</br>
        <p></p>

		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

			<!-- Saved buttons use the "secure click" command -->
			<input type="hidden" name="cmd" value="_s-xclick">

			<!-- Saved buttons are identified by their button IDs -->
			<input type="hidden" name="hosted_button_id" value="221">

			<input type="hidden" name="business" value="shamalbherde@neosoftmail.com">
			<input type="hidden" name="item_name" value="{{Session::get('order_id')}}">
			<input type="hidden" name="currency_code" value="INR">
			
			<input type="hidden" name="amount" value="{{Session::get('grand_total')}}">
			<input type="hidden" name="return" value="{{url('paypal_cancle')}}">

			<input type="hidden" name="cancel_return" value="{{url('paypal_thanks')}}">
			
			<!-- Saved buttons display an appropriate button image. -->
			<input type="image" name="submit"
			src="{{asset('images/image.png')}}" width="400px" height="150px"
			alt="PayPal - The safer, easier way to pay online">
			<img alt="" width="1" height="1"
			src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

		</form>
		</div>
		</div>
	</section>

	
@endsection