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
				<h3 class="short-bottom-border">Our<br>
					Industries</h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="header-message reversed" data-aos="fade-up">

		<div class="inner block-inner">

			<div class="arrow left-block">
				&nbsp;
			</div>

			<div class="body right-block">
				<h3 class="short-bottom-border">
					<span>Our</span>
					Industries</h3>

				<h4>Our existing long-standing team of dedicated experts bring a wealth of knowledge across numerous industries.</h4>

				<p>Specialising in Civil, Structural and Building Design to a wide range of sectors, we deliver the highest quality of engineering design and detailing to some of the largest manufacturing, construction, developers and steel fabricators in the UK.</p>

			</div>

		</div>
	</div>

	<div class="wide-image">
		<div class="inner block-inner">
			<img src="/images/industries_image.jpg" alt="" />
		</div>
	</div>

	<div class="wide-body">

		<div class="inner block-inner">

			<div class="industries-list">
				@foreach (App\Industry::orderBy('order')->get() as $industry)
					@if (!empty($industry->image))
						<div class="block" style="background-image: url({{ $industry->imageUrl }}">
					@else
						<div class="block">
					@endif
						<a href="{{ $industry->url }}">
							<span>{{ $industry }}</span>
						</a>
					</div>
				@endforeach
			</div>

		</div>

	</div>

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
