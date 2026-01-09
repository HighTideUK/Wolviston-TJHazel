<div class="news_item">

	<div class="body">

		<div class="content">
			<h4><a href="{{ $article->url }}">{{ $article->title }}</a></h4>
			
			{!! displayWysiwyg($article->summary) !!}

		</div>

		<div class="info">
			<span>{{ $article->publish_date->format('M jS, Y') }}</span>
		</div>
	</div>

	@if (!empty($article->listing_image))
		<aside>
			<img src="{{ $article->listing_image_url }}" alt="{{ $article->title }}" />
		</aside>
	@endif

</div>