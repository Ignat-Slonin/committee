<?php

namespace App\Http\Controllers\Auth;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;    

use App\Http\Requests;

class AppController extends Controller
{
    public function  getAdminDashboard(){
        return view('admin.dashboard');
    }

    public function getAdminPage()
    {
        $users=User::all();
        return view('admin.user',['users'=>$users]);
    }


    public function destroy($id)
    {
        $primary=User::find($id);
        $primary->roles()->detach();
        $primary->delete();
        return back()->with('message','Пользователь удален');
    }

    public function postAdminAssignRoles(Request $request)
    {
        $user=User::where('email',$request['email'])->first();
        $user->roles()->detach();
        if($request['role_primary']){
            $user->roles()->attach(Role::where('name','primary')->first());
        }
        if($request['role_basic']){
            $user->roles()->attach(Role::where('name','basic')->first());
        }
        if($request['role_admin']){
            $user->roles()->attach(Role::where('name','admin')->first());
        }
        return redirect()->back();
    }
}
