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
        Schema::create('positions', function (Blueprint $table) {
            $table->id('position_id');
            //esta columna puede ser nula porque un equipo puede o no juagar un campeonato por puntos, podria juagar por ejemplo un campeonato de eliminación directa
            $table->unsignedBigInteger('championship_id')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->integer('clash_played'); //partidos jugados
            $table->integer('wins');
            $table->integer('draws');
            $table->integer('losed');
            $table->integer('points');
            $table->integer('goals_for');
            $table->integer('goals_against');
            $table->integer('goal_difference');
            
            $table->foreign('championship_id')->references('championship_id')->on('championships');
            $table->foreign('team_id')->references('team_id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
