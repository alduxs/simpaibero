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
        Schema::create('images', function (Blueprint $table) {
            $table->tinyIncrements('imageId');
            $table->string('imageName', 50)->unique();
            $table->smallInteger('imagePosition')->unsigned();
            $table->tinyInteger('imageGalleryId')->unsigned();
            $table->foreign('imageGalleryId')
                        ->references('galleryId')->on('galleries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
