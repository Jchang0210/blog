@extends('main')

@section('title', '| delete comment')

@section('content')
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
			<h1>ARE YOU SURE YOU WANT TO DELETE THIS COMMET?</h1>
			<p>
				<strong>Name: </strong>{{ $comment->name }}
			</p>
			<p>
				<strong>Email: </strong>{{ $comment->email }}
			</p>
			<p>
				<strong>Commet: </strong>{{ $comment->comment }}
			</p>

			<form action="{{ route('comments.destroy', $comment->id) }}" method="POST" role="form">
				<input type="hidden" name="_method" value="DELETE">
				{{ csrf_field() }}

				<button type="submit" class="btn btn-danger" style="margin-top: 15px;">Delete</button>
			</form>
		</div>
	</div>
@endsection