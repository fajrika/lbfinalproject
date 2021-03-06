<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function created_by(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function incoming_item(){
        return $this->hasMany('App\Models\Incoming_item');
    }
}
