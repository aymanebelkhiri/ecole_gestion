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
        Schema::create('notes', function (Blueprint $table) {
            $table->id('id_note');
            $table->string('Title');
            $table->decimal('Valeur',10,2);
            $table->unsignedBigInteger('Etudiant');
            $table->unsignedBigInteger('Module');

            $table->foreign('Etudiant')->references('id_etudiant')->on('etudiants')->onDelete('cascade');
            $table->foreign('Module')->references('id_module')->on('modules')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
