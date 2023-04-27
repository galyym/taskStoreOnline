<?php

namespace App\Services\Products;

use App\Http\Responders\Responder;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductService
{
    public function __construct(
        public Responder $responder
    ){}

    public function index(): JsonResponse {
        return $this->responder->success('Products');
    }

    public function addProduct($data): JsonResponse {
        $insert_data = Product::insert($data);
        if ($insert_data) {
            return $this->responder->success('success');
        }
        return $this->responder->error('failed');
    }
}
