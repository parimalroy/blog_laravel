<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class BlogController extends Controller
{
    // this method show blog list
    public function index(Request $request){
        $blogs =Blog::with('users')->where('user_id',Auth::user()->id)->orderBy('id','DESC');
        if(!empty($request->keyword)){
            $blogs->where('title','like','%'.$request->keyword.'%');
        }
        $blogs=$blogs->paginate(10);
        return view('Backend.blog.index',['blogs'=>$blogs]);
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
            'photo'=>'required|mimes:jpg, png, jpeg|max:3000',
            'content'=>'required|min:10|',
            'categorie_id'=>'required',
        ]);

        $path=$request->photo->store('image','public');
        $blogs = Blog::create([
            'title'=>$request->title,
            'author'=>Auth::user()->name,
            'photo'=>$path,
            'content'=>$request->content,
            'user_id'=>Auth::user()->id,
            'categorie_id'=>$request->categorie_id,
        ]);

        if($blogs){
            return redirect()->route('blog.create')->with('success','Blog added Success!');
        }
    }

    //this method show edit blog
    public function edit($id){

        //authorize user
        $blog = Blog::findOrFail($id);
        $targetUser=$blog->user_id;
        Gate::authorize('blog-access',$targetUser);

        $categories = Category::get();
        return view('Backend.blog.edit',['blog'=>$blog,'categories'=>$categories]);
    }

    //this method update blog
    public function update(Request $request){
        $request->validate([
            'title'=>'required|min:5|max:255',
            // 'author'=>'required',
            'photo'=>'mimes:jpg, png, jpeg|max:3000',
            'content'=>'required|min:10',
            'categorie_id'=>'required'
        ]);

        //authorize user
        $blog = Blog::find($request->id);
        $targetUser=$blog->user_id;
        Gate::authorize('blog-access',$targetUser);

        
        $photoStoreage = public_path('storage/'.$blog->photo);
        
        if(file_exists($photoStoreage)){
            @unlink($photoStoreage);
        }

        if($request->hasFile('photo')){
            $path=$request->photo->store('image','public');
            $blog->photo=$path;
            $blog->save();
        }
        $blog->title=$request->title;
        // $blog->author=Auth::user()->name;
        $blog->content=$request->content;
        $blog->categorie_id=$request->categorie_id;
        $blog->save();

        if($blog){
            return redirect()->route('blog.edit',$request->id)->with('success','blog updated successfully!');
        }
    }

    //this method delete blog
    public function destory($id){
        $deletedId =Blog::find($id)->delete();
        if($deletedId){
            return response()->json([
                'status'=>'success',
                'message'=>'Data Deleted Successfully'
            ]);
            return response()->json([
                'status'=>'error',
                'message'=>'data not found'
            ],404);
        }
    }
}
