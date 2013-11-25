<div class="testimonial-details-testimonial">

	<h2 class="testimonial-title">
		{{ $testimonial->title }}
	</h2>

	@if ( !empty( $testimonial->you_tube_video_id ) )
		<div class="testimonial-youtube-video">
			{{
			str_replace('%YOU_TUBE_VIDEO_ID%', $testimonial->you_tube_video_id,
			Config::get('laravel-testimonials::you_tube_embed_code'))
			}}
		</div>
	@elseif ( !empty( $testimonial->main_image ) )
		<div class="main-image">
			<img src="{{ Config::get('laravel-testimonials::main_image_resized_dir') }}{{ $testimonial->main_image }}"
			     alt="{{ $testimonial->main_image_alt }}" width="{{ $testimonial->main_image_width }}"
			     height="{{ $testimonial->main_image_height }}" />
		</div>
	@endif
	
	<div class="testimonial-desc">
		{{ $testimonial->content }}
	</div>

	<div class="testimonial-source">
		<p>{{ $testimonial->source }}</p>
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