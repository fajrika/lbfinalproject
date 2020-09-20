<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerAPI extends Controller
{
    public function __invoke()
    {
        return
            datatables()
            ->of(Customer::with('created_by')->get()->toArray())
            ->addColumn('DT_RowId', '{{$id}}')
            ->addColumn('button_edit', "<Button>Edit</Button>")
            ->make(true);
    }
}
