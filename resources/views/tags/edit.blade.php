@extends('main')

@section('title', '| Edit Tag')

@section('content')
	<div class="row">
		<form action="{{ route('tags.update', $tag->id) }}" method="POST" role="form">
			<input type="hidden" name="_method" value="PUT">
			{{ csrf_field() }}

			<h2>Edit Tag</h2>
			<label for="">Name</label>
			<input type="text"  name="name" class="form-control" placeholder="name" value="{{ $tag->name }}">

			<button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>

		</form>
	</div>
@endsection