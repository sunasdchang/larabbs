<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration 
{
	public function up()
	{
		Schema::create('topics', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();//帖子标题
            $table->text('body');//帖子内容
            $table->integer('user_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->integer('reply_count')->unsigned()->default(0);//回复数量
            $table->integer('view_count')->unsigned()->default(0);//查看总数
            $table->integer('last_reply_user_id')->unsigned()->default(0);//最后回复的用户ID
            $table->integer('order')->unsigned()->default(0);//可用来做排序使用
            $table->text('excerpt')->nullable();//文章摘要，SEO优化时使用
            $table->string('slug')->nullable();//SEO友好的URL
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('topics');
	}
}
