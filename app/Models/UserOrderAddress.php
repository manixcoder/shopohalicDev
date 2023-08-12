<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserOrderAddress extends Model
{
    protected $table = 'user_order_address';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $hidden = [
        'order_no',
    ];
    protected $fillable = [       
        'order_no',
        'name', 
        'address', 
        'suburb', 
        'city',   
        'state',
        'country',
        'zip_code', 
        'user_id', 
        'created_at',
        'updated_at',
    ];
}
