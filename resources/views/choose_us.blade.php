@extends('layouts.app')

@section('content')

   <header class="blue">

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
				<h3 class="short-bottom-border">Why Choose<br>
					Us?</h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="header-message choose_us">
		<div class="inner block-inner">
			<div class="left-block">
				<h3 class="short-bottom-border">Experienced and<br>
					Established</h3>
			</div>
			<div class="right-block">
				<h4>As market leaders in recruitment, engineering and training; we have over 35 years’ experience of successfully sourcing and placing candidates into careers for a wide portfolio of clients.</h4>

				<p>We don’t simply align CVs to open positions; we listen to our clients and our candidates, to ensure the perfect match.</p>

				<p>Not only do we help you to identify and attract talent, we negotiate terms, filter applications and manage the whole interview process. This relieves the pressure on your recruiting managers and enables you to find the right people suited to the job and culture of your organisation.</p>
			</div>
		</div>
	</div>

	<div class="choose-us-blocks">

		<div class="block blue">
			<div class="wrap">
				<div class="inner">
					<h3>Global Insights</h3>
					<p>Our ability to match high-calibre candidates to career opportunities means we are primed to fulfil any recruitment needs from individual assignments to a long term account on a temporary or permanent basis.</p>
					<p>We have an extensive network of invaluable industry contacts and our team of in-house experts specialise in the key sectors that we service. They have deep local expertise of each industry, which ensures relevant and far reaching coverage for clients and candidates alike.</p>
				</div>
			</div>
		</div>

		<div class="block dark">
			<div class="wrap">
				<div class="inner">
					<h3>Enviable Talent Communities</h3>
					<p>We operate on a global basis within all major industries, specialising in the recruitment of engineering, project controls, project services, commercial, accounting and IT personnel.</p>
					<p>We delve deeper into new talent communities providing a transformational recruitment approach benefiting both the individual and the recruiting organisation.</p>
				</div>
			</div>
		</div>

		<div class="block light">
			<div class="wrap">
				<div class="inner">
					<h3>A Tailored Approach</h3>
					<p>With an experienced team of recruitment experts, we have the capability to provide our clients with exceptional service levels and an innate ability to achieve their business objectives.</p>
					<p>That’s why our clients plan their business growth strategies in line with our effective, personalised recruitment service for up-to-date industry insights and advanced candidate engagement.</p>
				</div>
			</div>
		</div>

	</div>
	
	@include('partials.expertise_list')
	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
