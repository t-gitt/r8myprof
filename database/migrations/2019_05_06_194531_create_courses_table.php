<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbiginteger('university_id')->unsigned()->nullable();
            $table->string('code');
            $table->string('name');
            $table->timestamps();
        });

          Schema::enableForeignKeyConstraints();

           Schema::table('courses', function (Blueprint $table) {
                  
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
        Schema::dropIfExists('courses');
    }
}
