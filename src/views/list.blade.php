@if (!$testimonials->isEmpty())

	@foreach ($testimonials as $testimonial)

		<div class="testimonials-list-testimonial">

			<h2 class="testimonial-title">
				<a href="{{ $testimonial->getUrl() }}">
					{{ $testimonial->title }}
				</a>
			</h2>

			@if (!empty($testimonial->you_tube_video_id))
				<div class="testimonial--youtube-thumb">
					<a href="{{ $testimonial->getUrl() }}" title="{{ $testimonial->title }}">
						{{ $testimonial->getYouTubeThumbnailImage() }}
					</a>
				</div>
			@elseif (!empty($testimonial->image))
				<div class="testimonial--image-thumb">
					<a href="{{ $testimonial->getUrl() }}" title="{{ $testimonial->title }}">
						{{ $testimonial->getImage('thumbnail') }}
					</a>
				</div>
			@endif

			<div class="testimonial-desc-snippet">
				{{ HtmlTruncator\Truncator::truncate($testimonial->content, 30) }}
			</div>

			<div class="testimonial-link">
				<a href="{{ $testimonial->getUrl() }}">{{ trans('laravel-testimonials::copy.misc.read_more') }}</a>
			</div>

		</div>

	@endforeach

	{{ $testimonials->links() }}

@else

	<p class="no-matching-testimonials">{{ trans('laravel-testimonials::copy.misc.no_matching_testimonials') }}</p>

@endif