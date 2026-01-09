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
				<h3 class="short-bottom-border">Register with<br>
					Wolviston</h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="register-wrapper">
		<div class="inner">

			<section>
				@include('partials.register_form')
			</section>

		</div>
	</div>

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
