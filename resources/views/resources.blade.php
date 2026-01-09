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
				<h3 class="short-bottom-border">Accreditations and Downloads</h3>
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
					<span>Accreditations and</span>
					Downloads</h3>

				<img src="/images/bsi-and-ukas.png" alt="" style="width:200px;height:auto;float:right;margin-left:10px" />

				<h4>We assure the highest quality, safety and reliability as we strive to achieve and maintain a variety of accreditations.<br>
					Quality Management System: ISO 9001:2015</h4>

				<p>We are extremely proud of our accreditations and work hard to continuously develop procedures to national and international standards, ensuring the highest quality, safety and reliability.</p>

				<!--
				<a href="{{ route('expertise') }}" class="block-outline-btn">See More</a>
				-->
			</div>

		</div>

	</div>

	<div class="resources-content">

		<div class="inner">

			<div class="items">

				@if (App\Resource::active()->count() > 0)
					@foreach (App\Resource::active()->orderBy('order')->get() as $resource)
						@include('snippets.resource_item', ['resource' => $resource])
					@endforeach
				@else
					<div class="alert alert-info">
						Sorry, there are currently no downloads available
					</div>
				@endif

			</div>

		</div>

	</div>

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
