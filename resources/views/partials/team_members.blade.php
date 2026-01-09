@if (count($people) > 0)
	<div class="team-members">
		@foreach ($people as $person)
			@include('snippets.team_member', ['person' => $person])
		@endforeach
	</div>
@else
	<div class="alert alert-info">
		Sorry, no team members were found in this category.
	</div>
@endif