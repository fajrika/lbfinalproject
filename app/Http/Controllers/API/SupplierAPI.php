<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class SupplierAPI extends Controller
{
    public function __invoke()
    {
        return
            datatables()
            ->of(Supplier::with('created_by'))
            ->addColumn('DT_RowId', '{{$id}}')
            ->addColumn('button_edit', "<Button>Edit</Button>")
            ->make(true);
    }
}
