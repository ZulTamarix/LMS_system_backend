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
        Schema::create('user_course', function (Blueprint $table) {
            $table->foreignId('usr_id')->constrained('user')->cascadeOnDelete();
            $table->foreignId('crs_id')->constrained('course')->cascadeOnDelete();
            $table->primary(['usr_id', 'crs_id']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_course');
    }
};
