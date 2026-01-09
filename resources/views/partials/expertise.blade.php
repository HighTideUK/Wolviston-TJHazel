<div class="expertise-blocks">
	<div class="inner block-inner">
		<div class="blocks">
			@foreach (App\Expertise::orderBy('order')->get() as $expertise)
				<div class="block">
					@if (!empty($expertise->image))
						<a href="{{ $expertise->url }}" style="background-image:url({{ $expertise->image_url }})">
					@else
						<a href="{{ $expertise->url }}">
					@endif
						<span class="short-bottom-border">
							{{ $expertise }}
						</span>
					</a>
				</div>
			@endforeach
		</div>
	</div>
</div>