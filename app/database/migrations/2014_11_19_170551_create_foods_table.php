<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('foods', function($table) {
			#Increments method will make a Primary,
			#auto-incrementing filed.
			#Most tables start with this.
			$table->increments('id');

			#timestamps generates two cols:
			#'created_at' and 'update_at' to
			#keep track of row changes.
			$table->timestamps();

			#the rest of the fields
			$table->string('name');
			$table->text('description');
			$table->string('sold_by');
			$table->string('size');
			$table->float('price');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('foods');
	}

}
