<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuration;

class ConfigurationController extends Controller
{
    public function createconfiguration()
	{
        return view('configurations.configure');
    }

    public function storeconfiguration(Request $request)
    {
        $this->validate($request, [
            'email' => 'email',
            'notification_email' =>'email',
              ]);
        $configure = new Configuration();
        $configure->email = request('email');
        $configure->notification_email = request('notification_email');
        $configure->save();
        return redirect('/configureview')->with('success','New Configuration Set Successfully');
		
    }
    public function indexconfiguration()
    {
	    $configure = Configuration::latest()->paginate(4);
        return view('configurations.configureview', ['configurations'=>$configure]);
    }

    public function editconfiguration($id)
    {
		$configure = Configuration::find($id);
        return view('configurations.edit', compact('configure'));
    }

    public function updateconfiguration(Request $request,$id)
    {
        $this->validate($request, [
            'email' => 'email',
            'notification_email' =>'email',
              ]);
         $configure = Configuration::find($id);
         $configure->email = $request->email;
         $configure->notification_email = $request->notification_email;
         $configure->save();
         return redirect('configureview')->with('success','Configuration Updated Successfully');
    }

    public function deleteconfiguration($id)
    {
        $configure = Configuration::find($id);
		$configure->delete();
        return redirect('configureview')->with('danger','Configuration deleted Successfully');
    }
    
}
