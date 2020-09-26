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
            ->of(Category::with('created_by')->select('categories.*'))
            ->editColumn('created_at', function($el){
                return $el->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('DT_RowId', '{{$id}}')
            ->make(true);
    }
}
