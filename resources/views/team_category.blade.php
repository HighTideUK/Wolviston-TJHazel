@extends('layouts.app')

@section('content')

   <header class="blue">

		<div class="inner block-inner">
			<div class="top">
				<div class="logo">
					<a href="{{ route('home') }}"><img src="/images/logo_white.png" alt="" /></a>
				</div>

				<div class="buttons">
					<a href="#" class="toggle-menu">Menu</a>
				</div>
			</div>

			<div class="body">
				<h3 class="short-bottom-border">About Wolviston<br>
					<span class="light">- Our Team</span></h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="team-block">

		<div class="inner block-inner">

			<div class="left-block">

				<h3 class="short-bottom-border">
					<span>Our</span><br>
					Team
				</h3>

			</div>

			<div class="right-block">
				<h4>Reputation built upon decades of experience.</h4>

				<p>We’re a team of reliable, highly-skilled land specialists, we deliver unparalleled results in getting the right people to the best organisations.</p>
				
			</div>

		</div>

		<div class="block-inner">

			<div class="team-member-categories">
				<ul>
					<li><a href="{{ route('team') }}">All</a></li>
					@foreach (App\PeopleCategory::orderBy('label')->get() as $peopleCategory)
						@if ($category->id === $peopleCategory->id)
							<li><a href="{{ $peopleCategory->url }}" class="selected">{{ $peopleCategory }}</a></li>
						@else
							<li><a href="{{ $peopleCategory->url }}">{{ $peopleCategory }}</a></li>
						@endif
					@endforeach
				</ul>
			</div>

			
			@if ($category->people()->count())
				<div class="team-members">
					@foreach ($category->people()->orderBy('order')->get() as $person)
						@include('snippets.team_member', ['person' => $person])
					@endforeach
				</div>
			@else
				<div class="alert alert-info" role="alert">
						No people found in this category
				</div>
				<br>
			@endif

		</div>

	</div>

	@include('partials.perfect_role')
	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
