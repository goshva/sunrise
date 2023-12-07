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
        Schema::create('user_competetion_archives', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
             $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('competetion_id');
            $table->float("points")->default(0);
            $table->integer("level")->default(0);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('competetion_id')->references('id')->on('competetions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_competetion_archives');
    }
};
