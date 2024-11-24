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
        Schema::create('leaders', function (Blueprint $table) {
            $table->id('leader_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('team_id');
            $table->string('status');
            $table->decimal('amount_owed', 10, 2)->nullable(); // Monto debido
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('team_id')->references('team_id')->on('teams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaders');
    }
};
