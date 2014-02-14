<?php namespace Fbf\LaravelTestimonials;

class TestimonialsTableFakeSeeder extends \Seeder {

	public function run()
	{
		$replace = \Config::get('laravel-testimonials::seed.replace');
		if ($replace)
		{
			\DB::table('fbf_testimonials')->delete();
		}

		$faker = \Faker\Factory::create();

		$statuses = array(
			Testimonial::DRAFT,
			Testimonial::APPROVED
		);

		for ($i = 0; $i < 100; $i++)
		{
			$testimonial = new Testimonial();
			$title = $faker->sentence(rand(1, 10));
			$testimonial->title = $title;
			$youTubeVideoFreq = \Config::get('laravel-testimonials::seed.you_tube_video_freq');
			$hasYouTubeVideos = $youTubeVideoFreq > 0 && rand(1, $youTubeVideoFreq) == $youTubeVideoFreq;
			if ($hasYouTubeVideos)
			{
				$testimonial->you_tube_video_id = $faker->randomElement(\Config::get('laravel-testimonials::seed.you_tube_video_ids'));
				$testimonial->image = $testimonial->image_alt = $testimonial->image_width = $testimonial->image_height = '';
			}
			else
			{
				$testimonial->you_tube_video_id = '';
				$imageFreq = \Config::get('laravel-testimonials::seed.image_freq');
				$hasImage = $imageFreq > 0 && rand(1, $imageFreq) == $imageFreq;
				if ($hasImage)
				{
					$thumbnail = $faker->image(
						public_path(Testimonial::getImageConfig('thumbnail', 'dir')),
						Testimonial::getImageConfig('thumbnail', 'width'),
						Testimonial::getImageConfig('thumbnail', 'height')
					);
					$filename = basename($thumbnail);
					$details = $faker->image(
						public_path(Testimonial::getImageConfig('resized', 'dir')),
						rand(200, Testimonial::getImageConfig('resized', 'width')),
						rand(200, Testimonial::getImageConfig('resized', 'height'))
					);
					rename($details, public_path(Testimonial::getImageConfig('resized', 'dir')) . $filename);
					$testimonial->image = $filename;
					$testimonial->image_alt = $title;
				}
				else
				{
					$testimonial->image = $testimonial->image_alt = $testimonial->image_width = $testimonial->image_height = '';
				}
			}
			$testimonial->content = '<p>'.implode('</p><p>', $faker->paragraphs(rand(1, 10))).'</p>';
			$testimonial->source = $faker->words(rand(1,2), true);
			$testimonial->page_title = $title;
			$testimonial->meta_description = $faker->sentence();
			$testimonial->meta_keywords = $faker->words(10, true);
			$testimonial->status = $faker->randomElement($statuses);
			$testimonial->published_date = $faker->dateTimeBetween('-3 years', '+1 month');
			$testimonial->save();
		}
		echo 'Database seeded' . PHP_EOL;
	}
}