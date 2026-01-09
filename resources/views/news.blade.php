@extends('layouts.app')

@section('content')

   <header class="blue">

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
				<h3 class="short-bottom-border">News and Insights</h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="news-wrapper">
		<div class="inner">

			<aside>

				<h3 class="short-bottom-border">filter posts</h3>

				<div class="buttons">
					@if (!isset($selectedCategory->id))
						<a href="{{ route('news') }}" class="btn btn-dark btn-block">All</a>
					@else
						<a href="{{ route('news') }}" class="btn btn-outline-primary btn-block">All</a>
					@endif
					@foreach (App\NewsCategory::orderBy('label')->get() as $category)
						@if (isset($selectedCategory->id) && $category->id === $selectedCategory->id)
							<a href="{{ $category->url }}" class="btn btn-dark btn-block">{{ $category }}</a>
						@else
							<a href="{{ $category->url }}" class="btn btn-outline-primary btn-block">{{ $category }}</a>
						@endif
					@endforeach
				</div>
				
			</aside>

			<section>

				<div class="news_items">
					
					@if (count($articles) > 0)
						@foreach ($articles as $article)
							@include('snippets.news_item', ['article' => $article])
						@endforeach
					@else
						<div class="alert alert-info">
							Sorry, there are currently no published news articles in this section
						</div>
					@endif

				</div>

				{{ $articles->links() }}

			</section>


		</div>
	</div>

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
