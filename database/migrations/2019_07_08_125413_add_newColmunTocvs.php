<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColmunTocvs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cvs', function (Blueprint $table) {
            $table->string('birthDate');
            $table->integer('age');
            $table->string('jobs');
            $table->float('salary');
            $table->string('methodOfPayment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cvs', function (Blueprint $table) {
            $table->dropColumn('birthDate');
            $table->dropColumn('age');
            $table->dropColumn('jobs');
            $table->dropColumn('salary');
            $table->dropColumn('methodOfPayment');
        });
    }
}
