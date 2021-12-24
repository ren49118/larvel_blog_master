<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Brand;
use App\Order;
use App\Category;
use App\Subcategory;
use Auth;
class FrontendController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $counts= Item::all();
        $subcategories = Subcategory::all();
        $items = Item::orderBy('id','desc')->get();
        $its1 = Item::orderBy('id','desc')->take(3)->get();
        $its2   = Item::take(3)->get();
        $brands = Brand::orderBy('id','desc')->take(6)->get();
    	return view('frontend.home',compact('items','brands','its1','its2','categories','counts','subcategories'));
    }
    public function checkout()
    {
        return view('frontend.checkout');
    }
    public function detail($id){
        $item = Item::find($id);
        $items = Item::all();
        // dd($item);
        return view('frontend.detail',compact('item','items'));
    }
    public function orderhistory(){
        $orders = Order::where('user_id',Auth::id())->get();
        // dd($orders);
        // return redirect()->route('frontend.orderhistory',compact('orders'));
        return view('frontend.orderhistory',compact('orders'));

    }
    public function subitem($id){
        $subid = Subcategory::where('category_id',$id)->get();
        // $items = Item::all();
        $cname = Category::find($id);
        // dd($cname);
        foreach($subid as $row) {
            $items = Item::where('subcategory_id',$row->id)->get();
        }
        // dd($items);
        return view('frontend.subshow',compact('items','cname'));
    }
    public function branditem($id){
        // $items = Item::where('brand_id',$id)->get();
        $brand = Brand::find($id);
        return view('frontend.brandshow',compact('brand'));
    }
    public function bycategory($id){
        $category = Category::find($id);
        return view('frontend.bycategory',compact('category'));
    }
}
