<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'product_name',
        'product_code',
        'product_code',
        'brand',
        'quantity',
        'description',
        'color',
        'size',
        'image',
        'price',
        'special_price',
        'status',
        'created_by',
        'created_at',
        'updated_at',
    ];
}
