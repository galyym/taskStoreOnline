<?php

namespace App\Http\Resources\Baskets;

use App\Http\Resources\Products\ProductsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
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
            "product" => new ProductsResource($this->products),
            "quantity" => $this->quantity,
            "total" => $this->total,
            "price" => $this->price,
            "status" => $this->status,
            "user" => new UserResource($this->users),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }

    public function with($request){
        return [
            'pagination' => [
                'total' => $this->total(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage(),
                'from' => $this->firstItem(),
                'to' => $this->lastItem(),
            ]
        ];
    }
}
