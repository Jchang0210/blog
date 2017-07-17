@extends('main')

@section('title', '| ' . $posts->title)

@section('content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
			{{-- {{ dump($posts->category) }} --}}
			<h1>{{ $posts->title }}</h1>
			<p>{{ $posts->body }}</p>
			<hr>
			<p>Posted In: {{ $posts->category->name }}</p>
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

	<br>
	<hr>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
		@foreach($posts->comments as $comment)
			<div class="comment">
				<p><strong>Name:</strong> {{ $comment->name }}</p>
				<p><strong>Comment:</strong><br>{{ $comment->comment }}</p>
				<hr>
			</div>
		@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2" style="margin-top: 20px;">
			<form action="{{ route('comments.store', $posts->id) }}" method="POST" role="form">
				{{ csrf_field() }}

				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<label>Name:</label>
						<input type="text"  name="name" class="form-control" placeholder="name">
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<label>Email:</label>
						<input type="text"  name="email" class="form-control" placeholder="email">
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label>Comment:</label>
						<textarea type="text" name="comment" class="form-control" rows="5" placeholder="comment..."></textarea>

						<button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">Submit</button>
					</div>

				</div>
			</form>
		</div>
	</div>
@endsection