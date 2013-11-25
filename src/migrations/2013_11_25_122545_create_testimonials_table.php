<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fbf_testimonials', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('main_image');
			$table->string('main_image_alt');
			$table->string('main_image_width');
			$table->string('main_image_height');
			$table->string('you_tube_video_id');
			$table->text('content');
			$table->string('source');
			$table->string('slug')->unique();
			$table->text('page_title');
			$table->text('meta_description');
			$table->text('meta_keywords');
			$table->enum('status', array('DRAFT', 'APPROVED'))->default('DRAFT');
			$table->dateTime('published_date');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fbf_testimonials');
	}

}
