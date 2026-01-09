<div class="casestudy">
	<div class="outer">
		@if (!empty($casestudy->listing_image))
			<div class="image" style="background-image: url({{ $casestudy->listing_image_url }})">
		@else
			<div class="image">
		@endif
			<div class="inner">
				<div class="links">
					<div class="name">
						<h4>{{ $casestudy->title }}</h4>
					</div>
					<div class="button">
						<a href="{{ $casestudy->url }}">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>