<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name', 'username', 'role', 'password', 'created_by'
    ];
    protected $hidden = [
        'password'
    ];
    public $timestamps = true;
}
