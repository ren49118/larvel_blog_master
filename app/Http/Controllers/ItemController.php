<?php

namespace App\Http\Controllers;

use App\Item;
use App\Brand;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('id','desc')->get();
        return view('backend.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::All();
        $brands = Brand::All();
        return view('backend.items.create',compact('subcategories','brands'));
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
          $request->validate([
            "name"=>"required",
            "photo"=>"required",
            "codeno"=>"required",
            "price"=>"required",
            "subcategory_id"=>"required",
            "brand_id"=>"required"

        ]);
          //upload
        if($request->file()){
            $filename = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('itemimg',$filename,'public');
            $path = '/storage/'.$filePath;  
        }
          $item = new Item;
          $item->name = $request->name;
          $item->photo = $path;
          $item->codeno = $request->codeno;
          $item->price = $request->price;
          $item->discount = $request->discount;
          $item->subcategory_id = $request->subcategory_id;
          $item->brand_id = $request->brand_id;
          $item->description = $request->description;
          $item->save();
          return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('backend.items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        $brands = Brand::All();
        $subcategories = Subcategory::All();
        return view('backend.items.edit',compact('item','brands','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
         $request->validate([
            "name"=>"required",
            "newphoto"=>"sometimes",
            "codeno"=>"required",
            "price"=>"required",
            "subcategory_id"=>"required",
            "brand_id"=>"required"

        ]);
          //upload
        if($request->file()){
            $filename = time().'_'.$request->newphoto->getClientOriginalName();
            $filePath = $request->file('newphoto')->storeAs('itemimg',$filename,'public');
            $path = '/storage/'.$filePath;  
        }else{
            $path = $request->oldphoto;
        }
          // $item = new Item;
          $item->name = $request->name;
          $item->photo = $path;
          $item->codeno = $request->codeno;
          $item->price = $request->price;
          $item->discount = $request->discount;
          $item->subcategory_id = $request->subcategory_id;
          $item->brand_id = $request->brand_id;
          $item->description = $request->description;
          $item->save();
          return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }
}
