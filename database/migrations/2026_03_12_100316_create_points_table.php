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
        Schema::create('points', function (Blueprint $table) {
            $table->tinyIncrements('pointId');
            $table->string('pointName', 50)->unique();
            $table->string('pointAddress',200)->nullable();
            $table->decimal('pointLat',10,10);
            $table->decimal('pointLng',10,10);
            $table->tinyInteger('pointMapId')->unsigned();
            $table->foreign('pointMapId')
                        ->references('mapId')->on('maps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
