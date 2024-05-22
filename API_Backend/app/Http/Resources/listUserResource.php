<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class listUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
//            'id' => $this->resource->id,
//            'name' => $this->resource->name,
//            'store_id' => $this->resource->store_id,
//            'gender' => $this->resource->gender,
//            'phone' => $this->resource->phone,
            'email' => $this->resource->email,
//            'password' => $this->resource->password,
        ];
    }
}
