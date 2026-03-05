<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RamMemory extends Model
{
    public $timestamps = false;

    protected $table = 'ramMemory';

    protected $fillable = [
        'name',
        'imageUrl',
        'brandId',
        'size',
        'ramMemoryTypeId',
        'frequency',
    ];

    public function brandId()
    {
        return $this->belongsTo(Brand::class, 'brandId');
    }
}
