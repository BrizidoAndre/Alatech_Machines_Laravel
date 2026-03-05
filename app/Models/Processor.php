<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
    public $timestamps = false;

    protected $table = 'processor';

    protected $fillable = [
        'name',
        'imageUrl',
        'brandId',
        'socketTypeId',
        'cores',
        'baseFrequency',
        'maxFrequency',
        'cacheMemory',
        'tdp',
    ];

    public function brandId()
    {
        return $this->belongsTo(Brand::class, 'brandId');
    }
}
