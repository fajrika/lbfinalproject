<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerAPI extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        return
            datatables()
            ->of(DB::table('v_customers'))
            ->addColumn('DT_RowId', '{{$id}}')
            ->addColumn('button_edit', "<Button>Edit</Button>")
            ->make(true);
    }
}
