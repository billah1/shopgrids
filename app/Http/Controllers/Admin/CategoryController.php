<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        return view('backend.category.index');
    }
    public  function manage(){
        return view('backend.category.manage',[
            'categories'=> Category::all(),
        ]);
    }
    public function store(Request $request)
    {
        Category::newCategory($request);
        return redirect('/category/manage')->with('message', 'Category info create successfully.');
    }
    public function edit($id){
        return view('backend.category.edit',[
            'category' => Category::find($id)
        ]);
    }
    public function update(Request $request,$id){
        Category::updatedCategory($request, $id);
        return redirect('/category/manage')->with('message', 'Category info update successfully.');
    }
    public function delete($id)
    {
        Category::deleteCategory($id);
        return redirect('/category/manage')->with('message', 'Category info delete successfully.');
    }

}
