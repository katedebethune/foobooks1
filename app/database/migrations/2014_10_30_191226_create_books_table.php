<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function($table) {
		
			#Increments method will make a Primary,
			# Auto-Incrementing field.
			#Most tables start this way
			$table->increments('id');

			#timestamps generates two cols: 
			#'created_at' and 'update_at' to
			#keep track of row changes.
			$table->timestamps();

			#the rest of the fields
			$table->string('title');
			$table->string('author');
			$table->integer('published');
			$table->string('cover');
			$table->string('purchase_link');

			#skipping tags for now.
		});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('books');
	}

}
