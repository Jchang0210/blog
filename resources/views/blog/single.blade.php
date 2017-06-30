@extends('main')

@section('title', '| ' . $posts->title)

@section('content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1>{{ $posts->title }}</h1>
			<p>{{ $posts->body }}</p>
		</div>
	</div>
@endsection