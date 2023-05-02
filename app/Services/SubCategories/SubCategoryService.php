<?php

namespace App\Services\SubCategories;

use App\Http\Responders\Responder;
use App\Models\Product;
use App\Models\SubCategory;

class SubCategoryService
{
    public function __construct(
        protected Responder $responder
    ){}

    public function index(int $id){
        $products = Product::getSubCategoriesWithId($id);

        return $this->responder->success("Success", $products, 200);
    }
}
