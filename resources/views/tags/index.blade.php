@extends('main')

@section('title', '| All Tags')

@section('content')
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<h1>Tags</h1>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
				@foreach($tags as $tag)
					<tr>
						<td>{{ $tag->id }}</td>
						<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<div class="well well-sm">
				<form action="{{ route('tags.store') }}" method="POST" role="form">
					{{ csrf_field() }}
					<h2>New Tag</h2>
					<label for="">Name</label>
					<input type="text"  name="name" class="form-control" placeholder="name">
					<button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">Submit</button>
				</form>
			</div>
		</div>

	</div>
@endsection