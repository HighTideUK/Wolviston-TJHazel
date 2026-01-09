<div class="team-member">
	<div class="outer">
		<div class="image" style="background-image: url({{ $person->image_url }})">
			<div class="inner">
				<div class="links">
					<div class="button">
						<a href="{{ $person->url }}">Read More</a>
					</div>
					@if ($person->hasSocialLinks())
						<div class="social-icons">
							@if (!empty($person->linkedin))
								<a href="{{ $person->linkedin }}" target="_blank">
									<span><i class="fab fa-linkedin-in fa-fw"></i></span>
								</a>
							@endif
							@if (!empty($person->twitter))
								<a href="{{ $person->twitter }}" target="_blank">
									<span><i class="fab fa-twitter fa-fw"></i></span>
								</a>
							@endif
							@if (!empty($person->facebook))
								<a href="{{ $person->facebook }}" target="_blank">
									<span><i class="fab fa-facebook-f fa-fw"></i></span>
								</a>
							@endif
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="name">
		<h4>{{ $person->name }}</h4>
		<p>{{ $person->role }}</p>
	</div>
</div>