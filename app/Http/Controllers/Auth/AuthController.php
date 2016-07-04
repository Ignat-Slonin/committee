<?php

namespace App\Http\Controllers\Auth;
use App\Role;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

    class AuthController extends Controller
{
    

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

   
    protected $redirectTo = '/';

   
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

   
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'id_ExecutiveCommitteePrimary' => 'required|max:255',
        ]);
    }

   
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'id_ExecutiveCommitteePrimary' => $data['id_ExecutiveCommitteePrimary'],
         
        ]);

        
    }




//    public function postSignUp(Request $request){
//        $user = new User();
//        $user->name = $request['name'];
//        $user->password = $request['password'];
//        $user->email = $request['email'];
//        $user->id_ExecutiveCommitteePrimary = $request['id_ExecutiveCommitteePrimary'];
//        $user->save();
//        $user->roles()->attach(Role::where('name','primary')->first());
//        Auth::login($user);
//        return redirect()->route('main');
//    }
//    
    
}
