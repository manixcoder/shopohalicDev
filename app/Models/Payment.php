<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
     protected $table = 'payments';
     public $timestamps = false;
     protected $hidden = ['status','response','order_no','payment_date'];
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [      
        'amount',
        'user_id',
    ];
}
