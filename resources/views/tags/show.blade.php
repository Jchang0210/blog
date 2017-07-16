@extends('main')

@section('title', "| $tag->name Tags")

@section('content')
	<div class="row">

		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
		</div>

		<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
			<a class="btn btn-primary pull-right btn-block" href="{{ route('tags.edit', $tag->id) }}" role="button" style="margin-top: 20px">Edit</a>
		</div>

		<div class="col-xs-4 col-sm-4 col-md-2 col-lg-2">
			<form action="{{ route('tags.destroy', $tag->id) }}" method="POST" role="form">
				<input type="hidden" name="_method" value="DELETE">
				{{ csrf_field() }}

				<button type="submit" class="btn btn-danger btn-block" style="margin-top: 20px">Delete</button>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Tags</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($tag->posts as $post)
					<tr>
						<td>{{ $post->id }}</td>
						<td>{{ $post->title }}</td>
						<td>
						@foreach( $post->tag as $tag )
							<span class="label label-default">{{ $tag->name }}</span>
						@endforeach
						</td>
						<td><a class="btn btn-sm btn-default" href="{{ route('posts.show', $post->id) }}" role="button">View</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection