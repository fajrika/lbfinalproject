<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() {return view('pages.supplier.index');}
    public function create(){return view('pages.supplier.create');}
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
        ]);
        $supplier = new Supplier;
        $supplier->name = $request->name;
        $supplier->description = $request->description;
        $supplier->created_by = session('auth.id');
        $supplier->save();
        return back()->with('success','Sukses tambah data');
    }
    public function edit(Supplier $supplier){return view('pages.supplier.edit',compact('supplier'));}
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
        ]);
        $supplier->update($request->all());
        return back()->with('success','Sukses update data');
        return back()->with('error','tidak ada data yang di update');
    }
    public function destroy(Supplier $supplier){
        $supplier->delete();
        return back();
    }
}
