<div class="expertise-list-block">

	<div class="inner block-inner">

		<div class="left-block">

			<h3 class="short-bottom-border"><span>Our</span><br>
			Expertise</h3>

		</div>

		<div class="right-block">
			<div class="expertises">
				<ul>
					@foreach (App\Expertise::orderBy('order')->get() as $expertise)
						<li><a href="{{ $expertise->url }}">{{ $expertise }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>

	</div>

</div>