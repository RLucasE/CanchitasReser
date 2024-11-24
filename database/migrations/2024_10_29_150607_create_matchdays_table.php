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
    {//se esta creando una clave foranea como clave primaria
        Schema::create('matchdays', function (Blueprint $table) {
            $table->id('matchday_id');
            $table->unsignedBigInteger('championship_id')->nullable();
            $table->integer('matchday_number');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreign('championship_id')->references('championship_id')->on('championships');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matchdays');
    }
};
