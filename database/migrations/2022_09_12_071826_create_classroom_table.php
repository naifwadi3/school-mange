<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomTable extends Migration {

	public function up()
	{
		Schema::create('classroom', function(Blueprint $table) {
			$table->id();
			$table->string('Name_class');
			$table->string('Name_class_en');
			$table->bigInteger('Grade_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('classroom');
	}
}
