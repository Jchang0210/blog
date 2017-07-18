@extends('main')

@section('title', '| Archive')

@section('content')
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
			<h1>Blog</h1>
		</div>
	</div>

    @foreach($posts as $post)
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>{{ $post->title }}</h3>
            <h5>Published: {{ date('M j, Y', strtotime($post->create_at)) }}</h5>
            <p>{{ mb_substr(strip_tags($post->body), 0, 250) }}{{ mb_strlen(strip_tags($post->body)) > 250 ? "..." : "" }}</p>
            <a href="{{ route('blog.single', $post->slug) }}">Read More</a>

        </div>
    </div>
    <hr>
    @endforeach

    <div class="text-center">
		{{ $posts->links() }}
	</div>
@endsection