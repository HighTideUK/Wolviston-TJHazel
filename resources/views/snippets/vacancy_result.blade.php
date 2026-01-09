<div class="vacancy-result">

	<h4 class="short-bottom-border">
		<a href="{{ $vacancy->url }}">{{ $vacancy }}</a>
	</h4>

	<div class="info">
		@if ($location = $vacancy->location()->first()) <p>Location: <b>{{ $location }}</b></p> @endif
		@if ($type = $vacancy->type()->first()) <p>Contract Type: <b>{{ $type }}</b></p> @endif
		<p>Salary: <b>{!! $vacancy->salary !!}</b></p>
		<p>Closing Date: <b>{{ $vacancy->end_date->format('M jS, Y') }}</b></p>
		@if (!empty($vacancy->reference)) <p>Ref: <b>{{ $vacancy->reference }}</b></p> @endif
	</div>

	{!! displayWysiwyg($vacancy->short_description) !!}

	<a href="{{ $vacancy->url }}" class="block-outline-btn">Find out more</a>
</div>