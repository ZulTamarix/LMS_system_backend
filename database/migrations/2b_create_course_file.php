2<?php

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
        Schema::create('course_file', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fil_crs_id')->nullable()->constrained('course')->onDelete('cascade');
            $table->string('fil_title');
            $table->string('fil_description');
            $table->string('fil_order');
            $table->string('fil_file');
            $table->string('fil_duration');
            $table->string('fil_isRequired');
            $table->string('fil_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_file');
    }
};
