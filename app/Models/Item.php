<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];
    public $timestamps = true;
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function created_by(){
        return $this->belongsTo(User::class,'created_by');
    }
}
