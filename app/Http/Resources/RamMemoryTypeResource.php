<?php

namespace App\Http\Resources;

use App\Models\RamMemoryType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin RamMemoryType */
class RamMemoryTypeResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
