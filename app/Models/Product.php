<?php

namespace App\Models;

use App\Http\Resources\SubCategories\ProductResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "image",
        "price",
        "category",
        "sub_category",
        "brand",
        "rating",
    ];

    public function brands(){
        return $this->belongsTo(Brand::class, 'brand', 'id');
    }

    public function subCategories(){
        return $this->belongsTo(SubCategory::class, 'sub_category', 'id');
    }

    public function categories(){
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public static function getSubCategoriesWithId($id){
        $sub_categories = SubCategory::find($id);
        $category = Category::find($sub_categories->category_id)->name;
        $products = self::where("sub_category", $id)->get();
        return [
            "category" => $category,
            "sub_category" => $sub_categories->name,
            "products" => ProductResource::collection($products)
        ];
    }
}
