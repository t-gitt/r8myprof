<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbiginteger('university_id')->unsigned()->nullable();
            $table->string('titles');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('faculty');
            $table->string('url')->nullable();
            $table->timestamps();
        });

          Schema::enableForeignKeyConstraints();

           Schema::table('professors', function (Blueprint $table) {
                  
                      $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');

 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professors');
    }
}
