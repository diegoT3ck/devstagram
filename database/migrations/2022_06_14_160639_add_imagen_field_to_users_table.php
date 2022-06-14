<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { //No siempre es algo bueno poner tablas completas, podemos hacer pruebas y agregar campos a las tablas
        //Asi podemos quitarla en un futuro si no nos agrada
        Schema::table('users', function (Blueprint $table) {
            $table->string('imagen')->nullable(); // Nullable significa que no es obligarorio, puede ser nulo el campo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('imagen');
        });
    }
};
