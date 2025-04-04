<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AccountController extends Controller
{
    // this method show register page

    public function register() {
        return view('Backend.account.register');
    }

    // this method register user
    public function register_store(Request $request) {
        $request->validate([
            'name'     =>'required|min:3|max:255',
            'email'    =>'required|unique:users|email',
            'password' =>'required|confirmed|min:8',
        ]);

       $user= User::create([
            'name'       =>$request->name,
            'email'      =>$request->email,
            'password'   =>$request->password,
            'created_at	' =>time(),
            'updated_at	' =>time()
        ]);

        if ($user) {
            return redirect()->route('register.index')->with('success', 'Registerd Success!');
        }
    }

    // this method show login page
    public function login() {
        return view('Backend.account.login');
    }

    // this mehtod check user
    public function login_store(Request $request) {
        $request->validate([
            'email'    =>'required|email',
            'password' =>'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(isset($request->remember) && !empty($request->remember)){
                setcookie('email',$request->email,time()+60);
                setcookie('password',$request->password,time()+60);
            }else{
                setcookie('email','');
                setcookie('password','');
            }
            return redirect()->route('profile.index');
        } else {
            return redirect()->route('login.index')->withInput()->with('error', 'Creditional not match');
        }
    }

    // this method use for logout

    public function destory() {
        Auth::logout();
        return redirect()->route('login.index')->with('success', 'Logout Successfully');
    }

    // this method show profile

    public function profile_index() {
        if (Gate::allows('superAdmin-admin')) {
            $users=User::count();
            $comments=Comment::count();
            $blogs=Blog::count();
            $categorie=Category::count();
        } else
        {
            $users=User::count();
            $comments=Comment::with('users')->where('user_id', Auth::user()->id)->count();
            $blogs=Blog::with('users')->where('user_id', Auth::user()->id)->count();
            $categorie=Category::count();
    }
        // dd($comment);
        return view('Backend.account.profile.index',[
            'users'     =>$users,
            'comments'  =>$comments,
            'blogs'     =>$blogs,
            'categorie' =>$categorie,
        ]);
    }

    // this method edit user info
    public function profile_edit() {
        $users=User::findOrFail(Auth::user()->id);
        // dd($user);
        return view('Backend.account.profile.edit', ['users'=>$users]);
    }

    // this method update pforile data

    public function profile_update(Request $request) {
        $request->validate([
            'name'  =>'required|min:3|max:255',
            'email' =>'required',
            'photo' =>'mimes:jpg, png, jpeg|max:3000'
        ]);

        $users = User::find(Auth::user()->id);
        if ($request->hasFile('photo')) {
        $storageImage=public_path('storage/').$users->photo;
        if (file_exists($storageImage)) {
            @unlink($storageImage);
        }

        
            $path=$request->photo->store('image', 'public');
            $users->photo=$path;
            $users->save();
        }
        $users->name=$request->name;
        $users->email=$request->email;
        $users->save();

        if ($users) {
            return redirect()->route('profile.edit')->with('success', 'Profile Updated !');
        }
    }

     // this function show all comment list for admin
     public function comment_index() {
        $comments = Comment::all();
        return view('Backend.comment.index', ['comments'=>$comments]);
     }

     // this method edit comment 
     public function comment_edit($id) {
        $comment =Comment::findOrFail($id);
        return view('Backend.comment.edit', ['comment'=>$comment]);
    }

    // this method update comment and status for admin
    public function comment_update(Request $request) {
        $request->validate([
            'comment' =>'required|min:3|max:255',
            'status'  =>'required'
        ]);

        $comment=Comment::find($request->id);
        $comment->update([
            'comment' =>$request->comment,
            'status'  =>$request->status
        ]);

        if ($comment) {
            return redirect()->route('comment.edit', $request->id)->with('success', 'comment Updated !');
        }
    }
}