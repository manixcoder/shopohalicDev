<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shipping_costs';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'merchant_id',
        'location',
        'created_at',
        'updated_at',
    ];
}
