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
        Schema::table('absence_etudiant', function (Blueprint $table) {
            $table->id(); // Ceci va ajouter une colonne id auto-incrémentée et une clé primaire
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absence_etudiant', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
};
