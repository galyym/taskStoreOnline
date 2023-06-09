<?php

namespace App\Http\Resources\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "name" => $this->name,
            "description" => $this->description,
            "image" => $this->image,
            "price" => $this->price,
            "category" => new CategoryResource($this->categories),
            "sub_category" => new SubCategoryResource($this->subCategories),
            "brand" => new BrandResource($this->brands),
            "rating" => $this->rating,
        ];
    }
}
