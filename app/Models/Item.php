<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'code', 'name', 'type', 'price', 'created_by'
    ];
    public $timestamps = true;
}
