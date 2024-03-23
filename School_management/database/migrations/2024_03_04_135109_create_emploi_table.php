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
        Schema::create('emploi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('module');
            $table->unsignedBigInteger('prof');
            $table->unsignedBigInteger('filiere');
            $table->string('salleNum');
            $table->string('day');
            $table->time('startTime');
            $table->time('endTime');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('module')->references('id_module')->on('modules')->cascadeOnDelete();
            $table->foreign('filiere')->references('id')->on('filiéres')->cascadeOnDelete();
            $table->foreign('prof')->references('id_prof')->on('profs')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploi');
    }
};
