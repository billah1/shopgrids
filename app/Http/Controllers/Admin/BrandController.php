<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('backend.brand.index');
    }


    public function manage()
    {
        return view('backend.brand.manage', ['brands' => Brand::all()]);
    }
    public function store(Request $request)
    {
        Brand::newBrand($request);
        return redirect('/brand/manage')->with('message', 'Brand info create successfully.');
    }


    public function edit($id)
    {
        return view('backend.brand.edit', ['brand' => Brand::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Brand::updatedBrand($request, $id);
        return redirect('/brand/manage')->with('message', 'Brand info update successfully.');
    }

    public function delete($id)
    {
        Brand::deleteBrand($id);
        return redirect('/brand/manage')->with('message', 'Brand info delete successfully.');
    }
}
