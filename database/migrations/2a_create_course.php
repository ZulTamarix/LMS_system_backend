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
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->string('crs_title');
            $table->string('crs_code');
            $table->string('crs_category');
            $table->longText('crs_description');
            $table->string('crs_thumbnail');
            $table->string('crs_type');
            $table->decimal('crs_price', 10, 2);
            $table->integer('crs_duration');
            $table->string('crs_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
