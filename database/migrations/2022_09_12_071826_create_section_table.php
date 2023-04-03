<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionTable extends Migration {

	public function up()
	{
		Schema::create('section', function(Blueprint $table) {
			$table->id();
			$table->string('Name_Section');
			$table->string('Name_Section_en');
			$table->string('Status');
			$table->bigInteger('Grade_id')->unsigned();
			$table->bigInteger('Class_id')->unsigned();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('section');
	}
}
