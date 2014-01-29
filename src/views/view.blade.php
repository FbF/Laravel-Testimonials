@extends('layouts.master')

@section('title')
	{{ $testimonial->page_title }}
@endsection

@section('meta_description')
	{{ $testimonial->meta_description }}
@endsection

@section('meta_keywords')
	{{ $testimonial->meta_keywords }}
@endsection

@section('content')
	@include('laravel-testimonials::details')
@stop