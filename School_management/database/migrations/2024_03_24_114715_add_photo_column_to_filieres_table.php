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
        Schema::table('filiéres', function (Blueprint $table) {
            $table->string('photo', 45)->nullable()->after('Domaine');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filiéres', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
};
