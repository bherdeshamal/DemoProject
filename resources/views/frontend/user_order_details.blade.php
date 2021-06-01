@extends('frontend.frontdesign2');

@section('content')

<section id="form" style="margin-top:40px;"><!--form-->
		<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="">Home</a></li>
				  <li><a href="orders"> My Orders</a></li>
                  <li class="active">{{$orderDetails->id}}</li>
				</ol>
			</div>
        <div class="heading" align="center">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Product Id</th>
              
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product quantity</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orderDetails->orders as $pro)
            <tr>
                <td>{{$pro->product_id}}</td>
              
                  <td>{{$pro->name}}</td>
                <td>{{$pro->price}}</td>
                <td>{{$pro->quantity}}</td>
                 </tr>
        @endforeach  
        </tbody>
      
    </table>
		</div>
		</div>
</section>

	
@endsection
