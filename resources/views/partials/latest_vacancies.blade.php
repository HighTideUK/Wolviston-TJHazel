@if (App\Vacancy::active()->count())
	<div class="latest-vacancies">

		<div class="inner block-inner">

			<h3 class="short-bottom-border">
						<span>Our Latest</span><br>
						Vacancies</h3>

			<div class="vacancies">

				@foreach (App\Vacancy::active()->get() as $vacancy)
					@include('snippets.vacancy_block', ['vacancy' => $vacancy])
				@endforeach

			</div>

			<a href="{{ route('vacancies') }}" class="block-outline-btn">See All</a>

		</div>

	</div>
@endif