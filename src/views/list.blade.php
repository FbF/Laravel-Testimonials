@if (!$testimonials->isEmpty())

	@foreach ($testimonials as $testimonial)

		<div class="testimonials-list-testimonial">

			<h2 class="testimonial-title">
				<a href="{{ $testimonial->getUrl() }}">
					{{ $testimonial->title }}
				</a>
			</h2>

			<div class="testimonial-desc-snippet">
				{{ HtmlTruncator\Truncator::truncate($testimonial->content, 30) }}
			</div>

			<div class="testimonial-link">
				<a href="{{ $testimonial->getUrl() }}">{{ trans('laravel-testimonials::copy.misc.read_more') }}</a>
			</div>

		</div>

	@endforeach

@else

	<p class="no-matching-testimonials">{{ trans('laravel-testimonials::copy.misc.no_matching_testimonials') }}</p>

@endif