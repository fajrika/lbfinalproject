<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemFlowController extends Controller
{
    public function index() {return view('pages.item_flow.index');}
    public function create(){
        $item = Item::select("id as value","name as view")->get();
        return view('pages.item_flow.create',compact("item"));
    }
    public function store(Request $request)
    {
        // $numbers = [75, 80, 60];
        // $numbers[] =100;
        // dd($numbers);
        $validatedData = Validator::make($request->all(),[
            'item_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'process_date' => 'required',
            'description' => 'required'
        ]);
        if(!$validatedData->fails()){
            $itemFlow = new ItemFlow;
            $itemFlow->item_id = $request->item_id;
            $itemFlow->quantity = $request->quantity;
            $itemFlow->price = $request->price;
            $itemFlow->process_date = $request->process_date;
            $itemFlow->description = $request->description;
            $itemFlow->created_by = session('auth.id');
            $itemFlow->save();
            return back()->with('success','Sukses tambah data');
        }
        return back()->with('error','Gagal tambah data');
    }
    public function edit(ItemFlow $itemFlow){return view('pages.item_flow.edit',compact('item'));}
    public function update(Request $request, ItemFlow $itemFlow)
    {
        $change = [];
        if ($request->item_id != null && $request->item_id != $itemFlow->item_id) {
            $change['item_id'] = $request->item_id;
        }
        if ($request->quantity != null && $request->quantity != $itemFlow->quantity) {
            $change['quantity'] = $request->quantity;
        }
        if ($request->price != null && $request->price != $itemFlow->price) {
            $change['price'] = $request->price;
        }
        if ($request->process_date != null && $request->process_date != $itemFlow->process_date) {
            $change['process_date'] = $request->process_date;
        }
        if ($request->description != null && $request->description != $itemFlow->description) {
            $change['description'] = $request->description;
        }
        if($change){
            $itemFlow->update($change);
            return back()->with('success','Sukses update data');
        }
        return back()->with('error','tidak ada data yang di update');
    }
    public function destroy(ItemFlow $itemFlow){}
}
