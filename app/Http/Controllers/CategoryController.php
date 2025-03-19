<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // this function show category
    public function index(){

        $categories =Category::all();
        return view('Backend.category.index',['categories'=>$categories]);
    }

    //this method create category
    public function create(){
        return view('Backend.category.create');
    }

    //this method store categories
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required|min:3|max:255|unique:categories'
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }

        $categories=Category::create([
            'name'=>$request->name,
        ]);

        if($categories){
            return response()->json([
                'status'=>'success',
                'message'=>'Categories added successfully!'
            ]);
        }
    }

    // this method edit category 
    public function edit($id){
        $category=Category::findOrFail($id);
        return view('Backend.category.edit',['category'=>$category]);
    }

    //this function update category
    public function update(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required|min:3|max:255|unique:categories'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }

         $updateCategory=Category::find($request->id)->update([
            'name'=>$request->name,
         ]);
         if($updateCategory){
            return response()->json([
                'status'=>'success',
                'message'=>'Category Updated',
            ]);
         }
    }

    //this function show categorie list in forntend
    public function list(){
        $categories = Category::all();
        //  $blogCount=Blog::where('categorie_id','categorie_id')->count();
        //  return $blogCount;

        return view('Frontend.categorie',['categories'=>$categories]);
    }

    //this method show categories blog list
    public function categorie_single($id){
        $categorieId =Category::find($id);
        $blogCount =$categorieId->blogs()->count();
        $blogs =$categorieId->blogs()->paginate(6);
       
       
        return view('Frontend.categorieSingle',['blogs'=>$blogs,'categorieId'=>$categorieId,'blogCount'=>$blogCount]);

    }
}
