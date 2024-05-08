<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('filiéres_prof', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_prof');
            $table->unsignedBigInteger('id_filiére');
            $table->timestamps();

            // Ajout des clés étrangères
            $table->foreign('id_prof')->references('id_prof')->on('profs')->onDelete('cascade');
            $table->foreign('id_filiére')->references('id')->on('filiéres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filiéres_prof');
    }
};
