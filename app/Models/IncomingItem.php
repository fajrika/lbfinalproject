<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }

    public function details(){
        return $this->hasMany('App\Models\IncomingItemDetail');
    }

    public function created_by(){
        return $this->belongsTo(User::class,'created_by');
    }
}
