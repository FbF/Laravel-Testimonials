Laravel Testimonials
====================

A Laravel 4 package for adding testimonials to a website

## Features

* Paginated index view with configurable results per page
* Draft/Approved status
* Soft deletes
* Configurable URLs, e.g. /testimonials or /testimonials/< testimonial slug >
* Fields for title, slug, image, you tube video, content, source, published date, status, page title, meta description and keywords

## Installation

Add the following to you composer.json file

    "fbf/laravel-testimonials": "dev-master"

Run

    composer update

Add the following to app/config/app.php

    'Fbf\LaravelTestimonials\LaravelTestimonialsServiceProvider'

Run the package migration

    php artisan migrate --package=fbf/laravel-testimonials

Publish the config

    php artisan config:publish fbf/laravel-testimonials

Create the relevant image upload directories that you specify in your config, e.g.

    public/uploads/packages/fbf/laravel-testimonials/originals
    public/uploads/packages/fbf/laravel-testimonials/thumbnails
    public/uploads/packages/fbf/laravel-testimonials/details

## Configuration

URI of the testimonials

	'uri' => 'testimonials',

Determines whether to show adjacent (i.e. previous and next) testimonials links on the testimonial view page

	'show_adjacent_testimonials_on_view' => true,

## Administrator

You can use the excellent Laravel Administrator package by frozennode to administer your blog.

http://administrator.frozennode.com/docs/installation

A ready-to-use model config file for the Testimonial model (testimonials.php) is provided in the src/config/administrator directory of the package, which you can copy into the app/config/administrator directory (or whatever you set as the model_config_path in the administrator config file).