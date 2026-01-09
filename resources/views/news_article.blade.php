@extends('layouts.app')

@section('content')

   <header>

		<div class="inner block-inner">
			<div class="top">
				<div class="logo">
					<a href="{{ route('home') }}"><img src="/images/header_logo.png" alt="" /></a>
				</div>

				<div class="buttons">
					<a href="#" class="toggle-menu">Menu</a>
				</div>
			</div>

			<div class="body">
				<h3 class="short-bottom-border">News and Insights<br>
					<span class="light">- {{ $article->title }}</span></h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="news-article">
		<div class="inner">

			<div class="content">

				<!--
				<h4>{{ $article->title }}</h4>
				-->

				@if (!empty($article->feature_image))
					<div class="image">
						<img src="{{ $article->feature_image_url }}" alt="" />
					</div>
				@endif

				{!! displayWysiwyg($article->description) !!}

				<div class="share-block">
					<div class="block">
						<a href="#"><i class="fas fa-envelope fw"></i> Email to a friend</a>
					</div>
					<div class="block">
						<a href="#"><i class="fab fa-facebook fw"></i> Share on Facebook</a>
					</div>
					<div class="block">
						<a href="#"><i class="fab fa-linkedin fw"></i> Share on LinkedIn</a>
					</div>
					<div class="block">
						<a href="#"><i class="fab fa-twitter fw"></i> Share on Twitter</a>
					</div>
				</div>

				@if ($article->related()->active()->count() > 0)
					<div class="related-block">
						<h3 class="short-bottom-border">Related<br>
							<span>Posts</span></h3>
						<div class="links">
							<ul>
								@foreach ($article->related()->active()->orderBy('publish_date', 'desc')->get() as $article)
									<li>
										<div class="inner-link">
											<a href="{{ $article->url }}">{{ $article }}</a>
											<span>{{ $article->publish_date->format('M jS, Y') }}</span>
										</div>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				@endif

			</div>

		</div>
	</div>

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
