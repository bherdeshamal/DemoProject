<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;
use App\Mail\adminmail;
use App\contact;

class admincontactcontroller extends Controller
{
    public function admincontactus()
    {
        return view('ad.adminncontactus');
    }

    public function sendadmin(Request $request)
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

        Mail::to('shamalbherde02@gmail.com')->send(new adminmail($data)); 
        $category = new contact();
        $category->name = request('name');
        $category->email = request('email');
        $category->message = request('message');
        $category->save();

        return redirect('/contactview')->with('success', 'Details are updated');
    }

    
    public function display()
    {
        $category = contact::latest()->paginate(5);
        return view('frontend.contactview', ['contacts'=>$category]);

    }
}
