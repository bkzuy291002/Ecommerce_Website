<?php
namespace App\Http\Resources;
use App\Http\Resources\ImageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class ProductEditResource extends JsonResource
{
    public $resource;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'store_id' => $this->resource->store_id,
            'category_id' => $this->resource->category_id,
            'sku' => $this->resource->sku,
            'name' => $this->resource->name,
            'slug' => $this->resource->slug,
            'price' => $this->resource->price,
            'discount' => $this->resource->discount,
            'discount_type' => $this->resource->discount_type,
            'published' => $this->resource->published,
            'quantity' => $this->resource->quantity,
            'description' => $this->resource->description,
            'brand' => $this->resource->brand,
            'warranty' => $this->resource->warranty,
            'warranty_type' => $this->resource->warranty_type,
            'city_id' => $this->resource->city_id,
            'images' => ImageResource::collection($this->resource->images),
            'variants' => ProductVariantResource::collection($this->resource->product_variants),
        ];
    }
}
