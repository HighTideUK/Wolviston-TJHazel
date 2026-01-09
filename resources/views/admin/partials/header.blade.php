<div class="header">
    <header>
    	<p><a href="{{ route('home') }}"><img src="/images/admin_logo.png" alt="{{ config('app.name') }}" /></a></p>
		<div>
			Logged in as <strong>{{ auth()->user()->name }}</strong>
		</div>
	</header>
    @include('admin.partials.nav')
</div>