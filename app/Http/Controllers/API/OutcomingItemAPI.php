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
            ->of(OutcomingItem::with('created_by','customer'))
            ->addColumn('DT_RowId', '{{$id}}')
            ->addColumn('button_edit', "<Button>Edit</Button>")
            ->make(true);
    }
}
