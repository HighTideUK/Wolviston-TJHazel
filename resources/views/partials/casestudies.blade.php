@if (count($casestudies) > 0)
	<div class="casestudies">
		@foreach ($casestudies as $casestudy)
			@if (isset($casestudy->placeholder))
				<div class="casestudy placeholder">
					<div class="outer">
						Coming Soon
					</div>
				</div>
			@else
				@include('snippets.casestudy', ['casestudy' => $casestudy])
			@endif
		@endforeach
	</div>
@else
	<div class="alert alert-info">
		There are currently no published casestudies in this category. Please check back again soon.
	</div>
@endif