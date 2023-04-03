<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('classroom', function(Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('Grades')
						->onDelete('cascade');
		});

        Schema::table('section', function(Blueprint $table) {
            $table->foreign('Grade_id')->references('id')->on('Grades')
                ->onDelete('cascade');
                $table->foreign('Class_id')->references('id')->on('classroom')
                ->onDelete('cascade');



        });

        Schema::table('my_parents', function(Blueprint $table) {
            $table->foreign('Nationality_Father_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Father_id')->references('id')->on('type_bloods');
            $table->foreign('Religion_Father_id')->references('id')->on('religions');
            $table->foreign('Nationality_Mother_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Mother_id')->references('id')->on('type_bloods');
            $table->foreign('Religion_Mother_id')->references('id')->on('religions');
        });


    Schema::table('parentattachments',function(Blueprint $table){
$table->foreign('parent_id')->references('id')->on('my_parents')->onDelete('cascade');
    });



    Schema::table('teachersses',function(Blueprint $table){
        $table->foreign('Specialization_id')->references('id')->on('sps')->onDelete('cascade');
        $table->foreign('Gender_id')->references('id')->on('g_n_s')->onDelete('cascade');

    });

    Schema::table('teacher_sections',function(Blueprint $table){
        $table->foreign('teacher_id')->references('id')->on('teachersses')->onDelete('cascade');
        $table->foreign('section_id')->references('id')->on('section')->onDelete('cascade');

    });


    Schema::table('studants',function(Blueprint $table){
        $table->foreign('gender_id')->references('id')->on('g_n_s')->onDelete('cascade');
        $table->foreign('nationalitie_id')->references('id')->on('nationalities')->onDelete('cascade');
        $table->foreign('blood_id')->references('id')->on('type_bloods')->onDelete('cascade');
        $table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade');
        $table->foreign('Classroom_id')->references('id')->on('classroom')->onDelete('cascade');
        $table->foreign('section_id')->references('id')->on('section')->onDelete('cascade');
        $table->foreign('parent_id')->references('id')->on('my_parents')->onDelete('cascade');
    });

    Schema::table('quizzes',function(Blueprint $table){
        $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        $table->foreign('grade_id')->references('id')->on('Grades')->onDelete('cascade');
        $table->foreign('classroom_id')->references('id')->on('classroom')->onDelete('cascade');
        $table->foreign('section_id')->references('id')->on('section')->onDelete('cascade');
        $table->foreign('teacher_id')->references('id')->on('teachersses')->onDelete('cascade');
            });



            Schema::table('online_classes',function(Blueprint $table){

                $table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade');
                $table->foreign('Classroom_id')->references('id')->on('classroom')->onDelete('cascade');
                $table->foreign('section_id')->references('id')->on('section')->onDelete('cascade');
                // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            });







	}

	public function down()
	{
		Schema::table('classroom', function(Blueprint $table) {
			$table->dropForeign('classroom_Grade_id_foreign');
		});
		Schema::table('section', function(Blueprint $table) {
			$table->dropForeign('section_Grade_id_foreign');
		});
		Schema::table('section', function(Blueprint $table) {
			$table->dropForeign('section_Class_id_foreign');
		});
	}
}
