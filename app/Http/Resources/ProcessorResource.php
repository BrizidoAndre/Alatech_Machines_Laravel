<?php

namespace App\Http\Resources;

use App\Models\Processor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Processor */
class ProcessorResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'imageUrl' => $this->imageUrl,
            'socketTypeId' => $this->socketTypeId,
            'cores' => $this->cores,
            'baseFrequency' => $this->baseFrequency,
            'maxFrequency' => $this->maxFrequency,
            'cacheMemory' => $this->cacheMemory,
            'tdp' => $this->tdp,

            'brandId' => $this->brandId,

            'brandId' => new BrandResource($this->whenLoaded('brandId')),
        ];
    }
}
