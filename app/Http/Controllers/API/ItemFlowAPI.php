<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ItemFlowAPI extends Controller
{
    public function __invoke()
    {
        return
            datatables()
            ->of(DB::table('v_item_flows'))
            ->addColumn('DT_RowId', '{{$id}}')
            ->addColumn('button_edit', "<Button>Edit</Button>")
            ->make(true);
    }
}
