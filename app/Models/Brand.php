<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
     protected $table = 'brands';
     public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'category_id',
        'sub_category_id',
        'brand_name',
    ];
}
