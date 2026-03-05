<?php

namespace App\Http\Resources;

use App\Models\StorageDevice;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin StorageDevice */
class StorageDeviceResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'imageUrl' => $this->imageUrl,
            'storageDeviceType' => $this->storageDeviceType,
            'size' => $this->size,
            'storageDeviceInterface' => $this->storageDeviceInterface,

            'brandId' => $this->brandId,

            'brandId' => new BrandResource($this->whenLoaded('brandId')),
        ];
    }
}
