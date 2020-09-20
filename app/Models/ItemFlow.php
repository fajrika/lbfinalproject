<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemFlow extends Model
{
    protected $fillable = [
        'item_id', 'quantity', 'price', 'process_date', 'description','created_by'
    ];
    public $timestamps = true;
}
