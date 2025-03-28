<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //this method show user list
    public function index(){
        $users=User::orderBy('created_at','DESC')->get();
        return view('Backend.user.index',['users'=>$users]);
    }

    //this function edit user role
    public function edit($id){
        $user=User::findOrFail($id);
        return view('Backend.user.edit',['user'=>$user]);
    }

    //this function update user role
    public function update(Request $request){
        $request->validate([
            'role'=>'required'
        ]);

        $user=User::find($request->id);
        $user->update([
            'role'=>$request->role
        ]);

        if($user){
            return redirect()->route('user.edit',$request->id)->with('success','Role Updated !');
        }
    }
}
