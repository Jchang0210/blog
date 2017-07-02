@extends('main')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('css/posts.css') }}">
@endsection

@section('title', '| Post')

@section('content')
	<div class="row">
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<h1>All Post</h1>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-right">
			<a class="btn btn-primary btn-spacing" href="{{ route('posts.create') }}" role="button">New Post</a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>body</th>
						<th>create at</th>
						<th>update at</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($posts as $post)
					<tr>
						<td>{{ $post->id }}</td>
						<td>{{ $post->title }}</td>
						<td>{{ mb_substr($post->body, 0, 50) }}{{ mb_strlen($post->body) > 50 ? "..." : "" }}</td>
						<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
						<td>{{ date('M j, Y', strtotime($post->updated_at)) }}</td>
						<td><a class="btn btn-default" href="{{ route('posts.show', $post->id) }}" role="button">View</a></td>
						<td><a class="btn btn-default" href="{{ route('posts.edit', $post->id) }}" role="button">Edit</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>

			<div class="text-center">
				{{ $posts->links() }}
			</div>
		</div>
	</div>


@endsection

