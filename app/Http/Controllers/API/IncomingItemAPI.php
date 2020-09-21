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
            ->of(IncomingItem::with('created_by','supplier'))
            ->addColumn('DT_RowId', '{{$id}}')
            ->addColumn('button_edit', "<Button>Edit</Button>")
            ->make(true);
    }
}
