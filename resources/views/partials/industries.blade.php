<div class="industry-list-block">

	<div class="inner block-inner">

		<div class="left-block">

			<h3 class="short-bottom-border"><span>Our</span>
			Industries</h3>

		</div>

		<div class="right-block">
			<div class="industries">
				<ul>
					@foreach (App\Industry::orderBy('order')->get() as $industry)
						<li><a href="{{ route('industries') }}#industry-{{ str_slug($industry->title) }}">{{ $industry }}</a></li>
					@endforeach
				</ul>
				<a href="{{ route('industries') }}" class="block-outline-btn">See All</a>
			</div>
		</div>

	</div>

</div>