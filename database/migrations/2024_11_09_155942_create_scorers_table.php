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
        Schema::create('scorers', function (Blueprint $table) {
            $table->id('scorer_id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('clash_id');
            $table->unsignedBigInteger('championship_id');
            $table->unsignedBigInteger('matchday_id');
            $table->integer('goals_quantity')->nullable();

            $table->foreign('player_id')->references('player_id')->on('players');
            $table->foreign('clash_id')->references('clash_id')->on('clashes');
            $table->foreign('championship_id')->references('championship_id')->on('championships');
            $table->foreign('matchday_id')->references('matchday_id')->on('matchdays');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorers');
    }
};
