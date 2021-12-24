<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        //validation
        $request->validate([
            "name"=>"required",
            "photo"=>"required"
        ]);

        //upload
        if($request->file()){
            $filename = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('categoryimg',$filename,'public');
            $path = '/storage/'.$filePath;  
        }
        // $path = 'File path';

        //store
        $category = new Category;
        $category->name = $request->name;
        $category->photo = $path;
        $category->save();
        return redirect()->route('categories.index');
        //return
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('backend.categories.show');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // dd($category);
        // $category = Category::find($category);
        return view('backend.categories.edit',compact('category')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "name"=>"required",
            "newphoto"=>"sometimes",
            "oldphoto"=>"required"
        ]);
        //upload
        if($request->file()){
            $filename = time().'_'.$request->newphoto->getClientOriginalName();
            $filePath = $request->file('newphoto')->storeAs('categoryimg',$filename,'public');
            $path = '/storage/'.$filePath;  
        }else{
            $path = $request->oldphoto;
        }
        $category->name = $request->name;
        $category->photo = $path;
        $category->save();
        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
