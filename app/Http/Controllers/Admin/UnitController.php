<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return view('backend.unit.index');
    }

    public function manage()
    {
        return view('backend.unit.manage', ['units' => Unit::all()]);
    }
    public function store(Request $request)
    {
        Unit::newUnit($request);
        return redirect('/unit/manage')->with('message', 'Unit info create successfully.');
    }

    public function edit($id)
    {
        return view('backend.unit.edit', ['unit' => Unit::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Unit::updatedUnit($request, $id);
        return redirect('/unit/manage')->with('message', 'Unit info update successfully.');
    }

    public function delete($id)
    {
        Unit::deleteUnit($id);
        return redirect('/unit/manage')->with('message', 'Unit info delete successfully.');
    }
}
