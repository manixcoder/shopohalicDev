<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSalesRecord extends Model
{
    protected $table = 'product_sales_record';
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'product_id',
        'quantity',
        'sale_price',
        'sale_date',
        'user_id',
    ];
}
