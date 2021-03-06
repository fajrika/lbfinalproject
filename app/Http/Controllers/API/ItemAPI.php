<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemAPI extends Controller
{
    public function __invoke()
    {
        return
            datatables()
            ->of(Item::with('category','created_by')->select('items.*'))
            ->editColumn('created_at', function($el){
                return $el->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('DT_RowId', '{{$id}}')
            ->addColumn('button_edit', "<Button>Edit</Button>")
            ->make(true);
    }
}
