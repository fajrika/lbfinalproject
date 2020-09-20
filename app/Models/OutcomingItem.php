<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutcomingItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }

    public function detail(){
        return $this->hasMany('App\Models\OutcomingItemDetail');
    }

    public function created_by(){
        return $this->belongsTo(User::class,'created_by');
    }
}
