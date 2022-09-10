<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderSetting extends Model
{
    
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'order_setting';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'order_tracking',
        'status',
        'created_at',
        'updated_at',
    ];
}
