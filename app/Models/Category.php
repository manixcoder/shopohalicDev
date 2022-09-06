<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'category';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'category_name',
        'parent_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
