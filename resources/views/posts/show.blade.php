@extends('main')

@section('title', '| show post')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('css/posts.css') }}">
@endsection

@section('content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<h1 class="word-wrap">{{ $posts->title }}</h1>

			<p class="lead word-wrap">{!! $posts->body !!}</p>

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

			<dir class="backend-comments" style="padding-left: 0px; margin-top: 50px;">
				<h3>Comments <small>{{ $posts->comments()->count() }} total</small></h3>

				<table class="table table-hover word-wrap">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="70px"></th>
						</tr>
					</thead>
					<tbody>
					@foreach($posts->comments as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>
								<a class="btn btn-xs btn-primary" href="{{ route('comments.edit', $comment->id ) }}" role="button"><span class="glyphicon glyphicon-pencil"></span></a>
								<a class="btn btn-xs btn-danger" href="{{ route('comments.delete', $comment->id ) }}" role="button"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</dir>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>URL:</label>
					<p><a href="{{ route('blog.single', $posts->slug) }}">{{ route('blog.single', $posts->slug) }}</a></p>
				</dl>
				<dl class="dl-horizontal">
					<label>Category:</label>
					<p>{{ $posts->category->name }}</p>
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