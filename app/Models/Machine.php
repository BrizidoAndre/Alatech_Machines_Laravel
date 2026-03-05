<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Machine extends Model
{
    public $timestamps = false;

    protected $table = 'machine';

    protected $fillable = [
        'name',
        'description',
        'imageUrl',
        'motherboardId',
        'processorId',
        'ramMemoryId',
        'ramMemoryAmount',
        'graphicCardId',
        'graphicCardAmount',
        'powerSupplyId',
    ];

    public function graphicCardId()
    {
        return $this->belongsTo(GraphicCard::class, 'graphicCardId');
    }

    public function storageDevices()
    {
        return $this->hasMany(MachineHasStorageDevice::class, 'machineId');
    }
}
