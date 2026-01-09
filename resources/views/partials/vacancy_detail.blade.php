<div class="vacancy-detail">

	<h3>{{ $vacancy->title }}</h3>

	<div class="info">
		@if ($location = $vacancy->location()->first()) <p>Location: <b>{{ $location }}</b></p> @endif
		@if ($type = $vacancy->type()->first()) <p>Contract Type: <b>{{ $type }}</b></p> @endif
		<p>Salary: <b>{!! $vacancy->salary !!}</b></p>
		<p>Closing Date: <b>{{ $vacancy->end_date->format('M jS, Y') }}</b></p>
		@if (!empty($vacancy->reference)) <p>Ref: <b>{{ $vacancy->reference }}</b></p> @endif
	</div>

	{!! displayWysiwyg($vacancy->long_description) !!}

	<div class="buttons">
		<a href="{{ route('vacancy.apply', ['vacancy' => $vacancy]) }}" class="btn btn-primary apply">Apply Now</a>
		<a href="{{ route('register') }}" class="btn btn-outline-dark register">Register</a>
	</div>
</div>