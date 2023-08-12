<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductItemStore extends Model
{
    protected $table = 'product_item_store';
     public $timestamps = false;
    
    protected $fillable = [
        'id',
        'product_id',
        'color_id',
        'size_id',
        'quantity',
        'created_date',
    ];
}
