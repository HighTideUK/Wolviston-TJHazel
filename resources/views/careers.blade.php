@extends('layouts.app')

@section('content')

   <header class="blue">

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
				<h3 class="short-bottom-border">About T J Hazell<br>
				Engineering Consultants</h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="header-message" data-aos="fade-up">

		<div class="inner block-inner">

			<div class="arrow left-block">
				<img src="/images/light_half_arrow.png" alt="" />
			</div>

			<div class="body right-block">
				<h3 class="short-bottom-border">
					<span>About Us</span>
					Shaping the world around us through innovative design engineering</h3>

				<h4>T J Hazell’s bespoke service delivers an independent, high-value service through a team of talented Engineers and Designers.</h4>

				<p>Our existing long-standing team of dedicated experts bring a wealth of knowledge across numerous industries. We continuously increase our capabilities by additional selective recruitment to further expand and strengthen our capability both technically and geographically.</p>

				<p>Specialising in civil, structural and building design to a wide range of sectors, T J Hazell delivers the highest quality of engineering design and detailing to some of the largest manufacturing, construction, developers and steel fabricators in the UK.</p>

				<p>Whilst currently offering multi-discipline design and construction services through joint ventures and partnering, we have ambitious plans to develop our existing services by offering inhouse multi-disciplinary design and project management through organic growth and strategic acquisition.</p>

				<p>From the design and build of multi-million-pound infrastructure projects to smaller one-off developments, the talented team at T J Hazell can tackle even the most complex of specifications, providing a unique solution to meet ever-changing global demands.</p>

				<p>Enabling cost efficiencies and extending the benefit of value engineering are key drivers for us alongside collaboration. The clients we work with benefit from over four decades of our technical and engineering expertise, re-shaping the built environment to meet the future needs of individuals and businesses alike.</p>

				<p>We work across all major industries, with our expertise spanning an array of sectors, from Power Generation to Petrochemical; we offer insight and impact through innovative solutions, designed to succeed. </p>

				<p>From our offices in the North East and North West of England, our structural and civil engineering design and detailing service provides exceptional project management and precise controls, the combination of which means transformation is both measurable and impactful for each and every project.</p>

				<p>Our full suite of design and detailing proficiencies mean that our in-house experts provide fully integrated project services, including:</p>

				<ul>
					@foreach (App\Expertise::orderBy('order')->get() as $expertise)
						<li><a href="{{ $expertise->url }}">{{ $expertise }}</a></li>
					@endforeach
				</ul>

				<p>The combination of our global expertise and local knowledge has seen us solve intricate design challenges all over the world. Explore a selection of our ambitious and innovative projects here. </p>


				<!--
				<a href="{{ route('expertise') }}" class="block-outline-btn">See More</a>
				-->

			</div>

		</div>

	</div>

	<div class="photo-block">
		<div class="inner">
			<div><img src="/images/about_us_left.jpg" alt="" /></div>
			<div><img src="/images/about_us_right.jpg" alt="" /></div>
		</div>
	</div>

	@include('snippets.team_block')
	@include('snippets.careers_block')
	@include('snippets.downloads_block')

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
