@if (App\News::active()->count() > 0)
	<div class="latest-news">

		<div class="inner block-inner">

			<h3 class="short-bottom-border">
						<span>Our News and</span><br>
						Insights</h3>

			<div class="news_items">

				@foreach (App\News::active()->orderBy('publish_date', 'desc')->take(5)->get() as $article)
					@include('snippets.news_item', ['article' => $article])
				@endforeach

				<div class="news_item footer">

					<div class="body">
						<div class="content">
							<p>See all of our news and insights</p>
						</div>
					</div>

					<aside>
						<a href="{{ route('news') }}" class="block-outline-btn">See All</a>
					</aside>

				</div>

			</div>

		</div>

	</div>
@endif