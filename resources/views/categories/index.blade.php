@extends('main')

@section('title', '| All Categories')

@section('content')
	<div class="row">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<h1>Categories</h1>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
				@foreach($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<div class="well well-sm">
				<form action="{{ route('categories.store') }}" method="POST" role="form">
					{{ csrf_field() }}
					<h2>New Category</h2>
					<label for="">Name</label>
					<input type="text"  name="name" class="form-control" placeholder="name">
					<button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">Submit</button>
				</form>
			</div>
		</div>

	</div>
@endsection