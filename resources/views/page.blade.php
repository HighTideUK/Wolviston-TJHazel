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
				<h3 class="short-bottom-border">{{ $page->title }}</h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="page-outer">

		<div class="page-inner">
			{!! displayWysiwyg($page->content) !!}
		</div>

	</div>

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
