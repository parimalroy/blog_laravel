<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //this method show register page

    public function register(){
        return view('Backend.account.register');
    }

    // this method register user
    public function register_store(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:255',
            'email'=>'required|unique:users|email',
            'password'=>'required|confirmed|min:8',
        ]);

       $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'created_at	'=>time(),
            'updated_at	'=>time()
        ]);

        if($user){
            return redirect()->route('register.index')->with('success','Registerd Success!');
        }
    }


    //this method show login page
    public function login(){
        return view('Backend.account.login');
    }

    //this mehtod check user
    public function login_store(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('profile.index');

        }else{
            return redirect()->route('login.index')->with('error','Creditional not match');
        }
    }

    //this method use for logout

    public function destory(){
        Auth::logout();
        return redirect()->route('login.index')->with('success','Logout Successfully');
    }

    // this method show profile

    public function profile_index(){
        return view('Backend.account.profile.index');
    }
}
