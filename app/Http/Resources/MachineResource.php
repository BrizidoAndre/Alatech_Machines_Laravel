<?php

namespace App\Http\Resources;

use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Machine */
class MachineResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'imageUrl' => $this->imageUrl,
            'motherboardId' => $this->motherboardId,
            'processorId' => $this->processorId,
            'ramMemoryId' => $this->ramMemoryId,
            'ramMemoryAmount' => $this->ramMemoryAmount,
            'graphicCardAmount' => $this->graphicCardAmount,
            'powerSupplyId' => $this->powerSupplyId,

            'graphicCardId' => $this->graphicCardId,

            'graphicCardId' => new GraphicCardResource($this->whenLoaded('graphicCardId')),
        ];
    }
}
