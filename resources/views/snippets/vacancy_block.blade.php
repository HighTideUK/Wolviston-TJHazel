<div class="vacancy">

	<h4>{{ $vacancy->title }}</h4>

	<div class="info">
		@if ($location = $vacancy->location()->first()) <p>Location: <b>{{ $location }}</b></p> @endif
		@if ($type = $vacancy->type()->first()) <p>Contract Type: <b>{{ $type }}</b></p> @endif
		<p>Salary: <b>{!! $vacancy->salary !!}</b></p>
	</div>

	<div class="info">
		<p>Closing Date: <b>{{ $vacancy->end_date->format('M jS, Y') }}</b></p>
		@if (!empty($vacancy->reference)) <p>Ref: <b>{{ $vacancy->reference }}</b></p> @endif
	</div>

	<a href="{{ $vacancy->url }}" class="block-outline-btn">Find out more</a>
	
</div>