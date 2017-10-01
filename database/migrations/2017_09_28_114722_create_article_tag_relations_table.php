<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleTagRelationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_tag_relations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('article_id')->unsigned()->comment('文章id');
			$table->integer('tag_id')->unsigned()->comment('tag id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('article_tag_relations');
	}

}
