<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RamMemoryType extends Model
{
    public $timestamps = false;

    protected $table = 'ramMemoryType';

    protected $fillable = [
        'name',
    ];
}
