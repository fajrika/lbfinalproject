<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Supplier;

class SupplierAPI extends Controller
{
    public function __invoke()
    {
        return
            datatables()
            ->of(Supplier::with('created_by')->select('suppliers.*'))
            ->editColumn('created_at', function($el){
                return $el->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('DT_RowId', '{{$id}}')
            ->make(true);
    }
}
