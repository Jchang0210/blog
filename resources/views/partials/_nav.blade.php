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
			<a class="navbar-brand" href="#">Title</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>
				<li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog">Blog</a></li>
				<li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">About</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="flase">my account <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('posts.index') }}">Post</a></li>
						<li><a href="#">Log out</a></li>
					</ul>

				</li>
			</ul>

		</div><!-- /.navbar-collapse -->


	</div>
</nav>