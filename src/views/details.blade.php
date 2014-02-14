<div class="testimonial-details-testimonial">

	<h2 class="testimonial-title">
		{{ $testimonial->title }}
	</h2>

	@if ( !empty( $testimonial->you_tube_video_id ) )
		<div class="testimonial-youtube-video">
			{{ $testimonial->getYouTubeEmbedCode() }}
		</div>
	@elseif ( !empty( $testimonial->image ) )
		<div class="image">
			{{ $testimonial->getImage('resized') }}
		</div>
	@endif
	
	<div class="testimonial-desc">
		{{ $testimonial->content }}
	</div>

	<div class="testimonial-source">
		<p>{{ $testimonial->source }}</p>
	</div>

	<div>
		<p>
			<a href="{{ action('Fbf\LaravelTestimonials\TestimonialsController@index') }}">
				Back
			</a>
		</p>
	</div>

	@if (Config::get('laravel-testimonials::show_adjacent_testimonials_on_view') && ($newer || $older))

		<div class="adjacent-testimonials">

			@if ($newer)
				<a href="{{ $newer->getUrl() }}" class="prev-post">{{ $newer->title }}</a>
			@endif

			@if ($older)
				<a href="{{ $older->getUrl() }}" class="next-post">{{ $older->title }}</a>
			@endif

		</div>

	@endif

</div>