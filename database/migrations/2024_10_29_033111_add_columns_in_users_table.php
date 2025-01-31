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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->integer('dni')->nullable();
            $table->string('gender')->nullable();
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();
            $table->date('birthdate');
            $table->integer('age')->nullable();
            $table->string('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('dni');
            $table->dropColumn('gender');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('birthdate');
            $table->dropColumn('age');
            $table->dropColumn('photo');
        });
    }
};
