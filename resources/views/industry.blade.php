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
				<h3 class="short-bottom-border">Our Industries<br>
					<span class="light">- {{ $industry }}</span>
				</h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="header-message industry" data-aos="fade-up">

		<div class="inner block-inner">

			<div class="arrow left-block">
				&nbsp;
			</div>

			<div class="body right-block">
				@if (!empty($industry->sub_heading))
					<h3 class="short-bottom-border">{{ $industry->sub_heading }}</h3>
				@endif
				{!! displayWysiwyg($industry->description) !!}
			</div>

		</div>

	</div>

	@if (!empty($industry->image))
		<div class="photo-block industry">
			<div class="inner">
				<div><img src="{{ $industry->image_url }}" alt="{{ $industry }}" /></div>
			</div>
		</div>
	@endif

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
