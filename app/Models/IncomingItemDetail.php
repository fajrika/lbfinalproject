<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingItemDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function incoming_item(){
        return $this->belongsTo('App\Models\IncomingItem');
    }

}
