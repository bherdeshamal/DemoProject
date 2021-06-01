<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Session;

class CouponController extends Controller
{
    public function createcoupon()
	{
        return view('coupons.coupon');
    }

    public function storecoupon(Request $request)
    {
        $this->validate($request, [
            'coupon_code' => 'required|string',
            'amount' =>'required|integer',
            'amount_type' =>'required',
            'expiry_date'=>'required',
            'status'=>'required',
              ]);
        $coupon = new Coupon();
        $coupon->coupon_code = request('coupon_code');
        $coupon->amount = request('amount');
        $coupon->amount_type = request('amount_type');
        $coupon->expiry_date = request('expiry_date');
        $coupon->status = request('status');
        $coupon->save();
        return redirect('/couponview')->with('success','New Coupon Set Successfully');
		
    }
    public function indexcoupon()
    {
	   $coupon = Coupon::latest()->paginate(5);
      
        return view('coupons.couponview', ['coupons'=>$coupon]);
    }

    public function editcoupon($id)
    {
		$coupon = Coupon::find($id);
        return view('coupons.edit', compact('coupon'));
    }

    public function updatecoupon(Request $request,$id)
    {
        $this->validate($request, [
            'coupon_code' => 'required|alphanum',
            'amount' =>'required|integer',
            'amount_type' =>'required',
            'expiry_date'=>'required',
            'status'=>'required',
              ]);
         $coupon = Coupon::find($id);
         $coupon->coupon_code = $request->coupon_code;
         $coupon->amount = $request->amount;
         $coupon->amount_type = $request->amount_type;
         $coupon->expiry_date = $request->expiry_date;
         $coupon->status =$request->status;
         $coupon->save();
         return redirect('couponview')->with('success','Coupons Updated Successfully');
    }

    public function deletecoupon($id)
    {
        $coupon = Coupon::find($id);
		$coupon->delete();
        return redirect('couponview')->with('danger','Coupons deleted Successfully');
    }
}
