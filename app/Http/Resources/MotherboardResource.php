<?php

namespace App\Http\Resources;

use App\Models\Motherboard;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Motherboard */
class MotherboardResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'imageUrl' => $this->imageUrl,
            'socketTypeId' => $this->socketTypeId,
            'ramMemoryTypeId' => $this->ramMemoryTypeId,
            'ramMemorySlots' => $this->ramMemorySlots,
            'maxTdp' => $this->maxTdp,
            'sataSlots' => $this->sataSlots,
            'm2Slots' => $this->m2Slots,
            'pciSlots' => $this->pciSlots,

            'brandId' => $this->brandId,

            'brandId' => new BrandResource($this->whenLoaded('brandId')),
        ];
    }
}
