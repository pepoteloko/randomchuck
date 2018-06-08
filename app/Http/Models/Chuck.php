<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Chuck
 *
 * @mixin \Eloquent
 */
class Chuck extends Model
{
    protected $table = 'chuck_says';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'phrase'
    ];
}
