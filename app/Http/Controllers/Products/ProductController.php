<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductAddRequest;
use Illuminate\Http\Request;
use App\Services\Products\ProductService;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ){}

    public function index(){
        return $this->productService->index();
    }
    public function addProduct(ProductAddRequest $request){
        return $this->productService->addProduct($request->validated());
    }

    public function updateProduct($lang, $id, ProductAddRequest $request){
        return $this->productService->updateProduct($request->validated(), $id);
    }

    public function deleteProduct($lang, $id){
        return $this->productService->deleteProduct($id);
    }
}
