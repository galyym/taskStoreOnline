<?php

namespace App\Http\Controllers\SubCategories;

use App\Http\Controllers\Controller;
use App\Services\SubCategories\SubCategoryService;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct(
        protected SubCategoryService $service
    ){}

    public function index($lang, int $id){
        return $this->service->index($id);
    }
}
