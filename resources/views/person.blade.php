@extends('layouts.app')

@section('content')

   <header class="meet-the-team">

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
				<h3>Meet the Team</h3>
				<h4>{{ $person->name }} - {{ $person->role }}</h4>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="team-member-block">

		<div class="inner">

			<div class="image">
				@if (empty($person->image))
					<img src="/images/news_item.jpg" alt="" />
				@else
					<img src="{{ $person->image_url }}" alt="{{ $person->name }}" />
				@endif
			</div>

			<div class="body">

				<h3>{{ $person->name }}
				<span>{{ $person->role }}</span></h3>

				{!! displayWysiwyg($person->bio) !!}

				@if ($person->hasContactInfo())
					<div class="contact-details">
						@if (!empty($person->telephone)) <p>Telephone: <strong>{{ $person->telephone }}</strong></p> @endif
						@if (!empty($person->email)) <p>Email: <strong><a href="mailto:{{ $person->email }}">{{ $person->email }}</a></strong></p> @endif
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
						</div>
					@endif
				@endif
				
			</div>
		</div>
	</div>

	@if ($person->casestudies()->active()->count())
		<div class="selected-casestudies">
			<div class="inner block-inner">

				<h3 class="short-bottom-border"><span>My Favourite</span>
					T J Hazell Projects</h3>

				<div class="casestudies">
					@foreach ($person->casestudies()->active()->orderBy('publish_date', 'desc')->get() as $casestudy)
						<div class="casestudy">
							<div class="image">
								<a href="{{ $casestudy->url }}">
									<img src="{{ $casestudy->listing_image_url }}" alt="" />
								</a>
							</div>
							<div class="body">
								<div class="body-inner">
									<h3>{{ $casestudy->title }}</h3>
									<div class="button">
										<a href="{{ $casestudy->listing_image_url }}" class="block-outline-btn">Read More</a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>

		</div>
	@endif

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
