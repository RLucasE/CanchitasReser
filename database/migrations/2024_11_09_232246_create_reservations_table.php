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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('reservation_id');
            $table->unsignedBigInteger('field_id');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->unsignedBigInteger('matchday_id')->nullable();
            $table->unsignedBigInteger('clash_id')->nullable();
            $table->date('reservation_date');
            $table->time('reservation_time');
            
            $table->foreign('field_id')->references('field_id')->on('fields');
            $table->foreign('payment_id')->references('payment_id')->on('payments');
            $table->foreign('matchday_id')->references('matchday_id')->on('matchdays');
            $table->foreign('clash_id')->references('clash_id')->on('clashes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
