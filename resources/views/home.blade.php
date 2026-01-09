@extends('layouts.app')

@section('content')

   <header>

		<div class="inner block-inner">
			<div class="top">
				<div class="logo">
					<a href="{{ route('home') }}"><img src="/images/home_logo.png" alt="" /></a>
				</div>

				<div class="buttons">
					<a href="#" class="toggle-menu">Menu</a>
				</div>
			</div>

			<div class="body">
				<h3>Shaping the world to engineer your success</h3>
				<p>Providing innovative solutions for today’s complex engineering challenges.</p>
				<a href="{{ route('about') }}">About Us</a>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="header-message" data-aos="fade-up">

		<div class="inner block-inner">

			<div class="arrow left-block">
				&nbsp;
			</div>

			<div class="body right-block">
				<h3 class="short-bottom-border">
					<span>About Us</span>
					Shaping the world around us</h3>

				<p>Providing a unique solution to meet ever-changing global demands, T J Hazell expertly handles the design and detailing of multi-million-pound infrastructure projects to smaller one-off developments.</p>

				<a href="{{ route('about') }}" class="block-outline-btn">See More</a>
			</div>

		</div>

	</div>

	@include('partials.expertise')
	@include('partials.latest_casestudies')
	@include('partials.industries')
	@include('partials.latest_news')
	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
