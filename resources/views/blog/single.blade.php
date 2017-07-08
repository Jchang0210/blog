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
		</div>
	</div>
@endsection