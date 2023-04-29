<?php

namespace App\Models;

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

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand', 'id');
    }

    public function sub_category(){
        return $this->belongsTo(SubCategory::class, 'sub_category', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category', 'id');
    }
}
