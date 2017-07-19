@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=b0ejl9pjypi2jabx4rqs6ckg1kucwmcb57g8r6c7aa3ykk5j"></script>
<script>
	tinymce.init({
		selector:'textarea',
		menubar: false,
		plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table contextmenu paste code',
			'textcolor'
		],
		toolbar: 'undo redo | insert | styleselect | forecolor backcolor | bullist numlist outdent indent',
		// toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
		content_css: [
			'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
			'//www.tinymce.com/css/codepen.min.css'
		]
	});
</script>
@endsection

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

					<label for="">Category</label>
					<select name="category" id="input" class="form-control">
						@foreach($categories as $key => $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>

					<label for="">Tag</label>
					<select name="tag[]" id="input" class="form-control sel2-multi" multiple="multiple">
						@foreach($tags as $key => $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
						@endforeach
					</select>

					<label for="">Post body</label>
					<textarea type="text" name="body" class="form-control" id="" rows="10" placeholder="Something new..."></textarea>
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>

		</div>
	</div>
@endsection

@section('scripts')
<script src="{{ asset('js/select2.min.js') }}"></script>

<script type="text/javascript">
	$(".sel2-multi").select2();

</script>
@endsection