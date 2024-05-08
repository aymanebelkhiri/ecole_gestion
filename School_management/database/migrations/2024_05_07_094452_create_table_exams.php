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
        Schema::create('table_exams', function (Blueprint $table) {
            $table->id('id_exam');
            $table->string('heur',45);
            $table->string('titre',45);
            $table->string('disc',60);
            $table->string('module');
            $table->date('Date');
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
        Schema::dropIfExists('table_exams');
    }
};
