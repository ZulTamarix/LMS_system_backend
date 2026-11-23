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
        Schema::create('course_assessment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asm_crs_id')->nullable()->constrained('course')->onDelete('cascade');
            $table->string('asm_title');
            $table->string('asm_totalQuestion');
            $table->string('asm_timeLimit');
            $table->string('asm_status');
            $table->string('asm_score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment');
    }
};
