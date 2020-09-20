<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {return view('pages.customer.index');}
    public function create(){return view('pages.customer.create');}
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
        ]);
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->description = $request->description;
        $customer->created_by = session('auth.id');
        $customer->save();
        return back()->with('success','Sukses tambah data');
    }
    public function edit(Customer $customer){return view('pages.customer.edit',compact('customer'));}
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
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
