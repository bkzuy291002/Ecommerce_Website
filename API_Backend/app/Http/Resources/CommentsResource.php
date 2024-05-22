<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->comment_id,
            'user' => $this->user_name, // Sử dụng trường 'name' từ bảng 'users'
            'product' => $this->prod_name,
            'rating' => $this->rating,
            'content' =>$this->content,
            'created_at' => $this->created_at
        ];
    }
}
