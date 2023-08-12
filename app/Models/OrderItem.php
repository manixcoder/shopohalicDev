<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'order_item';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [       
        'order_id',
        'product_id', 
        'quantity', 
        'price', 
        'session_id',   
        'user_id',    
        'created_at',
        'updated_at',
    ];
}
