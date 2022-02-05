<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->integer('category_id')->unsigned();
			$table->string('content');
			$table->string('image');
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}