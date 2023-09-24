<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDeliveryAddress extends Model
{
     protected $table = 'user_delivery_address';
     public $timestamps = false;
     
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [      
        'user_id',
        'delivery_address',
    ];
}
