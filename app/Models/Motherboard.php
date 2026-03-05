<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    public $timestamps = false;

    protected $table = 'motherboard';

    protected $fillable = [
        'name',
        'imageUrl',
        'brandId',
        'socketTypeId',
        'ramMemoryTypeId',
        'ramMemorySlots',
        'maxTdp',
        'sataSlots',
        'm2Slots',
        'pciSlots',
    ];

    public function brandId()
    {
        return $this->belongsTo(Brand::class, 'brandId');
    }
}
