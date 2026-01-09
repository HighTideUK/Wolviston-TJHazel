@extends('layouts.app')

@section('content')

   <header class="dark">

		<div class="inner block-inner">
			<div class="top">
				<div class="logo">
					<a href="{{ route('home') }}"><img src="/images/logo_white.png" alt="" /></a>
				</div>

				<div class="buttons">
					<a href="{{ route('vacancies') }}">Find a Job</a>
					<a href="#" class="toggle-menu">Menu</a>
				</div>
			</div>

			<div class="body">
				<h3 class="short-bottom-border">Our<br>
					Vacancies</h3>
			</div>
		</div>

	</header>

	@include('partials.flash_alerts')

	<div class="vacancies-wrapper">
		<div class="inner">

			<aside>
				<h3 class="short-bottom-border">refine your search</h3>


				<form method="get">
					<div class="input-row">
						<input type="text" data-provide="typeahead" class="form-control typeahead-jobtitles" value="{{ request()->input('title') }}" placeholder="Job Title" name="title" autocomplete="off">
					</div>
					<div class="input-row">
						<select name="location" class="form-control">
							<option value="">All Locations</option>
							@foreach (App\Location::orderBy('label')->get() as $location)
								@if (request()->input('location') == $location->id)
									<option value="{{ $location->id }}" selected>{{ $location }}</option>
								@else
									<option value="{{ $location->id }}">{{ $location }}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="input-row">
						<select name="vacancy_type" class="form-control">
							<option value="">All Contract Types</option>
							@foreach (App\VacancyType::orderBy('label')->get() as $vacancyType)
								@if (request()->input('vacancy_type') == $vacancyType->id)
									<option value="{{ $vacancyType->id }}" selected>{{ $vacancyType }}</option>
								@else
									<option value="{{ $vacancyType->id }}">{{ $vacancyType }}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="input-row">
						<select name="industry" class="form-control">
							<option value="">All Industries</option>
							@foreach (App\Industry::orderBy('label')->get() as $industry)
								@if (request()->input('industry') == $industry->id)
									<option value="{{ $industry->id }}" selected>{{ $industry }}</option>
								@else
									<option value="{{ $industry->id }}">{{ $industry }}</option>
								@endif
							@endforeach
						</select>
					</div>

					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">&pound;</span>
						</div>
						<input type="number" name="salary" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Salary (GBP)" value="{{ request()->input('salary') }}">
					</div>

					<div class="input-row buttons">
						<button type="submit" class="btn btn-primary">Search</button>
						<!--
						<input type="reset" class="btn btn-outline-dark" />
						-->
					</div>
				</form>
			</aside>

			<section>

				<div class="vacancy-results-header">

					@if (method_exists($vacancies, 'links'))
						<p>results: {{ $vacancies->firstItem() }} – {{ $vacancies->count() }} of {{ $vacancies->total() }}</p>
					@else
						<p>results: 1 - {{ count($vacancies) }} of {{ count($vacancies) }}</p>
					@endif

					<p class="limit-options">jobs per page:
						@foreach ($limitOptions as $limit)
							@if ($currentLimit === $limit)
								<a href="{{ request()->fullUrlWithQuery(['limit' => $limit]) }}" class="selected">{{ $limit }}</a>
							@else
								<a href="{{ request()->fullUrlWithQuery(['limit' => $limit]) }}">{{ $limit }}</a>
							@endif
						@endforeach
					</p>

					<p class="sort-options">sort by: 
						@foreach ($sortOptions as $key => $label)
							@if ($currentSort === $key)
								<a href="{{ request()->fullUrlWithQuery(['sort' => $key]) }}" class="selected">{{ $label }}</a>
							@else
								<a href="{{ request()->fullUrlWithQuery(['sort' => $key]) }}">{{ $label }}</a>
							@endif
						@endforeach
					</p>
				</div>

				<div class="vacancy-results">
					
					@if (count($vacancies) > 0)

						@foreach ($vacancies as $vacancy)
							@include('snippets.vacancy_result', ['vacancy' => $vacancy])
						@endforeach

						@if (method_exists($vacancies, 'links'))
							{{ $vacancies->appends($appends)->links() }}
						@endif

					@else

						<div class="flash-alert-wrapper">
							<div class="alert alert-primary" role="alert">
  								Sorry, no current vacancies were found.
							</div>
						</div>

					@endif

				</div>

			</section>


		</div>
	</div>

	@include('partials.our_family')
	@include('partials.contact')
	@include('partials.footer')
	


@endsection
