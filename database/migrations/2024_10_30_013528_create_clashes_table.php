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
        Schema::create('clashes', function (Blueprint $table) {
            $table->id('clash_id');
            $table->unsignedBigInteger('referee_id');
            //$table->unsignedBigInteger('championship_id');
            $table->unsignedBigInteger('team_id_home');
            $table->unsignedBigInteger('team_id_away');
            $table->integer('goals_home')->nullable();
            $table->integer('goals_away')->nullable();
            $table->string('status');
            
            $table->foreign('referee_id')->references('referee_id')->on('referees');
            //$table->foreign('championship_id')->references('championship_id')->on('championships');
            $table->foreign('team_id_home')->references('team_id')->on('teams');
            $table->foreign('team_id_away')->references('team_id')->on('teams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clashes');
    }
};
