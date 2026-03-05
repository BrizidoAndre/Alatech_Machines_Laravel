<?php

namespace App\Http\Resources;

use App\Models\SocketType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin SocketType */
class SocketTypeResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
