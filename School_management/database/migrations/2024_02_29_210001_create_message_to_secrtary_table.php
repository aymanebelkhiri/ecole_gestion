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
        Schema::create('message_to_secrtary', function (Blueprint $table) {
            $table->id('id_message');
            $table->text('Message');
            $table->unsignedBigInteger('Etudiant');
            $table->foreign('Etudiant')->references('id_etudiant')->on('etudiants')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_to_secrtary');
    }
};
