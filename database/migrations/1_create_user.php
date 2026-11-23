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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('usr_name');
            $table->string('usr_phoneNo');
            $table->string('usr_email');
            $table->string('usr_company');
            $table->string('usr_username');
            $table->string('usr_password');
            $table->string('usr_status');

            $table->string('usr_role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
