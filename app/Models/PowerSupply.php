<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PowerSupply extends Model
{
    public $timestamps = false;

    protected $table = 'powerSupply';

    protected $fillable = [
        'name',
        'imageUrl',
        'brandId',
        'potency',
        'badge80Plus',
    ];

    public function brandId()
    {
        return $this->belongsTo(Brand::class, 'brandId');
    }
}
