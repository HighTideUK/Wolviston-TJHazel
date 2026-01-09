@if (App\Casestudy::active()->count())
	<div class="latest-casestudies">
		<div class="inner block-inner">
			<div class="casestudies">
				@foreach (App\Casestudy::active()->orderBy('publish_date', 'desc')->take(3)->get() as $casestudy)
					<div class="casestudy">
						<div class="image">
							<a href="{{ $casestudy->url }}">
								<img src="{{ $casestudy->listing_image_url }}" alt="" />
							</a>
						</div>
						<div class="body">
							<div class="body-inner">
								<h3 class="short-bottom-border">Case Study<br>
									<span>{{ $casestudy->title }}</span>
								</h3>
								@if (!empty($casestudy->sub_heading))
									<p>{{ $casestudy->sub_heading }}</p>
								@endif
								<div class="button">
									<a href="{{ $casestudy->url }}" class="block-outline-btn">See More</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>

	</div>
@endif