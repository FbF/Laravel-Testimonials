<?php

return array(

	/**
	 * Model title
	 *
	 * @type string
	 */
	'title' => 'Testimonials',

	/**
	 * The singular name of your model
	 *
	 * @type string
	 */
	'single' => 'testimonial',

	/**
	 * The class name of the Eloquent model that this config represents
	 *
	 * @type string
	 */
	'model' => 'Fbf\LaravelTestimonials\Testimonial',

	/**
	 * The columns array
	 *
	 * @type array
	 */
	'columns' => array(
		'title' => array(
			'title' => 'Title',
		),
		'source' => array(
			'title' => 'Source',
		),
		'published_date' => array(
			'title' => 'Published',
		),
		'status' => array(
			'title' => 'Status',
			'select' => "CASE (:table).status WHEN '".Fbf\LaravelTestimonials\Testimonial::APPROVED."' THEN 'Approved' WHEN '".Fbf\LaravelTestimonials\Testimonial::DRAFT."' THEN 'Draft' END",
		),
		'updated_at' => array(
			'title' => 'Last Updated',
		),
	),

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'title' => array(
			'title' => 'Title',
			'type' => 'text',
		),
		'main_image' => array(
			'title' => 'Main Image',
			'type' => 'image',
			'naming' => 'random',
			'location' => public_path() . Config::get('laravel-testimonials::main_image_originals_dir'),
			'size_limit' => 5,
			'sizes' => array(
				array(
					Config::get('laravel-testimonials::main_image_max_width'),
					Config::get('laravel-testimonials::main_image_max_height'),
					'auto',
					public_path() . Config::get('laravel-testimonials::main_image_resized_dir'),
					100
				),
			),
		),
		'main_image_alt' => array(
			'title' => 'Main Image ALT text',
			'type' => 'text',
		),
		'you_tube_video_id' => array(
			'title' => 'YouTube Video ID (Takes precedence over the main image if it\'s populated)',
			'type' => 'text',
		),
		'content' => array(
			'title' => 'Content',
			'type' => 'wysiwyg',
		),
		'source' => array(
			'title' => 'Source',
			'type' => 'text',
		),
		'slug' => array(
			'title' => 'Slug',
			'type' => 'text',
			'visible' => function($model)
				{
					return $model->exists;
				},
		),
		'page_title' => array(
			'title' => 'Page Title',
			'type' => 'text',
		),
		'meta_description' => array(
			'title' => 'Meta Description',
			'type' => 'textarea',
		),
		'meta_keywords' => array(
			'title' => 'Meta Keywords',
			'type' => 'textarea',
		),
		'status' => array(
			'type' => 'enum',
			'title' => 'Status',
			'options' => array(
				Fbf\LaravelTestimonials\Testimonial::DRAFT => 'Draft',
				Fbf\LaravelTestimonials\Testimonial::APPROVED => 'Approved',
			),
		),
		'published_date' => array(
			'title' => 'Published Date',
			'type' => 'datetime',
			'date_format' => 'yy-mm-dd', //optional, will default to this value
			'time_format' => 'HH:mm',    //optional, will default to this value
		),
		'created_at' => array(
			'title' => 'Created',
			'type' => 'datetime',
			'editable' => false,
		),
		'updated_at' => array(
			'title' => 'Updated',
			'type' => 'datetime',
			'editable' => false,
		),
	),

	/**
	 * The filter fields
	 *
	 * @type array
	 */
	'filters' => array(
		'title' => array(
			'title' => 'Title',
		),
		'source' => array(
			'title' => 'Source',
		),
		'content' => array(
			'type' => 'text',
			'title' => 'Content',
		),
		'status' => array(
			'type' => 'enum',
			'title' => 'Status',
			'options' => array(
				Fbf\LaravelTestimonials\Testimonial::DRAFT => 'Draft',
				Fbf\LaravelTestimonials\Testimonial::APPROVED => 'Approved',
			),
		),
		'published_date' => array(
			'title' => 'Published Date',
			'type' => 'date',
		),
	),

	/**
	 * The width of the model's edit form
	 *
	 * @type int
	 */
	'form_width' => 500,

	/**
	 * The sort options for a model
	 *
	 * @type array
	 */
	'sort' => array(
		'field' => 'updated_at',
		'direction' => 'desc',
	),

	/**
	 * If provided, this is run to construct the front-end link for your model
	 *
	 * @type function
	 */
	'link' => function($model)
		{
			return $model->getUrl();
		},

);


