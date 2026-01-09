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
				<h3 class="short-bottom-border">Our Services</h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="header-message reversed" data-aos="fade-up">

		<div class="inner block-inner">

			<div class="arrow left-block">
				&nbsp;
			</div>

			<div class="body right-block">
				<h3 class="short-bottom-border">
					{{ $expertise->label }}
				</h3>

				@if (!empty($expertise->sub_heading))
					<h4>{{ $expertise->sub_heading }}</h4>
				@endif

				{!! displayWysiwyg($expertise->description) !!}

			</div>

		</div>

	</div>

	<!--
	<div class="wide-image">
		<div class="inner block-inner">
			<img src="/images/expertise_image.jpg" alt="" />
		</div>
	</div>
	-->

	@if ($expertise->casestudies()->active()->count())
		<div class="selected-casestudies">
			<div class="inner block-inner">

				<h3 class="short-bottom-border"><span>Project Management</span>
					Case Studies</h3>

				<div class="casestudies">
					@foreach ($expertise->casestudies()->active()->get() as $casestudy)
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
