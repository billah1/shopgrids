<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public  function index(){
        return view('backend.subcategory.index',[
            'categories' => Category::all()
        ]);
    }
    public function manage(){

       return view('backend.subcategory.manage',[
           'subcategories' => SubCategory::all()
       ]);
    }
    public function store(Request $request){
        SubCategory::newSubCategory($request);
        return redirect('/subcategory/manage')->with('message', 'Sub category info create successfully.');
    }
    public function edit($id){
        return view('backend.subcategory.edit', [
            'categories'    => Category::all(),
            'subcategory'  => SubCategory::find($id),
        ]);
    }
    public function update(Request $request, $id){
        SubCategory::updatedSubCategory($request, $id);
        return redirect('/subcategory/manage')->with('message', 'Sub category info update successfully.');

    }
    public function delete($id){
        SubCategory::deleteSubCategory($id);
        return redirect('/subcategory/manage')->with('message', 'Sub category info delete successfully.');

    }
}
