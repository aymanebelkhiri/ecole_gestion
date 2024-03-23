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
        Schema::table('exams', function (Blueprint $table) {
            // Add the new column
            $table->unsignedBigInteger('groupe')->nullable();

            // Add the foreign key constraint
            $table->foreign('groupe')->references('id_groupe')->on('groupes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exams', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['groupe']);

            // Drop the column
            $table->dropColumn('groupe');
        });
    }
};
