<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatusLog extends Model
{
    protected $table = 'order_status_log';
     public $timestamps = false;
    // protected $hidden = [];
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [      
        'id',
        'order_id',
        'order_no',
        'status',
    ];
}
