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
        Schema::create('modules', function (Blueprint $table) {
            $table->id('id_module');
            $table->string('Nom');
            $table->integer('MasseHoraire');
            $table->integer('Coefficient');
            $table->text('description');
            $table->string('image_url')->nullable();
            $table->unsignedBigInteger('Filiére');
            $table->foreign('Filiére')->references('id')->on('filiéres')->cascadeOnDelete();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
