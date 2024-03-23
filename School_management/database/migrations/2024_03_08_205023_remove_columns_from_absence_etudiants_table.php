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
        Schema::table('absence_etudiants', function (Blueprint $table) {
            $table->dropColumn('Date');
            $table->dropColumn('Justifiée');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absence_etudiants', function (Blueprint $table) {
            $table->date('Date');
            $table->boolean('Justifiée');
        });
    }
};
