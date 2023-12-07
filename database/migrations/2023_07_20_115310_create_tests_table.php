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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger('competetion_id');
            $table->unsignedBigInteger('competetion_test_id')->nullable();
            $table->unsignedBigInteger('indicator_id');
            $table->boolean('completed')->default(0);
            $table->boolean('is_published')->default(0);
            $table->float('max_points')->default(7,5);
            $table->float('recomended_points')->default(7,5);
            $table->foreign('competetion_id')->references('id')->on('competetions');
            $table->foreign('competetion_test_id')->references('id')->on('competetion_tests')->onDelete('cascade');
            $table->foreign('indicator_id')->references('id')->on('indicators')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
