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
        Schema::create('payment_per_matches', function (Blueprint $table) {
            $table->id('payment_per_match_id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('clash_id');
            $table->date('payment_date');

            $table->foreign('player_id')->references('player_id')->on('players');
            $table->foreign('clash_id')->references('clash_id')->on('clashes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_per_matches');
    }
};
