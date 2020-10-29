<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbiginteger('student_id')->unsigned()->nullable();
            $table->unsignedbiginteger('prof_id')->unsigned()->nullable();
            $table->unsignedbiginteger('course_id')->unsigned()->nullable();
            $table->integer('course_rating');
            $table->integer('pcharacter_rating');
            $table->integer('pteaching_rating');
            $table->integer('pmastery_rating');
            $table->double('poverall_rating',8,2);
            $table->text('comment');
            $table->timestamps();
            $table->unique(['student_id', 'prof_id', 'course_id']);
          });

          Schema::enableForeignKeyConstraints();

           Schema::table('ratings', function (Blueprint $table) {

            $table->foreign('prof_id')->references('id')->on('professors')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
