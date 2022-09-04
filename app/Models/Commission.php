<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'commission';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'commission_title',
        'commission_percentage',       
        'created_at',
        'updated_at',
    ];
}
