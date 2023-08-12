<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTotalItemStore extends Model
{
    protected $table = 'product_total_item_store';
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'product_id',
        'color_id',
        'size_id',
        'quantity',
    ];
}
