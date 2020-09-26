<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutcomingItemDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function outcoming(){
        return $this->belongsTo('App\Models\OutcomingItem');
    }
    public function item(){
        return $this->belongsTo('App\Models\Item');
    }
}
