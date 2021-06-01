<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\Product;
use App\Category;
use App\Banner;
use App\cart;
use App\User;
use App\Order;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {  
        $key = Category::select('id','name')->distinct()->get()->sortByDesc('id');
        $pkey = Product::select('id','name','price','image')->distinct()->get()->sortByDesc('id');
        $banners=Banner::where('url','1')->get();
        return view('index')->with(compact('key','pkey','banners'));
    }

    public function shop()
    {
        $key = Category::select('id','name')->distinct()->get()->sortByDesc('id');
        $pkey = Product::select('id','image')->distinct()->get()->sortByDesc('id');
        
        return view('frontend.shop',['key'=>$key],['pkey'=>$pkey]);
    }

    public function productdetail()
    {
        $key = Category::select('id','name')->distinct()->get()->sortByDesc('id');
        $pkey = Product::select('id','image','price','name')->distinct()->get()->sortByDesc('id');
        
        return view('frontend.productdetailview',['key'=>$key],['pkey'=>$pkey]);
    }

    public function blog()
    {
        $key = Category::select('id','name')->distinct()->get()->sortByDesc('id');
        $banners=Banner::where('url','1')->get();
        return view('frontend.blog')->with(compact('key','banners'));
    }

    public function dashboard()
    {  
        $key = Category::select('id','name')->distinct()->get()->sortByDesc('id');
        $pkey = Product::select('id','name','price','image')->distinct()->get()->sortByDesc('id');
        $banners=Banner::where('url','1')->get();
        return view('dashboard')->with(compact('key','pkey','banners'));
    }

    public function productshop()
    {
        $key = Category::select('id','name')->distinct()->get()->sortByDesc('id');
        $pkey = Product::select('id','image')->distinct()->get()->sortByDesc('id');
        
        return view('frontend.productshop',['key'=>$key],['pkey'=>$pkey]);
    }

    public function productdetailshopee()
    {
        $key = Category::select('id','name')->distinct()->get()->sortByDesc('id');
        $pkey = Product::select('id','image','price','name')->distinct()->get()->sortByDesc('id');
        
        return view('frontend.shopproductdetailview',['key'=>$key],['pkey'=>$pkey]);
    }

    public function viewCharts()
    {
     $current_month_users=User::whereYear('created_at',Carbon::now()->year)
                            ->whereMonth('created_at',Carbon::now()->month)->count();
                            
    $last_month_users=User::whereYear('created_at',Carbon::now()->year)
                            ->whereMonth('created_at',Carbon::now()->subMonth(1))->count();

    $last_last_month_users=User::whereYear('created_at',Carbon::now()->year)
                            ->whereMonth('created_at',Carbon::now()->subMonth(2))->count();

    $orders=Order::all()->count();

    $categories=Category::all()->count();

    $products=Product::all()->count();

    $coupons=Coupon::all()->count();

    $users=User::all()->count();

      return view('dashboard.admin')->with(compact('current_month_users','last_month_users','last_last_month_users','orders','categories','products','coupons','users'));
    }


}
