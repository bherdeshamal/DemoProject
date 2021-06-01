<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Product;
use App\Coupon;
use Auth;
use App\Category;
use App\User;
use App\UserAddress;
use App\Carrt;
use App\Wishlist;
use Carbon\Carbon;
use DB;

class ProductsController extends Controller
{
    public function createproduct()
    {   
        $key = Category::select('id','name')->distinct()->get();
        return view('products.product',['key'=>$key]);
    }

    public function storeDevice(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'image' => 'required|image|mimes:png,jpeg,gif',
            'productcategory' => 'required',
              ]);
        $uploadImage='';
        $product = new Product();
        $product->name = request('name');
		$product->price = request('price');
        if($files=$request->file('image'))
        {
            $dest= public_path('/pimg/');
            $img=date('YmdHis').".".$files->getClientOriginalExtension();
            $files->move($dest,$img);
            $uploadImage=$img;
        }
        $product->image=$uploadImage;
		$product->productcategory = request('productcategory');
        $product->save();
        Session::flash('success','Products Inserted Successfully.');

        return redirect('/productview');

    }

    public function indexproduct()
    {
     //$products = Product::all()->sortByDesc('id');
     $products = Product::leftJoin('categories AS b', 'products.productcategory', '=', 'b.id')
                    ->select('products.id','products.name','products.price','products.image','b.name as productcategory')
                    ->orderBy('products.id', 'DESC')
                    ->paginate(3);

     return view('products.productview', ['products'=>$products]);
    }

    public function editproduct($id)
    {
        $product = Product::find($id);
        $key=Category::select('id','name')->distinct()->get();
        $productsData = Product::leftJoin('categories AS b', 'products.productcategory', '=', 'b.id')
                        ->select('products.id','products.name','b.name as productcategory')->orderBy('products.id', 'DESC')
                        ->get()->toArray();
        return view('products.edit', compact('product'),['key'=>$key],['productsData'=>$productsData[0]]);
    }
    
    public function updateproduct(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'image' => 'required|image|mimes:png,jpeg,jpg,gif',
            'productcategory' => 'required',
              ]);
        $uploadImage='';
      $categoryData = Product::find($id);
      $categoryData->name = $request->name;
      $categoryData->price = $request->price;
      if($files=$request->file('image'))
          {
              $dest= public_path('/pimg/');
              $img=date('YmdHis').".".$files->getClientOriginalExtension();
              $files->move($dest,$img);
              $uploadImage=$img;
              $categoryData->image=$uploadImage;
          }
          $categoryData->image = $uploadImage;

      $categoryData->productcategory = $request->productcategory;
      $categoryData->save();
      Session::flash('success','Products Updated Successfully.');


      return redirect('productview');
									
    }

    public function deleteproduct($id)
    {
       $order = Carrt::with('products')->count();
      // $countProducts=Carrt::where('product_id',$product_id)->count();
       if($order>0)
       {
        return redirect()->back()->with('success','Product exists in cart');
       }   
       else
       {
        $categoryData = Product::find($id);
        $categoryData->delete();
 
       }      
       Session::flash('danger','Product deleted Successfully.');

       return redirect('productview');
    }

    public function productdetail($id=null)
    {
       
        $key = Category::select('id','name')->distinct()->get()->sortByDesc('id');
       // $pkey =Product::where('id',$id)->first();
       $pkey=Product::find($id); 
     
       return view('frontend.productdetail',['pkey'=>$pkey],['key'=>$key]);
    }

    public function detail($id=null)
    {
       
        $key = Category::select('id','name')->distinct()->get()->sortByDesc('id');
       // $pkey =Product::where('id',$id)->first();
       $pkey=Product::find($id); 
     
       return view('frontend.detail',['pkey'=>$pkey],['key'=>$key]);
    }

    public function addtocart(Request $request)
    {
        Session :: forget('CouponAmount');
        Session :: forget('CouponCode');
        $data=$request->all();
      //  echo "<pre>"; print_r($data); die;

      $quantity='';
        if(!empty($data['wishlistButton']) && $data['wishlistButton'] == "Wish list")
        {
           // echo "hi"; die;

                $productPrice=Product::where(['name'=>$data['name']])->first();
                echo $product_Price= $productPrice->price;

                $user_email = Auth::User()->email;

                $quantity = 1;

                $created_at = Carbon::now();

                $whislistcount=Wishlist::where(['user_email'=>$user_email , 'product_id'=>$data['product_id']])->count();
                if($whislistcount>0 )
                {
                    return redirect()->back()->with('success','Product Already Exists in Wishlist');
                }
                else
                {
                $wish = new Wishlist();
                $wish->product_id = $data['product_id'];
                $wish->name = $data['name'];
                $wish->price = $data['price'];
                $wish->quantity = $data['quantity'];
                $wish->user_email = $user_email;
                $wish->created_at = $created_at;
                $wish->save();

                return redirect('wishlist')->with('success','product successfully added in wishlist');
                }
        }
        else
        {
           // echo "bye" ;die;
                if(empty(Auth::user()->email))
                {
                    $data['user_email']='';
                }
                else{
                    $data['user_email']=Auth::user()->email;
                }

                $session_id = Session::get('session_id');
                    
                if(empty($session_id))
                {
                    $session_id = str_random(40);
                    Session::put('session_id',$session_id);
                }

                $countProducts=DB::table('carrts')->where(['product_id'=>$data['product_id'],'session_id'=>$session_id])->count();
                // die;

                //echo $countProducts ; die;

                if($countProducts>0)
                {
                    return redirect()->back()->with('success','Product already exists in cart');
                }
                else
                {
                // DB::table('carrts')->insert(['product_id'=>$data['product_id'],'name'=>$data['name'],'price'=>$data['price'],'quantity'=>$data['quantity'],'user_email'=>$data['user_email'],'session_id'=>$data['session_id']]);
                // die;

                $cart = new Carrt();
                $cart->product_id = request('product_id');
                $cart->name = request('name');
                $cart->price = request('price');
                $cart->quantity = request('quantity');
                $cart->user_email = $data['user_email'];
                $cart->session_id = $session_id;
                $cart->save();

                }
                return redirect('cart')->with('success','Product successfully added to cart');
      }
   
    }

    public function cart()
    {
            $session_id = Session::get('session_id');
            $userCart = Carrt::where(['session_id'=>$session_id])->get();

            foreach($userCart as $key => $product)
            {
                $pkey = Product::where('id',$product->product_id)->first();
                $userCart[$key]->image= $pkey->image;
            }

        return view('frontend.detail_cart')->with(compact('userCart'));
    }

    public function updatecartquantity($id=null,$quantity=null)
    {
        $userquantity = Carrt::where('id',$id)->increment('quantity',$quantity);
        return redirect('cart')->with('success','Product Quantity has been updated successfully');
    }

    public function deletecartitem($id=null)
    {
        $userCart= Carrt::where('id',$id)->delete();
        return redirect('cart')->with('success','Product Removed from cart');
    }

    public function applycoupon(Request $request)
    {
        Session :: forget('CouponAmount');
        Session :: forget('CouponCode');
     

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
        //$total_amount=0;
        $expiry_date = $couponDetails->expiry_date;
        $cur_date = date('Y-m-d');
        if($expiry_date < $cur_date)
        {
            return redirect()->back()->with('success','Coupon is Expired');
        }
 
        $session_id = Session::get('session_id');
        $userCart = Carrt::where(['session_id'=>$session_id])->get();
        $total_amount = 0 ;
        foreach($userCart as $item)
        {
           $total_amount = $total_amount + ($item->price* $item->quantity);
        }
        
        if($couponDetails ->amount_type=="Amount")
        {
            $couponAmount = $couponDetails->amount;
        }
        else
        {
            $couponAmount = $total_amount *($couponDetails->amount/100);
        }
      
        Session :: put('CouponAmount',$couponAmount);
        Session :: put('CouponCode',$data['coupon_code']);
     
        return redirect()->back()->with( 'success','Coupon code is succesfully applied to available discount');
    }

    public function wishlist()
    {
        $user_email = Auth::User()->email;
        $userWishlist = Wishlist::where('user_email',$user_email)->get();

        foreach($userWishlist as $key => $product)
        {
            $pkey = Product::where('id',$product->product_id)->first();
            $userWishlist[$key]->image= $pkey->image;
        }

        return view('frontend.wishlist')->with(compact('userWishlist'));
    }

    public function deletewishlistitem($id=null)
    {
        $userCart= Wishlist::where('id',$id)->delete();
        return redirect('wishlist')->with('success','Product has been deleted from Wishlist');
    }
   
}
