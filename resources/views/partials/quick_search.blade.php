<div class="quick-search">

	<div class="inner block-inner">

		<h3 class="short-bottom-border">
					<span>Quick</span><br>
					Search</h3>

		<form action="{{ route('vacancies') }}" method="get">
			<div class="fields">
				<div class="field">
					<input type="text" class="form-control typeahead-jobtitles" name="title" value="" placeholder="enter job title" autocomplete="off">
				</div>
				<div class="field">
					<select name="location" class="form-control">
						<option value="">All Locations</option>
						@foreach (App\Location::orderBy('label')->get() as $location)
							<option value="{{ $location->id }}">{{ $location }}</option>
						@endforeach
					</select>
				</div>
				<div class="submit">
					<button type="submit" class="btn btn-primary" name="search">Search</button>
				</div>
			</div>
		</form>

	</div>

</div>