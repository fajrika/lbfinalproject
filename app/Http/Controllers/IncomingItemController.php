<?php

namespace App\Http\Controllers;

use App\Models\IncomingItem;
use App\Models\IncomingItemDetail;
use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Http\Request;

class IncomingItemController extends Controller
{
    public function index() {return view('pages.incomingItem.index');}
    public function create(){
        $suppliers = Supplier::select('id as value', 'name as view')->get()->toArray();
        $items = Item::get();
        return view('pages.incomingItem.create',compact('suppliers','items'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'process_date' => 'required',
            'ppn' => 'required',
        ]);

        $incomingItem = new IncomingItem;
        $incomingItem->supplier_id = $request->supplier_id;
        $incomingItem->process_date = $request->process_date;
        $incomingItem->ppn = $request->ppnrp;
        $incomingItem->grand_total = $request->grandTotal;
        $incomingItem->final_total = $request->finalTotal;
        $incomingItem->description = $request->description;
        $incomingItem->created_by = session('auth.id');
        $incomingItem->save();

        foreach ($request->item_id as $key => $value) {
            $incomingItemDetail = new IncomingItemDetail;
            $incomingItemDetail->incoming_item_id = $incomingItem->id;
            $incomingItemDetail->item_id = $request->item_id[$key];
            $incomingItemDetail->quantity = $request->quantity[$key];
            $incomingItemDetail->price = $request->priceEl[$key];
            $incomingItemDetail->total = $request->total[$key];
            $incomingItemDetail->description = $request->descriptionEl[$key];
            $incomingItemDetail->save();
        }
        return back()->with('success','Sukses tambah data');
    }
    public function edit(IncomingItem $incomingItem){return view('pages.incomingItem.edit',compact('incomingItem'));}
    public function update(Request $request, IncomingItem $incomingItem)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
        ]);
        $incomingItem->update($request->all());
        return back()->with('success','Sukses update data');
        return back()->with('error','tidak ada data yang di update');
    }
    public function destroy(IncomingItem $incomingItem){
        $incomingItem->delete();
        return back();
    }
}
