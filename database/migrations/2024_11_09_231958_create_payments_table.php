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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('leader_id')->nullable();
            $table->unsignedBigInteger('inscription_id');
            $table->date('payment_date');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('leader_id')->references('leader_id')->on('leaders');
            $table->foreign('inscription_id')->references('inscription_id')->on('inscriptions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
