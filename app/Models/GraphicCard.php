<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GraphicCard extends Model
{
    public $timestamps = false;

    protected $table = 'graphicCard';

    protected $fillable = [
        'name',
        'imageUrl',
        'brandId',
        'memorySize',
        'memoryType',
        'minimumPowerSupply',
        'supportMultiGpu',
    ];

    public function brandId()
    {
        return $this->belongsTo(Brand::class, 'brandId');
    }

    protected function casts()
    {
        return [
            'supportMultiGpu' => 'boolean',
        ];
    }
}
