<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function created_by(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function outcoming_item(){
        return $this->hasMany('App\Models\Outcoming_item');
    }
}
