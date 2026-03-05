<?php

namespace App\Http\Resources;

use App\Models\MachineHasStorageDevice;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin MachineHasStorageDevice */
class MachineHasStorageDeviceResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'storageDeviceId' => $this->storageDeviceId,
            'amount' => $this->amount,

            'machineId' => $this->machineId,

            'machineId' => new MachineResource($this->whenLoaded('machineId')),
        ];
    }
}
