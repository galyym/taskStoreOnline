<?php

namespace App\Services\Baskets;

use App\Http\Resources\Baskets\BasketResource;
use App\Http\Responders\Responder;
use App\Models\Basket;
use Illuminate\Http\JsonResponse;

class BasketService
{
    public function __construct(
        protected Responder $responder
    ){}

    public function index(): JsonResponse
    {
        $basket = Basket::with(['products', 'users'])->where('user_id', auth()->user()->id)->get();
        if (!$basket) return $this->responder->error("No basket found");
        $basketCollection = BasketResource::collection($basket);
        return $this->responder->success('success', $basketCollection);
    }

    public function add(array $data): JsonResponse
    {
        $user_id = auth()->user()->id;
        $total = $data['quantity'] * $data['price'];

        $add_basket = Basket::updateOrCreate(['user_id' => $user_id, 'product_id' => $data['product_id']], [
            'user_id' => $user_id,
            'product_id' => $data['product_id'],
            'quantity' => $data['quantity'],
            'price' => $data['price'],
            'total' => $total,
            'status' => 1,
            'payment_method' => 'card',
            'payment_status' => 'unpaid'
        ]);

        if($add_basket) return $this->responder->success("Successfully added to basket");
        return $this->responder->error("Failed to add to basket");
    }

    public function delete(int $id): JsonResponse
    {
        $basket_product = Basket::find($id);
        if ($basket_product) {
            $delete = $basket_product->delete();
            if($delete) return $this->responder->success("Successfully deleted from basket");
            return $this->responder->error("Failed to delete from basket");
        }
        return $this->responder->error("Product not found");
    }
}
