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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id('inscription_id');
            $table->unsignedBigInteger('championship_id');
            $table->date('inscription_date');
            // DECIMAL(10,2) Los tipos DECIMAL y NUMERIC Se usan para guardar valores para los que es importante preservar una precisión exacta
            $table->decimal('price', 10, 2);
            // FK que hace referencia a championship_id de la tabla championship
            $table->foreign('championship_id')->references('championship_id')->on('championships');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
