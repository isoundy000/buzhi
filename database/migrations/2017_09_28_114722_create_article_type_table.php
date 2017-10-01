<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_type', function(Blueprint $table)
		{
			$table->increments('id')->comment('类别id');
			$table->string('name', 50)->default('')->comment('类别名称');
			$table->integer('uid')->default(0)->comment('创建者用户id');
			$table->integer('pid')->default(0)->comment('上级id');
			$table->timestamps();
			$table->text('content', 65535)->comment('详情');
			$table->smallInteger('sort')->default(0)->comment('排序');
			$table->string('thumb')->default('');
			$table->softDeletes();
			$table->boolean('show_type')->default(1)->comment('展示类别  1:文章 2:图片 3:文件下载 4:单页 5:留言');
			$table->boolean('is_index')->default(0)->comment('是否推荐到首页');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('article_type');
	}

}
