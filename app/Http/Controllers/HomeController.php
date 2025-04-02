<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Reply;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //this metohd show home page
    public function index(){
        $blogs =Blog::orderBy('id','DESC')->paginate(3);
        return view('Frontend.home',['blogs'=>$blogs]);
    }

    //this method show blog details page
    public function details($id){
        $blog = Blog::with(['comments'=>function($query){
            $query->where('status',1)->orderBy('created_at','desc')->with('replies');
        }])->findorFail($id);
        $reletedBlog=Blog::inRandomOrder()->limit(3)->get();
        return view('Frontend.details',['blog'=>$blog,'reletedBlog'=>$reletedBlog]);
    }

    //this method show blog list
    public function list(){
        $blogs =Blog::orderBy('id','DESC')->paginate(6);
        return view('Frontend.list',['blogs'=>$blogs]);
    }


    //this method store comment
    public function comment_store(Request $request){
        $request->validate([
            'comment'=>'required|min:3|max:255'
        ]);

        $comments=Comment::create([
            'comment'=>$request->comment,
            'user_id'=>Auth::user()->id,
            'blog_id'=>$request->blog_id,
        ]);

        if($comments){
            return redirect()->route('home.detail',$request->blog_id)->with('success','comment added success! please wait for admin approve!');
        }
    }

    //this method store user replay
    public function store_reply(Request $request){
        $request->validate([
            'title'=>'required:min:3|max:255'
        ]);

        // dd($request->comment_id);
        $replay=Reply::create([
            'title'=>$request->title,
            'user_id'=>Auth::user()->id,
            'comment_id'=>$request->comment_id
        ]);

        if($replay){
            return redirect()->route('home.detail',$request->blog_id)->with('success','Reply add Success');
        }
    }
}
