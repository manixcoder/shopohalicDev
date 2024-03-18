<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'order_status';
     public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'status_name',
        'is_delete',
    ];
}
