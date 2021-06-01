<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Order;

class OrderStatusController extends Controller
{
    public function proceedorder($id)
    {
        if(Order::where('id',$id)->exists())
        {
            $orders = Order::find($id);
            return view('frontend.proceed',compact('orders'));
        }
        else
        {
            return redirect()->back()->with('success','No Order Found');
        }
    }

    public function trackingstatus(Request $request,$id)
    {
        $orders = Order::find($id);
        if($orders->order_status!="2")
        {
            $orders->tracking_msg=$request->input('tracking_msg');
            $orders->update();
            return redirect('vieworders')->with('success','Tracking Status Updated');
        }
        else
        {
            return redirect()->back()->with('success','order is cancelled');
        }
    }
}
