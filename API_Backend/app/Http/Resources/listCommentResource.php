<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class listCommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->user->name, // Sử dụng trường 'name' từ bảng 'users'
            'product' => $this->product->name,
            'rating' => $this->rating,
            'content' =>$this->content,
            'created_at' => $this->created_at
        ];
    }
}
