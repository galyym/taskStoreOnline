<?php

namespace App\Services\Categories;

use App\Http\Resources\Categories\CategoryResource;
use App\Http\Responders\Responder;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryService
{
    public function __construct(
        protected Responder $responder
    ){}

    public function index(): JsonResponse
    {
        $categories = CategoryResource::collection(Category::with("subCategories")->get());
        return $this->responder->success("All categories", $categories);
    }
}
