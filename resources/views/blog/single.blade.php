@extends('main')

@section('title', '| ' . $posts->title)

@section('content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
			{{-- {{ dump($posts->category) }} --}}
			<h1>{{ $posts->title }}</h1>
			<p>{{ $posts->body }}</p>
			<hr>
			<p>{{ $posts->category->name }}</p>
			<div class="tag">

			@foreach ($posts->tag as $tag)
				@if($tag->name == "PHP")
					@php($colorCode = "#8E44AD")
				@elseif($tag->name == "Java")
					@php($colorCode = "#CB4335")
				@elseif($tag->name == "Laravel")
					@php($colorCode = "#A93226")
				@elseif($tag->name == "Python")
					@php($colorCode = "#D4AC0D")
				@elseif($tag->name == "Mongo DB")
					@php($colorCode = "#28B463")
				@elseif($tag->name == "R")
					@php($colorCode = "#2E86C1")
				@elseif($tag->name == "Ruby")
					@php($colorCode = "#EC7063")
				@else
					@php($colorCode = "#707B7C")
				@endif

				<span class="label label-default" style="background-color: {{ $colorCode }};">{{ $tag->name }}</span>
			@endforeach
			</div>
		</div>
	</div>
@endsection