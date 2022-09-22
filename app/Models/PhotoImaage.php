<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoImaage extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'product_image';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'product_id',
        'product_image',
        'created_at',
        'updated_at',
    ];
}
