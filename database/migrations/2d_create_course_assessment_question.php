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
        Schema::create('course_assessment_question', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qst_asm_id')->nullable()->constrained('course_assessment')->onDelete('cascade');
            $table->string('qst_order');
            $table->string('qst_question');
            $table->string('qst_option_A');
            $table->string('qst_option_B');
            $table->string('qst_option_C');
            $table->string('qst_option_D');
            $table->string('qst_answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_question');
    }
};
