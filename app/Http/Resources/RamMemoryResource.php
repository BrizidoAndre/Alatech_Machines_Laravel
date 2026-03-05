<?php

namespace App\Http\Resources;

use App\Models\RamMemory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin RamMemory */
class RamMemoryResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'imageUrl' => $this->imageUrl,
            'size' => $this->size,
            'ramMemoryTypeId' => $this->ramMemoryTypeId,
            'frequency' => $this->frequency,

            'brandId' => $this->brandId,

            'brandId' => new BrandResource($this->whenLoaded('brandId')),
        ];
    }
}
