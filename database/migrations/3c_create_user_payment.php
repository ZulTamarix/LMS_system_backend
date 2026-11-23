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
        Schema::create('user_payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pym_usr_id')->nullable()->constrained('user')->onDelete('cascade');
            $table->foreignId('pym_crs_id')->nullable()->constrained('course')->onDelete('cascade');
            $table->decimal('pym_price', 10, 2);
            $table->string('pym_paymentMethod');
            $table->string('pym_paymentNo');
            $table->string('pym_paymentDate');
            $table->string('pym_paymentTime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
