<?php

return array(

	/**
	 * The base URI for testimonials
	 */
	'uri' => 'testimonials',

	/**
	 * Page title of the testimonials index page
	 *
	 * @type string
	 */
	'index_page_title' => 'My testimonials index page',

	/**
	 * Meta description of the testimonials index page
	 *
	 * @type string
	 */
	'index_page_meta_description' => 'This is the description for my testimonials index page',

	/**
	 * Meta keywords of the testimonials index page
	 *
	 * @type string
	 */
	'index_page_meta_keywords' => 'These are the keywords for my testimonials index page',

	/**
	 * The view to use for the testimonials index page. You can change this to a view in your
	 * app, and inside your own view you can @include the various elements in the package
	 * or you can use this one provided, but there's no layout or anything.
	 */
	'index_view' => 'laravel-testimonials::index',

	/**
	 * The view to use for the testimonials detail page. You can change this to a view in your
	 * app, and inside your own view you can @include the various elements in the package
	 * or you can use this one provided, but there's no layout or anything.
	 */
	'view_view' => 'laravel-testimonials::view',

	/**
	 * Determines whether to show adjacent (i.e. previous and next) testimonials links on the testimonial view page
	 *
	 * @type bool
	 */
	'show_adjacent_testimonials_on_view' => true,

	/**
	 * Config settings for the YouTube Video
	 */
	'you_tube' => array(

		/**
		 * Whether the YouTube field is shown in the administrator config
		 */
		'show' => true,

		/**
		 * YouTube Embed Player code used if a testimonial has a You Tube Video ID set
		 * instead of a Main Image. Changing the settings will apply to all testimonials that
		 * have a You Tube Video on them. The placeholder "%YOU_TUBE_VIDEO_ID%" is
		 * replaced with the You Tube Video ID in the database for this page.
		 */
		'embed_code' => '<iframe width="560" height="315" src="//www.youtube.com/embed/%YOU_TUBE_VIDEO_ID%?rel=0" frameborder="0" allowfullscreen></iframe>',

		/**
		 * YouTube Thumbnail code used if a testimonial has a You Tube Video ID set instead of an Image. Changing the
		 * settings will apply to all entries on the index pages for testimonials that have a You Tube Video . The
		 * placeholder "%YOU_TUBE_VIDEO_ID%" is replaced with the You Tube Video ID in the database for this page.
		 */
		'thumbnail_code' => '<img src="//img.youtube.com/vi/%YOU_TUBE_VIDEO_ID%/mqdefault.jpg" width="200" height="150" />',

	),

	/**
	 * Config settings for the image
	 */
	'image' => array(

		'show' => true,

		'original' => array(

			'dir' => '/uploads/packages/fbf/laravel-testimonials/original/',

		),

		'sizes' => array(

			'resized' => array(

				'dir' => '/uploads/packages/fbf/laravel-testimonials/resized/',
				'width' => 450,
				'height' => 450,

			),

			'thumbnail' => array(

				'dir' => '/uploads/packages/fbf/laravel-testimonials/thumbnail/',
				'width' => 200,
				'height' => 150,

			),

		),

	),

	/**
	 * Config settings for the faker seed
	 */
	'seed' => array(

		/**
		 * Should the seeder append (replace = false) or replace (true)
		 */
		'replace' => true,

		/**
		 * List of the you tube video ids that could be used
		 */
		'you_tube_video_ids' => array(
			'dQw4w9WgXcQ'
		),

		/**
		 * One in every X posts is a YouTube Video (use 0 for no YouTube Videos)
		 */
		'you_tube_video_freq' => 5,

		/**
		 * One in every X posts that is not a YouTube Video, has an image (use 0 for no images)
		 */
		'image_freq' => 2,

	),

);