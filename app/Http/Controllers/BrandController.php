<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands =Brand::orderBy('id','desc')->get();
        return view('backend.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "photo"=>"required"
        ]);

        //upload
        if($request->file()){
            $filename = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('brandimg',$filename,'public');
            $path = '/storage/'.$filePath;  
        }
        // $path = 'File path';

        //store
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->photo = $path;
        $brand->save();
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //

        return view('backend.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            "name"=>"required",
            "newphoto"=>"sometimes",
            "oldphoto"=>"required"
        ]);

        //upload
        if($request->file()){
            $filename = time().'_'.$request->newphoto->getClientOriginalName();
            $filePath = $request->file('newphoto')->storeAs('brandimg',$filename,'public');
            $path = '/storage/'.$filePath;  
        }else{
            $path = $request->oldphoto;
        }
        // $path = 'File path';

        //store
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->photo = $path;
        $brand->save();
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
