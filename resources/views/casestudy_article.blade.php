@extends('layouts.app')

@section('content')

   <header class="dark">

		<div class="inner block-inner">
			<div class="top">
				<div class="logo">
					<a href="{{ route('home') }}"><img src="/images/admin_logo.png" alt="" /></a>
				</div>

				<div class="buttons">
					<a href="#" class="toggle-menu">Menu</a>
				</div>
			</div>

			<div class="body">
				<h3>{{ $casestudy }}</h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="header-message casestudy" data-aos="fade-up">

		<div class="inner block-inner">

			<div class="arrow left-block">
				&nbsp;
			</div>

			<div class="body right-block">
				<h3 class="short-bottom-border">
					{{ $casestudy->sub_heading }}</h3>

				{!! displayWysiwyg($casestudy->description) !!}

			</div>

		</div>

	</div>

	@if (!empty($casestudy->feature_image) || !empty($casestudy->listing_image))
		<div class="inner block-inner">
				<div class="casestudy-article-images">
				@if (!empty($casestudy->feature_image))
					<div class="image" style="background-image:url({{ $casestudy->feature_image_url }})"></div>
				@endif
				@if (!empty($casestudy->listing_image))
					<div class="image" style="background-image:url({{ $casestudy->listing_image_url }})"></div>
				@endif
			</div>
		</div>
	@endif

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
