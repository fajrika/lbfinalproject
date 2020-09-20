<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {return view('pages.item.index');}
    public function create(){return view('pages.item.create');}
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|max:100',
            'name' => 'required|max:100',
            'type' => 'required|max:50',
            'price' => 'required|numeric|min:0'
        ]);
        $item = new Item;
        $item->code = $request->code;
        $item->name = $request->name;
        $item->type = $request->type;
        $item->price = $request->price;
        $item->created_by = session('auth.id');
        $item->save();
        return back()->with('success','Sukses tambah data');
    }
    public function edit(Item $item){return view('pages.item.edit',compact('item'));}
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'code' => 'required|max:100',
            'name' => 'required|max:100',
            'type' => 'required|max:50',
            'price' => 'required|numeric|min:0'
        ]);
        $item->update($request->all());
        return back()->with('success','Sukses update data');
        return back()->with('error','tidak ada data yang di update');
    }
    public function destroy(Item $item){
        $item->delete();
        return back();
    }
}
