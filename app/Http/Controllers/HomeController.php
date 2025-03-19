<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //this metohd show home page
    public function index(){
        $blogs =Blog::orderBy('id','DESC')->paginate(3);
        return view('Frontend.home',['blogs'=>$blogs]);
    }

    //this method show blog details page
    public function details($id){
        $blog = Blog::findorFail($id);
        $reletedBlog=Blog::inRandomOrder()->limit(3)->get();
        return view('Frontend.details',['blog'=>$blog,'reletedBlog'=>$reletedBlog]);
    }

    //this method show blog list
    public function list(){
        $blogs =Blog::orderBy('id','DESC')->paginate(6);
        return view('Frontend.list',['blogs'=>$blogs]);
    }
}
