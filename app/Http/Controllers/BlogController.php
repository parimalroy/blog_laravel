<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{
    // this method show blog list
    public function index(){
        return view('Backend.blog.index');
    }

    //this function show create page
    public function create(){
        $categories = Category::get();
        return view('Backend.blog.create',['categories'=>$categories]);
    }

    //this mehtod store blog post

    public function store(Request $request){
        $request->validate([
            'title'=>'required|min:5|max:255',
            'author'=>'required',
            'photo'=>'required|mimes:jpg, png, jpeg',
            'content'=>'required|min:10|',
            'categorie_id'=>'required',
        ]);

        $path=$request->photo->store('image','public');
        $blogs = Blog::create([
            'title'=>$request->title,
            'author'=>Auth::user()->name,
            'photo'=>$path,
            'content'=>$request->content,
            'categorie_id'=>$request->categorie_id,
        ]);

        if($blogs){
            return redirect()->route('blog.create')->with('success','Blog added Success!');
        }
    }
}
