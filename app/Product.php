<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{    
    protected $fillable = [
        'name',
        'user_id'
    ];
    protected $hidden = [
        'created_at'
    ];
    
}
