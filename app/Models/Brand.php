<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;

    protected $table = 'brand';

    protected $fillable = [
        'name',
    ];
}
