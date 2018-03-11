<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
