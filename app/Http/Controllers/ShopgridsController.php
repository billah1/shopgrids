<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopgridsController extends Controller
{
    public  function index(){
        return view('frontend.home.home',[
            'products' => Product::orderBy('id','desc')->take('8')->get(['id','category_id','name','selling_price','image']),
        ]);
    }

    public  function category($id){
        return view('frontend.category.index',[
            'products' =>Product::where('category_id',$id)->orderBy('id','desc')->get()
        ]);
    }
    public  function details ($id){
        return view('frontend.details.index',['product' =>Product::find($id)]);
    }
}
