<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function index() {return view('pages.item.index');}
    public function create(){return view('pages.item.create');}
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'code' => 'required',
            'name' => 'required',
            'type' => 'required',
            'price' => 'required'
        ]);
        if(!$validatedData->fails()){
            $item = new Item;
            $item->code = $request->code;
            $item->name = $request->name;
            $item->type = $request->type;
            $item->price = $request->price;
            $item->created_by = session('auth.id');
            $item->save();
            return back()->with('success','Sukses tambah data');
        }
        return back()->with('error','Gagal tambah data');
    }
    public function edit(Item $item){return view('pages.item.edit',compact('item'));}
    public function update(Request $request, Item $item)
    {
        $change = [];
        if ($request->code != null && $request->code != $item->code) {
            $change['code'] = $request->code;
        }
        if ($request->name != null && $request->name != $item->name) {
            $change['name'] = $request->name;
        }
        if ($request->type != null && $request->type != $item->type) {
            $change['type'] = $request->type;
        }
        if ($request->price != null && $request->price != $item->price) {
            $change['price'] = $request->price;
        }
        if($change){
            $item->update($change);
            return back()->with('success','Sukses update data');
        }
        return back()->with('error','tidak ada data yang di update');
    }
    public function destroy(Item $item){}
}
