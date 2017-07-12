@extends('main')

@section('title', '| edit post')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">

@endsection

@section('content')
	<div class="row">
		<form action="{{ route('posts.update', $posts->id) }}" method="POST" role="form">
			<input type="hidden" name="_method" value="PUT">
			{{ csrf_field() }}

			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<div class="form-group">
					<label for="">Title</label>
					<input type="text"  name="title" class="form-control" id="" placeholder="title" value="{{ $posts->title }}">

					<label for="">Slug</label>
					<input type="text"  name="slug" class="form-control" id="" placeholder="slug" value="{{ $posts->slug }}">

					<label for="">Category</label>
					<select name="category" id="input" class="form-control">
						@foreach($categories as $category)
						<option value="{{ $category->id }}" {{ $category->id == $posts->category->id ? "selected" : "" }}>{{ $category->name }}</option>
						@endforeach
					</select>

					<label for="">Tag</label>
					<select name="tag[]" id="input" class="form-control sel2-multi" multiple="multiple">
						@foreach($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
						@endforeach
					</select>

					<label for="">Post body</label>
					<textarea type="text" name="body" class="form-control" id="" rows="10" placeholder="Something new...">{{ $posts->body }}</textarea>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="well">
					<dl class="dl-horizontal">
						<dt>Created at:</dt>
						<dd>{{ date('M j, Y', strtotime($posts->created_at)) }}</dd>
					</dl>
					<dl class="dl-horizontal">
						<dt>Updated at:</dt>
						<dd>{{ date('M j, Y', strtotime($posts->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<a class="btn btn-primary btn-block" href="{{ route('posts.show', $posts->id) }}" role="button">Cancel</a>
						</div>

						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<button type="submit" class="btn btn-success btn-block">save</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

@endsection



@section('scripts')
<script src="{{ asset('js/select2.min.js') }}"></script>

<script type="text/javascript">
	$(".sel2-multi").select2();
	$(".sel2-multi").select2().val({!! $posts->tag()->allRelatedIds() !!}).trigger('change');
</script>
@endsection
