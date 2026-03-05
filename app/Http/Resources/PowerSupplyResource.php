<?php

namespace App\Http\Resources;

use App\Models\PowerSupply;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin PowerSupply */
class PowerSupplyResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'imageUrl' => $this->imageUrl,
            'potency' => $this->potency,
            'badge80Plus' => $this->badge80Plus,

            'brandId' => $this->brandId,

            'brandId' => new BrandResource($this->whenLoaded('brandId')),
        ];
    }
}
