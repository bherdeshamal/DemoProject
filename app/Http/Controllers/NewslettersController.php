<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Newsletter;
use Mail;
use App\Mail\adminreplyback;

class NewslettersController extends Controller
{
    
    public function storesubcription(Request $request)
    {
        if($request->isMethod('post'))
        {
          $data =$request->all();

          
          $usersCount = Newsletter::where('user_email',$data['user_email'])->count();
          if($usersCount >0)
          {
            return redirect()->back()->with('error','You have already subscribe to E-Shopper');
          }
          else
          {
            $user = new Newsletter();

            $user->user_email = request('user_email');
        
            $user->save();

            return redirect()->back()->with('success','Subscription done Successfully');

         }
        }
    }

    public function display()
    {
        $category=Newsletter::latest()->paginate(3);
        return view('frontend.view-subscriptions', ['newsletters'=>$category]);
    }

    public function respond($id)
    {
        $category = Newsletter::find($id);
        return view('frontend.adminreply', compact('category'));
    }

    public function adminreply(Request $request,$id)
    {
        // $user_email = $data[user_email];
      //   'user_email' = $data[user_email];
         $msgdata=[
            'user_email' =>$request->user_email,
            '$admin_reply'=>$request->admin_reply,
         ];
         
         $newsletter = Newsletter::find($id);
        $newsletter->user_email = $request->user_email;
        $newsletter->admin_reply = $request->admin_reply;
        $newsletter->save();
         
         Mail::to('shamalbherde02@gmail.com')->send(new adminreplyback($msgdata)); 
     //  Mail::send('emails.subscription_reply',$msgdata,function($message)use($newsletter->user_email)
       //{
         //  $message->to($user_email)->subject('Thanks For Susbcription');
       //});
      
      
         Session::flash('success','Reply send Successfully.');
         return redirect('view-subscriptions');
    }
 

}
