<?php

namespace App\Http\Resources;

use App\Models\GraphicCard;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin GraphicCard */
class GraphicCardResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'imageUrl' => $this->imageUrl,
            'memorySize' => $this->memorySize,
            'memoryType' => $this->memoryType,
            'minimumPowerSupply' => $this->minimumPowerSupply,
            'supportMultiGpu' => $this->supportMultiGpu,

            'brandId' => $this->brandId,

            'brandId' => new BrandResource($this->whenLoaded('brandId')),
        ];
    }
}
