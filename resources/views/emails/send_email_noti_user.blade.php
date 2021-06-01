<html>

<head>
<title>Dear Coustomers you have new message from E-shopper. Please check your details :-</title>
</head>
<body>
<b><font color="blue">Dear {{ $data['user_email']}}</font></b>

<p><b><font color="blue">Your account has been successfully updated.</br>
            your account info is given below</font></b></p>
           
<table border= 6>
              <tr><td><b> <font color="red">Registered Email</font> </b> :=> {{ $data['user_email']}}</td></tr>
                        
</br>                    
</br>
                      <tr><td><b>  <font color="red">Shipping Name </font> </b>:{{ $data['name']}} </td></tr>
                     
                      </br>                    
</br>

                     <tr><td><b>  <font color="red">Shipping Address </font></b> :{{ $data['address']}} </td></tr>
                     
                     </br>                    
</br>

                      <tr><td><b>  <font color="red">Shipping City </font></b> :{{ $data['city']}} </td></tr>
                     
                      </br>                    
</br>

                      <tr><td><b>  <font color="red">Shipping State </font></b>: {{ $data['state']}} </td></tr>
                     
                      </br>                    
</br>

                      <tr><td><b>  <font color="red">Shipping Pincode </font></b> :{{ $data['pincode']}} </td></tr>

                     
                      </br>                    
</br>
                      <tr><td><b>  <font color="red">Shipping mobile </font></b> :{{ $data['mobile']}} </td></tr>
                     
                      </br>                    
</br>

                      <tr><td><b>  <font color="red">Payment Mode </font></b> :{{$data['payment_method']}} </td></tr>

                     
                      </br>                    
</br>
                      <tr><td><b>  <font color="red">Grand Total</font></b>:{{$data['grand_total']}} </td></tr>
                     
                     
                        
</table>

<b><font color="blue">Thanks with regards E-com Website</font></b>
</body>
</html>