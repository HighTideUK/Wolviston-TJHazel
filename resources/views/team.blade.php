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
				<h3>{{ $title }}</h3>
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
					<span>Meet</span>
					The Team</h3>

				<h4>Meet our resident experts and read all about their wealth of industry experience.</h4>

				<p>Our strongest asset is the people who make up our team - qualified and talented individuals who bring expertise to our innovative projects and stay with the business. Our specialist team of highly skilled experts and engineering consultants cover all aspects of Civil, Structural and Building Design. Learn more about each team member below.</p>

				<p>Visit our <a href="{{ route('careers') }}">careers page</a> to discover current opportunities to join our team.</p>

			</div>

		</div>

	</div>

	<div class="team-block">

		<div class="block-inner">
			<div class="team-member-categories">
				<ul>
					<li><a href="#" class="selected">All</a></li>
					@foreach (App\PeopleCategory::orderBy('label')->get() as $peopleCategory)
						<li><a href="#" data-category="{{ $peopleCategory->id }}">{{ $peopleCategory }}</a></li>
					@endforeach
				</ul>
			</div>

			<div id="team-members">
				<i class="fas fa-spinner fa-spin"></i>
			</div>
			
		</div>

	</div>

	@include('snippets.careers_block')

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
