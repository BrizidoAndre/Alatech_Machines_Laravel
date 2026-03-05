<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StorageDevice extends Model
{
    public $timestamps = false;

    protected $table = 'storageDevice';

    protected $fillable = [
        'name',
        'imageUrl',
        'brandId',
        'storageDeviceType',
        'size',
        'storageDeviceInterface',
    ];

    public function brandId()
    {
        return $this->belongsTo(Brand::class, 'brandId');
    }
}
