<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MachineHasStorageDevice extends Model
{
    public $timestamps = false;

    protected $table = 'machineHasStorageDevice';

    protected $fillable = [
        'machineId',
        'storageDeviceId',
        'amount',
    ];

    public function machineId()
    {
        return $this->belongsTo(Machine::class, 'machineId');
    }
}
