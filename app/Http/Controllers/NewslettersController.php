<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Newsletter;
use Mail;
use App\Mail\newsmail;
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

            $user_email = $request->user_email;
            $msgdata=[
               '$user_email' =>$request->user_email,
               '$admin_reply'=>$request->admin_reply,
            ];
            
            Mail::send('emails.subscription_reply',$msgdata,function($message)use($user_email)
            {
                $message->to($user_email)->subject('Thanks For Subscription');
            });
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
      $user_email = $request->user_email;
         $msgdata=[
            '$user_email' =>$request->user_email,
            '$admin_reply'=>$request->admin_reply,
         ];
         
        $newsletter = Newsletter::find($id);
        $newsletter->user_email = $request->user_email;
        $newsletter->admin_reply = $request->admin_reply;
        $newsletter->save();
         
      Mail::to('shamalbherde02@gmail.com')->send(new adminreplyback($msgdata)); 
     
      Mail::send('emails.subscription_reply',$msgdata,function($message)use($user_email)
       {
           $message->to($user_email)->subject('Thanks For Susbcription');
       });
      
         Session::flash('success','Reply send Successfully.');
         return redirect('view-subscriptions');
    }
 
    public function sendreply()
    {
      $user = Newsletter::all();
      return view('frontend.sendreply',compact('user'));
    }

    public function sendupdate(Request $request)
    {

      if($request->isMethod('post'))
      {
        $data =$request->all();

          $user_email = $request->user_email;
          $admin_reply = $request->admin_reply;
            $data=[
                'user_email' =>$user_email,
                'admin_reply'=>$admin_reply,
            ];
          
          $user = Newsletter::all();
          foreach ($user as $a)
          {
           // Mail::to('$a->user_email')->send(new newsmail($data));
            Mail::send('emails.updates',$data,function($message)use($a)
              {
                  $message->to($a->user_email)->subject('New Updates From E-Comm Website');
              });

          }
      }
      Session::flash('success','Reply send Successfully.');
      return redirect('view-subscriptions');
    }

    public function deletesubscription($id)
    {
      $banner = Newsletter::find($id);
	    $banner->delete();
      
     
      Session::flash('danger','Subscriber deleted Successfully.');

      return redirect('view-subscriptions');
    }
}
