<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('contents', 65535);
			$table->integer('article_id')->default(0)->comment('article table primary key value');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('article_detail');
	}

}
