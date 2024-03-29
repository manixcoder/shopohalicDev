<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Banner extends Model
{
   
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'banner';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'image',
        'created_at',
        'updated_at',
    ];
}
