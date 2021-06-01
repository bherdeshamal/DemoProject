<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use Session;
use App\Category;
use App\cart;
use App\Coupon;

class cartcontroller extends Controller
{
   
    public function applycoupon(Request $request)
    {
        Session :: forget('amount');
        //Session :: forget('coupon_code');
     

        $data= $request->all();
        $couponcount=Coupon::where('coupon_code',$data['coupon_code'])->count();
        if($couponcount==0 )
        {
            return redirect()->back()->with('success','Coupon  does not exist');
        }
        else
        {
            $couponDetails=Coupon::where('coupon_code',$data['coupon_code'])->first();

            if($couponDetails->status==0)
            {
                return redirect()->back()->with('success','Coupon is not Active');
            }
        }
        $total_amount=0;
        $expiry_date = $couponDetails->expiry_date;
        $cur_date = date('Y-m-d');
        if($expiry_date < $cur_date)
        {
            return redirect()->back()->with('success','Coupon is Expired');
        }
 
        $session_id = Session::get('session_id');
        $userCart = DB::table('carts')->where(['session_id' =>$session_id])->get();

        $total_amount = 0 ;
        foreach($userCart as $item)
        {
            $total_amount = $total_amount + ($pkey->price * $item->quantity);
        }
        
        if($couponDetails ->amount_type=="Amount")
        {
            $amount = $couponDetails->amount;
        }
        else
        {
            $amount = $total_amount *($couponDetails->amount/100);
        }
      
        Session :: put('amount',$amount);
       // Session :: put('coupon_code',$data[coupon_code]);
     
        return back()->with( 'success','Coupon is Active');
    }
}
