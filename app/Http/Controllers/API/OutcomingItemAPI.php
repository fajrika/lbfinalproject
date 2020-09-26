<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OutcomingItem;

class OutcomingItemAPI extends Controller
{
    public function __invoke()
    {
        return
            datatables()
            ->of(OutcomingItem::with('created_by','customer')->select('outcoming_items.*'))
            ->editColumn('created_at', function($el){
                return $el->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('DT_RowId', '{{$id}}')
            ->make(true);
    }
}
