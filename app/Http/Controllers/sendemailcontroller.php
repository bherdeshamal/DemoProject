<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use App\Mail\sendmail;
use Session;
use App\Mail\replyback;
use App\contact;

class sendemailcontroller extends Controller
{
    public function contactus()
    {
        return view('frontend.contactus');
    }

   
    public function send(Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
            'email' =>'required|email',
            'message' =>'required'
        ]);

        $data= array(
            'name' =>$request->name,
            'email' =>$request->email,
            'message'=>$request->message
        );

        Mail::to('shamalbherde02@gmail.com')->send(new sendmail($data));

        $category = new contact();
        $category->name = request('name');
        $category->email = request('email');
        $category->message = request('message');
        $category->save();

        return back()->with('success', 'Thanks Your Details Are Send To Admin');
    }

    public function display()
    {
        $category = contact::all()->sortByDesc("id");
        return view('frontend.contactview', ['contacts'=>$category]);

    }

    public function revertBack($id)
    {
        $category = contact::find($id);
        return view('frontend.revert-back', compact('category'));
    }

    public function sendreply(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' =>'required|max:255',
            'reply' =>'required|max:255'
              ]);
         $categoryData = contact::find($id);

         $data= array(
            'name' =>$request->name,
            'email' =>$request->email,
            'reply'=>$request->reply,
        );

        
        $categoryData->name = $request->name;
        $categoryData->email = $request->email;
        $categoryData->reply = $request->reply;
        $categoryData->save();
         
         Mail::to('shamalbherde02@gmail.com')->send(new replyback($data)); 
      
         Session::flash('success','Reply send Successfully.');
         return redirect('contactview');
    }
}
