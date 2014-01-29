@extends('layouts.master')

@section('title')
	{{ Config::get('laravel-testimonials::page_title') }}
@endsection

@section('meta_description')
	{{ Config::get('laravel-testimonials::meta_description') }}
@endsection

@section('meta_keywords')
	{{ Config::get('laravel-testimonials::meta_keywords') }}
@endsection

@section('content')
	@include('laravel-testimonials::list')
@stop