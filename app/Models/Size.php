<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Size extends Model
{
     protected $table = 'sizes';
     public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'category_id',
        'sub_category_id',
        'brand_id',
        'size_name',
    ];
}
