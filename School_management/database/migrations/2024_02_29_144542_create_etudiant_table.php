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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id('id_etudiant');
            $table->integer('Matricule')->unique();
            $table->string('Nom');
            $table->string('Prenom');
            $table->date('DateNaissance');
            $table->string('Sexe');
            $table->string('Email');
            $table->string('Password');
            $table->integer('Age');
            $table->string('photo');
            $table->unsignedBigInteger('Groupe');
            $table->foreign('Groupe')->references('id_groupe')->on('groupes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
