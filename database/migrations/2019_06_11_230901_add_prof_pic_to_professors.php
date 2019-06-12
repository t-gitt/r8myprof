<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfPicToProfessors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('professors', function (Blueprint $table) {
            //
            $table->string('prof_pic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('professors', function (Blueprint $table) {
            //
            $table->dropColumn('prof_pic');
        });
    }
}
