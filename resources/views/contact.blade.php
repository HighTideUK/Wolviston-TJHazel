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
				<h3>Contact Us</h3>
				<h4>Talk to us about your project</h4>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="contact-wrapper">

		<div class="inner">
			<h3 class='short-bottom-border'>If you would like to know more about the sectors in which we operate or the services we provide, get in touch today.</h3>

			<aside>
				@include('snippets.addresses')
			</aside>

			<div class="body">

				<section>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2314.247527603016!2d-1.32264398411595!3d54.54676188024814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487e9308bcf0e80d%3A0xe6b7eab3cfa9728a!2sWolviston%20House%2C%20Falcon%20Ct%2C%20Stockton-on-Tees%20TS18%203TS!5e0!3m2!1sen!2suk!4v1580205115861!5m2!1sen!2suk" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</section>

			</div>

		</div>
	</div>

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
