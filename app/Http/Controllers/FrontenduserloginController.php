<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\OrdersProduct;
use App\Product;
use App\Order;
use App\Orderstatu;
use App\Carrt;
use App\Coupon;
use App\User;
use Auth;
use App\Mail\trackmail;
use App\Mail\sendusermail;
use App\Mail\detailsmail;
use Session;
use App\DeliveryAdd;
use App\Exports\usersExport;
use DB;
use App\Exports\ordersExport;
use App\Exports\couponsExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class FrontenduserloginController extends Controller
{

       public function frontlogin()
       {
           return view('dashboard');
       }
       
       public function check(Request $request)
       {
        if($request->isMethod('post'))
        {
            $data =$request->all();
           // echo "<pre>"; print_r($data); die;
               if(Auth::attempt(['email'=>$data['email'],'password'=> $data['password'],'role'=>0]))
              {
                   return redirect('/dashboard')->with('success','login Successfully');
               }
               else
               {
                return redirect()->back()->with('error','Invalid Credentials..');
               } 
         }
          
       }


       public function storeDevice(Request $request)
       {
          if($request->isMethod('post'))
          {
            $data =$request->all();

            
            $usersCount = User::where('email',$data['email'])->count();
            if($usersCount >0)
            {
              return redirect()->back()->with('error','Email Already Exists');
            }
            else
            {
             
              $user = new User();
             
              $user->name = $data['name'];
              $user->email = $data['email'];
              $user->password = bcrypt($data['password']);
              $user->address='';
              $user->city='';
              $user->state='';
              $user->country='';
              $user->pincode='';
              $user->mobile='';
              $user->save();

              if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]))
              {
                return redirect('/dashboard')->with('success','Register Successfully');
              }
            }
          }
         
       }

       public function viewusers()
       { 
            $category = User::latest()->paginate(5);
           return view('usermanage.frontuserview',['frontendloginusers'=>$category]);
       }

       public function forgotPassword(Request $request)
       {
              $this->validate($request, [
           
            'email' => 'email|required',
           
              ]);
            if($request->isMethod('post'))
            {
                $data =$request->all();
              // echo "<pre>"; print_r($data); die;
                $user= User::where('email', $data['email'])->count();
                if($user==0)
                {
                    return redirect()->back()->with('success','Email does not exists PLease Register First');
                }

                $userdetails= User::where('email', $data['email'])->first();
                $random_pass=str_random(8);
                $new_password = bcrypt($random_pass);

                User::where('email', $data['email'])->update(['password'=>$new_password]);
                $email=$data['email'];
                $name= $userdetails->name;
                $msgdata=[
                    'email'=>$email,
                    'name'=>$name,
                    'password'=>$random_pass
                ];

                Mail::send('emails.forgetpassword',$msgdata,function($message)use($email)
                {
                    $message->to($email)->subject('New Password- E-com Website');
                });

                return redirect('frontlogin')->with('success', 'check your mail');
            }
            return view('frontend.frontlogin')->with('success', 'check your mail');;
       }

       
   public function logout()
   {
       Auth::logout();
       return redirect('/frontlogin');
   }

   public function checkout(Request $request)
   {
       $user_id = Auth::User()->id;
       $user_email = Auth::User()->email;
       $userDetails= User::find($user_id);
       
       $shippingcount = DeliveryAdd::where('user_id',$user_id)->count();
       if($shippingcount>0)
       {
          $shippingDetails = DeliveryAdd::where('user_id',$user_id)->first();
       }

       if($request->isMethod('post'))
       {
         $data=$request->all();
        // echo "<pre>"; print_r($data); die;
        if(empty($data['billing_name']) || empty($data['billing_address']) || empty($data['billing_city']) || empty($data['billing_state']) || empty($data['billing_country']) || empty($data['billing_pincode']) ||empty($data['billing_mobile']) ||
           empty($data['shipping_name']) || empty($data['shipping_address']) || empty($data['shipping_city']) || empty($data['shipping_state']) || empty($data['shipping_country']) || empty($data['shipping_pincode']) ||empty($data['shipping_mobile'])) 
           {
             return redirect()->back()->with('error','Please Fill all the fields to checkout');
           } 

           User::where('id',$user_id)->update(['name'=>$data['billing_name'],'address'=>$data['billing_address'],
                        'city'=>$data['billing_city'],'state'=>$data['billing_state'],'country'=>$data['billing_country'],
                        'pincode'=>$data['billing_pincode'],'mobile'=>$data['billing_mobile']]);

          if($shippingcount>0)
          {
           DeliveryAdd::where('user_id',$user_id)->update(['name'=>$data['shipping_name'],'address'=>$data['shipping_address'],
                            'city'=>$data['shipping_city'],'state'=>$data['shipping_state'],'country'=>$data['shipping_country'],
                            'pincode'=>$data['shipping_pincode'],'mobile'=>$data['shipping_mobile']]);
          }
          else
          {
            
            $shipping=new DeliveryAdd;
            $shipping->user_id = $user_id;
            $shipping->user_email = $user_email;
            $shipping->name= $data['shipping_name'];
            $shipping->address= $data['shipping_address'];
            $shipping->city= $data['shipping_city'];
            $shipping->state= $data['shipping_state'];
            $shipping->country= $data['shipping_country'];
            $shipping->pincode= $data['shipping_pincode'];
            $shipping->mobile= $data['shipping_mobile'];
            $shipping->save();

          
          }
          return redirect('orderreview');
       }

       return view('frontend.indexcheckout')->with(compact('userDetails','shippingDetails'));
   }
   
   public function orderreviewpage()
   {
    $user_id = Auth::User()->id;
    $user_email = Auth::User()->email;
    $userDetails= User::where('id',$user_id)->first();
    $shippingDetails = DeliveryAdd::where('user_id',$user_id)->first();
    
    $userCart = Carrt::where('user_email',$user_email)->get();
       
    foreach($userCart as $key => $product)
    {
       $pkey = Product::where('id',$product->product_id)->first();
      $userCart[$key]->image= $pkey->image;
    }
    ///echo "<pre>"; print_r($userCart); die;
    //$pkey=Product::select('id','price','image','name')->first();
   // $cart=Coupon::select('id','amount')->first();
    return view('frontend.orderreview')->with(compact('userDetails','shippingDetails','userCart'));
   }

   public function placeorder(Request $request)
   {
   
     if($request->isMethod('post'))
     {
       $data = $request->all();
        $user_id = Auth::User()->id;
        $user_email = Auth::User()->email;
        $userDetails= User::where('id',$user_id)->first();
      
        //$grandtotal= "{$pkey->price}" - "{$cart->amount}";
        $shippingDetails = DeliveryAdd::where(['user_id'=>$user_id])->first();

        if(empty(Session::get('CouponCode')))
           {
            $data['coupon_code'] ='';
           } 
        else{
            $data['coupon_code'] = Session::get('CouponCode');
           }   

        if(empty(Session::get('CouponAmount')))
          {
            $data['coupon_amount'] ='';
          } 
        else{
          $data['coupon_amount'] = Session::get('CouponAmount');
        }      


        $data= array(
          'name' =>$shippingDetails->name,
          'user_email' =>$user_email,
          'user_id'=>$user_id,
          'address'=>$shippingDetails->address,
         'city'=> $shippingDetails->city,
          'state'=>$shippingDetails->state,
          'pincode'=>$shippingDetails->pincode,
          'country'=>$shippingDetails->country,
          
          'mobile'=>$shippingDetails->mobile,
          'coupon_code'=>$data['coupon_code'],
         'coupon_amount'=> $data['coupon_amount'],
         'payment_method'=> $data['payment_method'],
          'grand_total'=>$data['grand_total'],
        
      );

         Mail::to('shamalbherde02@gmail.com')->send(new sendusermail($data)); 
        Mail::to('shamalbherde02@gmail.com')->send(new detailsmail($data));
       
        
          $order = new Order;
          $order->user_id = $user_id;
          $order->user_email = $user_email;
          $order->name = $shippingDetails->name;
          $order->address = $shippingDetails->address;
          $order->city = $shippingDetails->city;
          $order->state = $shippingDetails->state;
          $order->pincode = $shippingDetails->pincode;
          $order->country = $shippingDetails->country;
          $order->mobile = $shippingDetails->mobile;
          $order->shipping_charges = 0;
         
          $order->coupon_code = $data['coupon_code'];
          $order->coupon_amount = $data['coupon_amount'];
          $order->order_status = 0;
          $order->payment_method = $data['payment_method'];
          $order->grand_total =$data['grand_total'];
          $order->save();
         // return redirect()->back()->with(compact('userDetails','shippingDetails','userCart'));


          $order_id= DB::getPdo()->lastInsertId();

          $cartProducts= Carrt::where(['user_email'=>$user_email])->get();
          foreach($cartProducts as $pro)
          {
              $cartpro = new OrdersProduct;
              $cartpro->order_id = $order_id;
              $cartpro->user_id = $user_id;
              $cartpro->product_id = $pro->product_id;
              $cartpro->name =$pro->name;
              $cartpro->price = $pro->price;
              $cartpro->quantity = $pro->quantity;
              $cartpro->save();
          }
            Session::put('order_id',$order_id);
            Session::put('grand_total',$data['grand_total']);

        }
          if($data['payment_method']=="COD")
          {
        return redirect('Thanks')->with(compact('userDetails','shippingDetails'));
          }
          else
          {
           return redirect('paypal'); 
          }
   }

   public function thanks(Request $request)
   {
     $user_email=Auth::user()->email;
     $userCart= Carrt::where('user_email',$user_email)->delete();
     return view('frontend.Thanks');
   }

   public function paypal(Request $request)
   {
    $user_email=Auth::user()->email;
    $userCart= Carrt::where('user_email',$user_email)->delete();
   
     return view('frontend.paypal');
   }

   public function vieworders()
   {
      $order = Order::with('orders')->latest()->paginate(5);
  
     return view('frontend.vieworders', ['orders'=>$order]);
   }

   public function deleteorderitem($id=null)
   {
       $userCart= Carrt::where('id',$id)->delete();
       return redirect('orderreview')->with('success','Product has been deleted from Orders');
   }

   public function exportusers()
   {
     return Excel::download(new usersExport,'users.xlsx');
   }

   public function exportorders()
   {

    return Excel::download(new ordersExport,'orders.xlsx');
   }

   public function exportcoupons()
   {

    return Excel::download(new couponsExport,'coupons.xlsx');
   }

   public function userOrders()
  {
    $user_id=Auth::User()->id;
    //$user_email=Auth::User()->email;
    $orders=Order::with('orders')->where('user_id',$user_id)->latest()->paginate(4);
   
    return view('frontend.my_orders')->with(compact('orders'));

  }

  public function userOrderDetails($order_id)
  {
    $user_id=Auth::User()->id;
    $orderDetails=Order::with('orders')->where('id',$order_id)->first();
    return view('frontend.user_order_details')->with(compact('orderDetails'));

  }

  public function thankspaypal()
  {
    return view('frontend.thanks_paypal');
  }

  
  public function cancelpaypal()
  {
    return view('frontend.cancle_paypal');
  }

}
