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
        Schema::create('absence_etudiant', function (Blueprint $table) {
            $table->integer('MasseHoraire');
            $table->unsignedBigInteger('Etudiant');
            $table->foreign('Etudiant')->references('id_etudiant')->on('etudiants')->cascadeOnDelete();
            $table->date('Date');
            $table->boolean('Justifiée');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absence_etudiant');
    }
};
