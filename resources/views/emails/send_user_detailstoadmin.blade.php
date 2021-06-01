<html>

<head>
<title>New Coustomer Book an Order from E-shopper. Please check The details :-</title>
</head>
<body>
<p><b> <font color="blue">New Coustomer Book an Order from E-shopper. Please check The details </p></font></b>

<table border=5>
        <tr><td><b> <font color="red"> Coustomer Mailing Address {{ $data['user_email']}}</td></tr>
             
               <tr><td><b> <font color="red"> Registered Email </font> </b> :=> {{ $data['user_email']}}</td></tr>
                       <tr><td><b> <font color="red">User-id </font> </b> :{{ $data['user_id']}} </td></tr>
                      <tr><td><b> <font color="red">Shipping Name </font> </b> :{{ $data['name']}} </td></tr>
                       <tr><td><b> <font color="red">Shipping Address </font> </b> :{{ $data['address']}} </td></tr>
                      <tr><td><b> <font color="red">Shipping City </font> </b> :{{ $data['city']}} </td></tr>
                       <tr><td><b> <font color="red">Shipping State</font> </b> :{{ $data['state']}} </td></tr>
                       <tr><td><b> <font color="red">Shipping Pincode</font> </b> :{{ $data['pincode']}} </td></tr>
                       <tr><td><b> <font color="red">Shipping mobile </font> </b>:{{ $data['mobile']}} </td></tr>
                      
                      <tr><td><b> <font color="red">Payment Mode</font> </b> :{{$data['payment_method']}} </td></tr>
                      
                      <tr><td><b> <font color="red">Grand Total </font> </b>:{{$data['grand_total']}} </td></tr>
                     
                     
                        
</table>
Thanks with regards E-com Website<
</body>
</html>