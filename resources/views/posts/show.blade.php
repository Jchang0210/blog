@extends('main')

@section('title', '| show post')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('css/posts.css') }}">
@endsection

@section('content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<h1 class="word-wrap">{{ $posts->title }}</h1>
			<p class="lead word-wrap">{{ $posts->body }}</p>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>URL:</label>
					<p><a href="{{ route('blog.single', $posts->slug) }}">{{ route('blog.single', $posts->slug) }}</a></p>
				</dl>
				<dl class="dl-horizontal">
					<label>Created at:</label>
					<p>{{ date('M j, Y', strtotime($posts->created_at)) }}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Updated at:</label>
					<p>{{ date('M j, Y', strtotime($posts->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<a class="btn btn-primary btn-block" href="{{ route('posts.edit', $posts->id) }}" role="button">Edit</a>
					</div>

					<form action="{{ route('posts.destroy', $posts->id) }}" method="POST" role="form">
						<input type="hidden" name="_method" value="DELETE">
						{{ csrf_field() }}

						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<button type="submit" class="btn btn-danger btn-block">Delete</button>
						</div>
					</form>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<a class="btn btn-default btn-block" href="{{ route('posts.index') }}">&#60;&#60; See All Posts</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection