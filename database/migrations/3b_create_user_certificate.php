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
        Schema::create('user_certificate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crt_usr_id')->nullable()->constrained('user')->onDelete('cascade');
            $table->foreignId('crt_crs_id')->nullable()->constrained('course')->onDelete('cascade');
            $table->string('crt_no');
            $table->string('crt_date_completed');
            $table->string('crt_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate');
    }
};
