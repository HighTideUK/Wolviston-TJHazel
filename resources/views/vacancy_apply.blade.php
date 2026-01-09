@extends('layouts.app')

@section('content')

   <header class="dark">

		<div class="inner block-inner">
			<div class="top">
				<div class="logo">
					<a href="{{ route('home') }}"><img src="/images/logo_white.png" alt="" /></a>
				</div>

				<div class="buttons">
					<a href="{{ route('vacancies') }}">Find a Job</a>
					<a href="#" class="toggle-menu">Menu</a>
				</div>
			</div>

			<div class="body">
				<h3 class="short-bottom-border">Our Vacancies<br>
				&mdash; {{ $vacancy }}</h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="vacancy-wrapper">
		<div class="inner">

			<section>

				<p class="back-link">
					<a href="{{ $vacancy->url }}" class="short-bottom-border"><i class="fal fa-chevron-left"></i>  back to vacancy</a>
				</p>

				@include('partials.vacancy_apply')
			</section>

			<aside>
				<div class="share">
					<a href="#"><i class="fas fa-envelope fw"></i> Email to a friend</a>
					<a href="#"><i class="fab fa-facebook fw"></i> Share on Facebook</a>
					<a href="#"><i class="fab fa-linkedin fw"></i> Share on LinkedIn</a>
					<a href="#"><i class="fab fa-twitter fw"></i> Share on Twitter</a>
				</div>
			</aside>

		</div>
	</div>

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
