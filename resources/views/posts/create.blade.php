@extends('main')

@section('title', '| Create New Post')

@section('content')
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
			<h1>Create New Post</h1>
			<hr>

			<form action="{{ route('posts.store') }}" method="POST" role="form">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="">Title</label>
					<input type="text"  name="title" class="form-control" id="" placeholder="title">

					<label for="">Slug</label>
					<input type="text"  name="slug" class="form-control" id="" placeholder="slug">

					<label for="">Post body</label>
					<textarea type="text" name="body" class="form-control" id="" rows="10" placeholder="Something new..."></textarea>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>

		</div>
	</div>

@endsection

