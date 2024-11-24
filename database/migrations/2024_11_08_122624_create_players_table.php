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
        Schema::create('players', function (Blueprint $table) {
            $table->id('player_id');
            $table->unsignedBigInteger('team_id');
            $table->string('name');
            $table->integer('dni')->nullable();
            $table->string('gender')->nullable();
            $table->integer('phone')->nullable();
            $table->date('birthdate');
            $table->integer('age')->nullable();
            $table->string('photo')->nullable();

            $table->foreign('team_id')->references('team_id')->on('teams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
