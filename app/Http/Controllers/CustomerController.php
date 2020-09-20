<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {return view('pages.customer.index');}
    public function create(){return view('pages.customer.create');}
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:1000',
        ]);
        $item = new Customer;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->created_by = session('auth.id');
        $item->save();
        return back()->with('success','Sukses tambah data');
    }
    public function edit(Customer $customer){return view('pages.customer.edit',compact('customer'));}
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:1000',
        ]);
        $customer->update($request->all());
        return back()->with('success','Sukses update data');
        return back()->with('error','tidak ada data yang di update');
    }
    public function destroy(Customer $customer){
        $customer->delete();
        return back();
    }
}
