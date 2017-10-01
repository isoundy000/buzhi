<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->char('title')->default('')->comment('标题');
			$table->char('author', 80)->default('')->comment('作者b');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->default(0)->comment('用户id  -1为程序蜘蛛id');
			$table->string('thumb')->default('')->comment('缩略图');
			$table->char('from_host')->default('')->comment('文章来源');
			$table->integer('type_id')->unsigned()->default(0)->comment('类别id');
			$table->text('content', 65535);
			$table->boolean('is_index')->default(0)->comment('是否推荐到首页');
			$table->string('file')->default('')->comment('附件');
			$table->string('attach_file')->default('')->comment('附件');
			$table->string('link')->default('')->comment('跳转链接');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles');
	}

}
