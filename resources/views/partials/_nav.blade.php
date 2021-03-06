<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/blog">Title</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="{{ Request::is('/') ? "active" : "" }}"><a href="/blog">Home</a></li>
				<li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog/blog">Blog</a></li>
				<li class="{{ Request::is('about') ? "active" : "" }}"><a href="/blog/about">About</a></li>
				<li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/blog/contact">Contact</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
			@if (Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
			@else
				<li class="dropdown">

					<a href="/blog" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="flase">Hello {{ Auth::user()->name }} <span class="caret"></span></a>

					<ul class="dropdown-menu">
						<li><a href="{{ route('posts.index') }}">Post</a></li>
						<li><a href="{{ route('categories.index') }}">Category</a></li>
						<li><a href="{{ route('tags.index') }}">Tag</a></li>
						<li>
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
		                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                        {{ csrf_field() }}
		                    </form>
	                    </li>
					</ul>
				</li>
			@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>
