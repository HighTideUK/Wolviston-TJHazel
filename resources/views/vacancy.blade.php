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
				&mdash; {{ $vacancy->title }}</h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="vacancy-wrapper">
		<div class="inner">

			<section>

				<p class="back-link">
					<a href="{{ route('vacancies') }}" class="short-bottom-border"><i class="fal fa-chevron-left"></i>  all vacancies</a>
				</p>

				@include('partials.vacancy_detail', ['vacancy' => $vacancy])
			</section>

			<aside>
				<div class="share">
					<a href="#" class="share_facebook"><i class="fab fa-facebook fw"></i> Share on Facebook</a>
					<a href="#" class="share_linkedin"><i class="fab fa-linkedin fw"></i> Share on LinkedIn</a>
					<a href="#" class="share_twitter"><i class="fab fa-twitter fw"></i> Share on Twitter</a>
				</div>
			</aside>

		</div>
	</div>

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
