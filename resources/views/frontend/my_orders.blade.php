@extends('frontend.frontdesign2');

@section('content')

<section id="form" style="margin-top:40px;"><!--form-->
		<div class="container">
		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="dashboard">Home</a></li>
				  <li class="active">My Orders</li>
				</ol>
		</div>



        <section id="cart_items" style=" margin-top:20px;">
		<div class="container">
			</br>
			</br>
			</br>
			<div class="table-responsive cart_info">
            
                <table class="table table-condensed">
                
                    <thead> 
                        <tr class="cart_menu">
                            <td class="image">Order ID</td>
                            <td class="description">Ordered Products</td>
                            <td class="price">Payment Method</td>
                            <td class="quantity">Grand Total</td>
							<td class="quantity">Created On</td>
							<td class="total">Status</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
				
                    @foreach($orders as $order)
                        <tr>
                        
                            <td class="cart_product">
                            <p>{{$order->id}}</p>                          
                            </td>
                            <td class="cart_description">
                                
                            @foreach($order->orders as $pro)
                          <a href="{{url('/user_order_details/'.$order->id)}}">  Product-id := {{$pro ->product_id}}</a></br>
                            @endforeach
                            </td>
                            <td class="cart_price">
                                <p>Price: Rs {{$order->payment_method}}</p>
                            </td>
                         	<td class="cart_quantity">
                            {{$order->grand_total}}
							</td>

							<td class="cart_total">
							{{$order->created_at}}
							</td>
							<td class="cart_delete">
                            {{$order->tracking_msg}}		
                            </td>
                        </tr>
						
						@endforeach	
  
                     
					
                    </tbody>
                </table>
            </div> 
            {!! $orders->links('pagination::bootstrap-4')!!}
       <div>
       </section>
	
		</div>
       
</div>
       
</section>

	
@endsection
