<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('from_grade')->unsigned();
            $table->bigInteger('from_Classroom')->unsigned();
            $table->bigInteger('from_section')->unsigned();
            $table->bigInteger('to_grade')->unsigned();
            $table->bigInteger('to_Classroom')->unsigned();
            $table->bigInteger('to_section')->unsigned();
            $table->string('academic_year');
            $table->string('academic_year_new');
            $table->timestamps();
        });

        Schema::table('promotions', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('studants')->onDelete('cascade');
            $table->foreign('from_grade')->references('id')->on('Grades')->onDelete('cascade');
            $table->foreign('from_Classroom')->references('id')->on('classroom')->onDelete('cascade');
            $table->foreign('from_section')->references('id')->on('section')->onDelete('cascade');
            $table->foreign('to_grade')->references('id')->on('Grades')->onDelete('cascade');
            $table->foreign('to_Classroom')->references('id')->on('classroom')->onDelete('cascade');
            $table->foreign('to_section')->references('id')->on('section')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
};
