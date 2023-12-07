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
        Schema::create('test_question_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("test_question_id");
            $table->longText('file');
            $table->boolean('progress')->default(0);
            $table->boolean('points')->default(0);
            $table->foreign('test_question_id')->references('id')->on('test_questions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_question_files');
    }
};
