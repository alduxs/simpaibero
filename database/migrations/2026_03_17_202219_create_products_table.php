<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->tinyIncrements('productId');
            $table->string('productName', 50)->unique();
            $table->mediumText('productDescription');
            $table->smallInteger('productPosition')->unsigned();
            $table->tinyInteger('productCategoryId')->unsigned();
            $table->foreign('productCategoryId')
                        ->references('categoryId')->on('categories');
            $table->tinyInteger('productGalleryId')->nullable()->unsigned();
            $table->foreign('productGalleryId')
                        ->references('galleryId')->on('galleries');
            $table->boolean('productActiv')->default(true);
            $table->string('productHash', 50);
            $table->string('productFichaTecnica', 50)->nullable();
            $table->string('productManual', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
