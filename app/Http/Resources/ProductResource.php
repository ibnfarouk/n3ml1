<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->p_name,
            'price' => $this->price,
            'desc' => $this->desc,
            'categories' => $this->whenLoaded('categories', CategoryResource::collection($this->categories))
        ];
    }
}
