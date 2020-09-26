<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\IncomingItem;

class IncomingItemAPI extends Controller
{
    public function __invoke()
    {
        return
            datatables()
            ->of(IncomingItem::with('created_by','supplier')->select('incoming_items.*'))
            ->editColumn('created_at', function($el){
                return $el->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('DT_RowId', '{{$id}}')
            ->make(true);
    }
}
