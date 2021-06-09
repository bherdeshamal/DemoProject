<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userm;
use App\Order;
use Carbon\Carbon;
use App\User;
use App\Role;

class usermscontroller extends Controller
{
     
    public function createp()
    {
       return view('usermanage.usermanage');
    }

    public function storeDevice(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
        'lname' => 'required',
        'email' => 'email',
        'pass' => 'min:8|max:12|required_with:cpass|same:cpass',
        'cpass' => 'min:8',
        'status' => 'required',
        'rolename' => 'required',
          ]);
        $user = new Userm();

        $user->name = request('name');
        $user->lname = request('lname');
        $user->email = request('email');
        $user->pass = request('pass');
        $user->cpass = request('cpass');
        $user->status = request('status');
        $user->rolename = request('rolename');
      
        $user->save();
        return redirect('/userview')->with('success','User Inserted Successfully');

    }

    public function indexc()
    {
       $user = Userm::latest()->paginate(5);
     //  $user = Userm::leftJoin('roles AS b', 'userms.rolename', '=', 'b.id')
       //             ->select('userms.id','userms.name','userms.lname','userms.email','userms.pass','userms.cpass','userms.status','userms.rolename','b.name as rolename')
         //           ->orderBy('userms.id', 'DESC')
           //         ->paginate(5);
        return view('usermanage.userview', ['userms'=>$user]);
    }

    public function edituser($id)
    {
        $user = Userm::find($id);
        $key=Role::select('id','name')->distinct()->get();
       return view('usermanage.edit', compact('user'),['key'=>$key]);
    }

    public function updateuser(Request $request,$id)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
        'lname' => 'required',
        'email' => 'email',
        'pass' => 'min:8|max:12|required_with:cpass|same:cpass',
        'cpass' => 'min:8',
        'status' => 'required',
        'rolename' => 'required',
          ]);

      $user = Userm::find($id);
      $user->name = $request->name;
      $user->lname = $request->lname;
      $user->email = $request->email;
      $user->pass = $request->pass;
      $user->cpass = $request->cpass;
      $user->status = $request->status;
      $user->rolename = $request->rolename;
     
      $user->save();
      return redirect('userview')->with('success','User Updated Successfully');
									
    }


    public function deleteuser($id)
    {
       
       $user = Userm::find($id);
	     $user->delete();
     
       return redirect('userview')->with('danger','User deleted Successfully');
    }

    public function viewUsersCharts()
    {
     $current_month_users=User::whereYear('created_at',Carbon::now()->year)
                            ->whereMonth('created_at',Carbon::now()->month)->count();
                            
    $last_month_users=User::whereYear('created_at',Carbon::now()->year)
                            ->whereMonth('created_at',Carbon::now()->subMonth(1))->count();

    $last_last_month_users=User::whereYear('created_at',Carbon::now()->year)
                            ->whereMonth('created_at',Carbon::now()->subMonth(2))->count();


      return view('usermanage.view_users_charts')->with(compact('current_month_users','last_month_users','last_last_month_users'));
    }

    public function charts()
    {

      $current_month_users=Order::whereYear('created_at',Carbon::now()->year)->whereMonth('created_at',Carbon::now()->month)->count();

      return view('usermanage.charts')->with(compact('current_month_users'));
    }
}
