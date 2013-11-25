<?php

return array(

	/**
	 * The base URI for testimonials
	 */
	'uri' => 'testimonials',

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
	 * YouTube Embed Player code used if a testimonial has a You Tube Video ID set
	 * instead of a Main Image. Changing the settings will apply to all testimonials that
	 * have a You Tube Video on them. The placeholder "%YOU_TUBE_VIDEO_ID%" is
	 * replaced with the You Tube Video ID in the database for this page.
	 */
	'you_tube_embed_code' => '<iframe width="560" height="315" src="//www.youtube.com/embed/%YOU_TUBE_VIDEO_ID%?rel=0" frameborder="0" allowfullscreen></iframe>',

	/**
	 * The path, relative to the public_path() directory, where the original uploaded main images are stored.
	 */
	'main_image_originals_dir' => '/uploads/packages/fbf/laravel-testimonials/originals/',

	/**
	 * The path, relative to the public_path() directory, where the resized main images are stored.
	 */
	'main_image_resized_dir' => '/uploads/packages/fbf/laravel-testimonials/resized/',

	/**
	 * The max width of the main images. The resized version of main images will fit within this size
	 */
	'main_image_max_width' => 450,

	/**
	 * The max height of the main images. The resized version of main images will fit within this size
	 */
	'main_image_max_height' => 450,

);