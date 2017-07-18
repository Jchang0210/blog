@extends('main')

@section('title', '| edit comment')

@section('content')
	<div class="row">
		<form action="{{ route('comments.update', $comment->id) }}" method="POST" role="form">
			<input type="hidden" name="_method" value="PUT">
			{{ csrf_field() }}

			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
				<h1>Edit Commnet</h1>
				<div class="form-group">
					<label for="">Name:</label>
					<input type="text"  name="name" class="form-control" id="" value="{{ $comment->name }}" disabled="disabled">

					<label for="">Email:</label>
					<input type="text"  name="email" class="form-control" id="" value="{{ $comment->email }}" disabled="disabled">

					<label for="">Comment:</label>
					<textarea type="text" name="comment" class="form-control" id="" rows="7">{{ $comment->comment }}</textarea>

					<button type="submit" class="btn btn-success" style="margin-top: 15px;">update comment</button>

				</div>
			</div>
		</form>
	</div>

@endsection