<?php

namespace App\Http\Controllers;

use App\Models\OutcomingItem;
use App\Models\OutcomingItemDetail;
use App\Models\Item;
use App\Models\Customer;
use Illuminate\Http\Request;

class OutcomingItemController extends Controller
{
    public function index() {return view('pages.outcomingItem.index');}
    public function create(){
        $customers = Customer::select('id as value', 'name as view')->get()->toArray();
        $items = Item::get();
        return view('pages.outcomingItem.create',compact('customers','items'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'process_date' => 'required',
            'ppn' => 'required',
        ]);
        $outcomingItem = new OutcomingItem;
        $outcomingItem->customer_id = $request->customer_id;
        $outcomingItem->process_date = $request->process_date;
        $outcomingItem->ppn = $request->ppnrp;
        $outcomingItem->grand_total = $request->grandTotal;
        $outcomingItem->final_total = $request->finalTotal;
        $outcomingItem->description = $request->description;
        $outcomingItem->created_by = session('auth.id');
        $outcomingItem->save();

        foreach ($request->item_id as $key => $value) {
            $outcomingItemDetail = new OutcomingItemDetail;
            $outcomingItemDetail->outcoming_item_id = $outcomingItem->id;
            $outcomingItemDetail->item_id = $request->item_id[$key];
            $outcomingItemDetail->quantity = $request->quantity[$key];
            $outcomingItemDetail->price = $request->priceEl[$key];
            $outcomingItemDetail->total = $request->total[$key];
            // $outcomingItemDetail->description = $request->descriptionEl[$key];
            $outcomingItemDetail->save();
            $stock = (int)Item::find($outcomingItemDetail->item_id)->stock;
            $stock += (int)$outcomingItemDetail->quantity;
            Item::find($outcomingItemDetail->item_id)->update(['stock' => $stock]);
        }
        return back()->with('success','Sukses tambah data');
    }
    public function edit(OutcomingItem $outcomingItem){return view('pages.outcomingItem.edit',compact('outcomingItem'));}
    public function show(OutcomingItem $outcomingItem){return view('pages.outcomingItem.show',compact('outcomingItem'));}
    public function update(Request $request, OutcomingItem $outcomingItem)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
        ]);
        $outcomingItem->update($request->all());
        return back()->with('success','Sukses update data');
        return back()->with('error','tidak ada data yang di update');
    }
    public function destroy(OutcomingItem $outcomingItem){
        // dd($outcomingItem->details()->get());
        $outcomingItem->details()->delete();
        $outcomingItem->delete();
        return back();
    }
}
