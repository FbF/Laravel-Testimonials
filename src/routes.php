<?php

Route::get(	Config::get('laravel-testimonials::uri'), 'Fbf\LaravelTestimonials\TestimonialsController@index');

Route::get(	Config::get('laravel-testimonials::uri').'/{slug}', 'Fbf\LaravelTestimonials\TestimonialsController@view');