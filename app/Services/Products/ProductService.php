<?php

namespace App\Services\Products;

use App\Http\Resources\Products\ProductsResource;
use App\Http\Responders\Responder;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class ProductService
{
    public function __construct(
        public Responder $responder
    ){}

    public function index(): JsonResponse {
        $products = ProductsResource::collection(Product::with(['brands', 'categories', 'subCategories'])->get());
        return $this->responder->success('Products', $products);
    }

    public function addProduct(array $data): JsonResponse {
        $image = $data['image']->store("products/".Carbon::today()->format('Y-m-d'), 'public');

        $insert_data = Product::insert([
            "name" => $data["name"],
            "description" => $data["description"],
            "image" => $image,
            "price" => $data["price"],
            "category" => $data["category"],
            "sub_category" => $data["sub_category"],
            "brand" => $data["brand"],
            "rating" => $data["rating"],
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        if ($insert_data) {
            return $this->responder->success('success', $insert_data);
        }
        return $this->responder->error('failed');
    }

    public function updateProduct(array $data, $id): JsonResponse {
        $image = $data['image']->store("products/".Carbon::today()->format('Y-m-d'), 'public');

        $update_data = Product::where('id', $id)->update([
            "name" => $data["name"],
            "description" => $data["description"],
            "image" => $image,
            "price" => $data["price"],
            "category" => $data["category"],
            "brand" => $data["brand"],
            "rating" => $data["rating"],
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        if ($update_data) {
            return $this->responder->success('success updated', $update_data);
        }
        return $this->responder->error('failed');
    }


    public function deleteProduct($id): JsonResponse {
        $delete_data = Product::where('id', $id)->delete();
        if ($delete_data) {
            return $this->responder->success('success deleted', $delete_data);
        }
        return $this->responder->error('failed');
    }
}
