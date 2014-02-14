<?php namespace Fbf\LaravelTestimonials;

class TestimonialsController extends \BaseController {

	public function index()
	{
		$testimonials = Testimonial::where('status','=',Testimonial::APPROVED)
			->where('published_date','<=',\Carbon\Carbon::now())
			->orderBy('published_date', 'asc')
			->paginate(\Config::get('laravel-testimonials::results_per_page'));

		return \View::make(\Config::get('laravel-testimonials::index_view'))->with(compact('testimonials'));
	}

	public function view($slug)
	{
		$testimonial = Testimonial::where('status','=',Testimonial::APPROVED)
			->where('published_date','<=',\Carbon\Carbon::now())
			->where('slug','=',$slug)
			->first();

		if (!$testimonial)
		{
			\App::abort(404);
		}

		$viewData['testimonial'] = $testimonial;

		// Get the next newest and next oldest testimonial if the config says to show these links on the view page
		if (\Config::get('laravel-testimonials::show_adjacent_testimonials_on_view'))
		{
			$viewData['newer'] = Testimonial::where('status','=',Testimonial::APPROVED)
				->where('published_date','<=',\Carbon\Carbon::now())
				->where('published_date', '>=', $testimonial->published_date)
				->where('id', '<>', $testimonial->id)
				->orderBy('published_date', 'asc')
				->first();

			$viewData['older'] = Testimonial::where('status','=',Testimonial::APPROVED)
				->where('published_date','<=',\Carbon\Carbon::now())
				->where('published_date', '<=', $testimonial->published_date)
				->where('id', '<>', $testimonial->id)
				->orderBy('published_date', 'desc')
				->first();
		}

		return \View::make(\Config::get('laravel-testimonials::view_view'))->with($viewData);
	}

}