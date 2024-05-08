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
        Schema::create('profs', function (Blueprint $table) {
            $table->id('id_prof');
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('Email');
            $table->string('Sexe');
            $table->string('Password');

            $table->unsignedBigInteger('Module');
            $table->foreign('Module')->references('id_module')->on('modules')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profs');
    }
};
