<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGuestBookTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guest_book', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('column01')->nullable()->default('');
			$table->string('column02')->nullable()->default('');
			$table->string('column03')->nullable()->default('');
			$table->string('column04')->nullable()->default('');
			$table->string('column05')->nullable()->default('');
			$table->string('column06')->nullable()->default('');
			$table->string('column07')->nullable()->default('');
			$table->string('column08')->nullable()->default('');
			$table->string('column09')->nullable()->default('');
			$table->string('column10')->nullable()->default('');
			$table->text('column11', 65535)->nullable();
			$table->text('column12', 65535)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->smallInteger('type_id')->default(1)->comment('类别  1:留言本  2:调查表');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('guest_book');
	}

}
