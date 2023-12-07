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
        Schema::create('competetion_levels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competetion_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('level');

            $table->foreign('competetion_id')->references('id')->on('competetions')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competetion_levels');
    }
};
