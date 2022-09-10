<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
   /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'subscriptions';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'email',
        'created_at',
        'updated_at',
    ];
}
