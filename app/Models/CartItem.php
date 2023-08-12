<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'cart_item';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'session_id',
        'product_id',
        'quantity',
        'created_at',
        'updated_at',
    ];

}
