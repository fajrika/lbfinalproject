<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryAPI extends Controller
{
    public function __invoke()
    {
        return
            datatables()
            ->of(Category::with('created_by')->get()->toArray())
            ->addColumn('DT_RowId', '{{$id}}')
            ->addColumn('button_edit', "<Button>Edit</Button>")
            ->make(true);
    }
}
