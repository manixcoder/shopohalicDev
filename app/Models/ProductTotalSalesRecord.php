<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTotalSalesRecord extends Model
{
    protected $table = 'product_total_sales_record';
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'product_id',
        'product_quantity',
        'sales_quantity',
        'left_quantity',
    ];
}
