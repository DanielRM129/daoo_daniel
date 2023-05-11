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
        Schema::create('area_itens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')
                    ->references('id')->on('itens')
                    ->cascadeOnDelete();
            $table->foreignId('area_id')
                    ->references('id')->on('areas')
                    ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_itens');
    }
};
