<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;
use App\User;
use App\Frontenduserlogin;
use App\UserAddress;

class UserAddressController extends Controller
{
  public function account(Request $request)
  {
    $user_id = Auth::User()->id;
    $userDetails= User::find($user_id);
   //echo "<pre>"; print_r($userDetails); die;
    
   if($request->isMethod('post'))
   {
      $data=$request->all();
     // echo "<pre>"; print_r($data); die;

     if(empty($data['name']))
     {
       return redirect()->back()->with('success','Please Enter Your Name');
     }

     if(empty($data['address']))
     {
       return redirect()->back()->with('success','Please Enter Your Address');
     }
     if(empty($data['city']))
     {
       return redirect()->back()->with('success','Please Enter Your City');
     }
     if(empty($data['state']))
     {
       return redirect()->back()->with('success','Please Enter Your State');
     }
     if(empty($data['country']))
     {
       return redirect()->back()->with('success','Please Enter Your Country');
     }
     if(empty($data['pincode']))
     {
       return redirect()->back()->with('success','Please Enter Your Pincode');
     }
     if(empty($data['mobile']))
     {
       return redirect()->back()->with('success','Please Enter Your Mobile');
     }
       $user=User::find($user_id);

       $user->name= $data['name'];
       $user->address= $data['address'];
       $user->city= $data['city'];
       $user->state= $data['state'];
       $user->country= $data['country'];
       $user->pincode= $data['pincode'];
       $user->mobile= $data['mobile'];
       $user->save();
       return redirect()->back()->with('success', 'Account Updated Successfully');

   }

    return view('frontend.account')->with(compact('userDetails'));
     
  }
   
    public function chkUserPassword(Request $request)
    {
      if($request->isMethod('post'))
      {
       $data=$request->all();
       $current_pwd = $data['current_pwd'];
       $user_id = Auth::User()->id;
       $check_password = User::where('id','$user_id')->first();
       if(Hash::check($current_pwd,$check_password->password))
       {
          echo "true";die;
       }
       else
       {
         echo "false";die;
       }
      
        return redirect('/account')->with('success','User Password Updated Successfully');
    }
  }

    public function updatePassword(Request $request)
    {
      if($request->isMethod('post'))
      {
        $data=$request->all();

        $old_pwd = User::where('id',Auth::User()->id)->first();
        $current_pwd = $data['current_pwd'];

       if(Hash::check($current_pwd,$old_pwd->password))
       {
         $new_pwd=bcrypt($data['new_pwd']);

         User::where('id',Auth::User()->id)->update(['password'=>$new_pwd]);
         return redirect()->back()->with('success','Password Updated Successfully');
     
       }
       else
       {
        return redirect()->back()->with('success','Password Is Incorrect');
       }
      }
    }
}