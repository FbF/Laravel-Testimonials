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
			$table->string('image')->nullable()->default(null);
			$table->string('image_alt')->nullable()->default(null);
			$table->string('image_width')->nullable()->default(null);
			$table->string('image_height')->nullable()->default(null);
			$table->string('you_tube_video_id')->nullable()->default(null);
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
