<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocketType extends Model
{
    public $timestamps = false;

    protected $table = 'socketType';

    protected $fillable = [
        'name',
    ];
}
