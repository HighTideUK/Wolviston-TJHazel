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
				<h3>Our Experience</h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="header-message casestudy" data-aos="fade-up">

		<div class="inner block-inner">

			<div class="body right-block">
				<h3 class="short-bottom-border">
					<span>Our</span>
					Case Studies</h3>

				<p>Our project successes span the globe and feature expertly designed solutions for an array of structures and complex projects.
Overcoming multi-disciplinary challenges whilst injecting expertise and experience has seen us take on massive tonnage, high complexity jobs; delighting clients with our innovative outlook, accuracy and attention to detail.</p>


				<div class="expertise-bullets">
						<div class="item">
							<a href="{{ route('casestudies') }}" class="load-casestudies selected">
								<div>
									<i class="fal fa-square"></i>
									<span>All</span>
								</div>
							</a>
						</div>
					@foreach ($industryRecords as $industryRecord)
						<div class="item">
							<a href="{{ route('casestudies.industry', ['industry' => $industryRecord->id]) }}" class="load-casestudies" data-industry="{{ $industryRecord->id }}">
								<div>
									<i class="fal fa-square"></i>
									<span>{{ $industryRecord }}</span>
								</div>
							</a>
						</div>
					@endforeach
				</div>

			</div>

		</div>

	</div>

	<div class="casestudies-block">
		<div class="block-inner">
				<div id="load-casestudies">
					<i class="fas fa-spinner fa-spin"></i>
				</div>
			</div>
		</div>

	</div>

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
