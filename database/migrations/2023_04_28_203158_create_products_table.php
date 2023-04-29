<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("description")->nullable();
            $table->string("image")->nullable();
            $table->string("price")->nullable();
            $table->unsignedBigInteger("category")->nullable();
            $table->unsignedBigInteger("sub_category")->nullable();
            $table->unsignedBigInteger("brand")->nullable();
            $table->string("rating")->nullable();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('category')->references('id')->on('categories')->nullOnDelete();
            $table->foreign('sub_category')->references('id')->on('sub_categories')->nullOnDelete();
            $table->foreign('brand')->references('id')->on('brands')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
