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
        Schema::create('groupe_profs', function (Blueprint $table) {
            $table->unsignedBigInteger('Groupe');
            $table->foreign('Groupe')->references('id_groupe')->on('groupes')->cascadeOnDelete();
            $table->unsignedBigInteger('Prof');
            $table->foreign('Prof')->references('id_prof')->on('profs')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupe_profs');
    }
};
