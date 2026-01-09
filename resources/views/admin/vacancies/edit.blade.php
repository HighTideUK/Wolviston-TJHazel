@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">

    @include('admin.partials.loading_overlay')
    
    <div class="card">

        <div class="body-header">
            <h2>{{ $title }}</h2>
            <p><a href="{{ route('admin.vacancies') }}" class="btn btn-outline-light">
                All Vacancies &nbsp;<i class="fal fa-chevron-right"></i>
            </a></p>
        </div>

        <div class="card-body">
            @include('partials.flash_messages')

            <form method="POST" action="{{ $action }}" class="disable-on-submit" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Title</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" value="{{ old('title', $vacancy->title) }}" required autofocus="autofocus">
                    </div>
                </div>

                <div class="form-group row min-salary-row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Min Salary (&pound;)</label>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="salary_min" value="{{ old('salary_min', $vacancy->salary_min) }}">
                    </div>
                </div>

                <div class="form-group row max-salary-row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Max Salary (&pound;)</label>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="salary_max" value="{{ old('salary_max', $vacancy->salary_max) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="competitive_salary" class="col-sm-2 col-form-label text-md-right">&nbsp;</label>
                    <div class="col-md-2">
                        <div class="form-check">
                            @if ($vacancy->competitive_salary)
                                <input class="form-check-input" type="checkbox" value="1" id="competitive_salary" name="competitive_salary" checked>
                            @else
                                <input class="form-check-input" type="checkbox" value="1" id="competitive_salary" name="competitive_salary">
                            @endif
                            <label class="form-check-label" for="competitive_salary">
                                Mark salary as 'Competitive'
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Reference</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="reference" value="{{ old('reference', $vacancy->reference) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="short_description" class="col-sm-2 col-form-label text-md-right">Short Description</label>
                    <div class="col-md-10">
                        <textarea class="wysiwyg" rows="4" name="short_description">{{ old('short_description', $vacancy->short_description) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="long_description" class="col-sm-2 col-form-label text-md-right">Long Description</label>
                    <div class="col-md-10">
                        <textarea class="wysiwyg" rows="12" name="long_description">{{ old('long_description', $vacancy->long_description) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label text-md-right">Location</label>
                    <div class="col-md-4">
                        <select name="location" class="custom-select">
                            <option value="">-- select --</option>
                            @foreach (App\Location::orderBy('label')->get() as $location)
                                @if ($location->id === $vacancy->location_id)
                                    <option value="{{ $location->id }}" selected="selected">{{ $location }}</option>
                                @else
                                    <option value="{{ $location->id }}">{{ $location }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label text-md-right">Contract Type</label>
                    <div class="col-md-4">
                        <select name="type" class="custom-select">
                            <option value="">-- select --</option>
                            @foreach (App\VacancyType::orderBy('label')->get() as $type)
                                @if ($type->id === $vacancy->type_id)
                                    <option value="{{ $type->id }}" selected="selected">{{ $type }}</option>
                                @else
                                    <option value="{{ $type->id }}">{{ $type }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label text-md-right">Person</label>
                    <div class="col-md-4">
                        <select name="person" class="custom-select">
                            <option value="">-- select --</option>
                            @foreach (App\Person::orderBy('last_name')->get() as $person)
                                @if ($person->id === $vacancy->person_id)
                                    <option value="{{ $person->id }}" selected="selected">{{ $person }}</option>
                                @else
                                    <option value="{{ $person->id }}">{{ $person }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label text-md-right">Related Industries</label>
                    <div class="col-md-10">
                        <select name="related_industries[]" class="custom-select" multiple>
                            <option value="">-- select --</option>
                            @foreach (App\Industry::orderBy('label')->get() as $industry)
                                @if (in_array($industry->id, $relatedIndustries))
                                    <option value="{{ $industry->id }}" selected>{{ $industry }}</option>
                                @else
                                    <option value="{{ $industry->id }}">{{ $industry }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label text-md-right">Similar Vacancies</label>
                    <div class="col-md-10">
                        <select name="related_vacancies[]" class="custom-select" multiple>
                            <option value="">-- select --</option>
                            @foreach ($relatedVacanciesList as $relatedVacancy)
                                @if (in_array($relatedVacancy->id, $relatedVacancies))
                                    <option value="{{ $relatedVacancy->id }}" selected>{{ $relatedVacancy }}</option>
                                @else
                                    <option value="{{ $relatedVacancy->id }}">{{ $relatedVacancy }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="start_date" class="col-sm-2 col-form-label text-md-right">Start Date</label>
                    <div class="col-md-4">
                        <div class="input-group date datetimepicker4" data-target-input="nearest" id="start_date_picker">
                            <input type="text" class="form-control datetimepicker-input" data-target="#start_date_picker" name="start_date" value="{{ old('start_date', $vacancy->start_date) }}"/>
                            <div class="input-group-append" data-target="#expires_at_picker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="start_date" class="col-sm-2 col-form-label text-md-right">Closing Date</label>
                    <div class="col-md-4">
                        <div class="input-group date datetimepicker4" data-target-input="nearest" id="end_date_picker">
                            <input type="text" class="form-control datetimepicker-input" data-target="#end_date_picker" name="end_date" value="{{ old('end_date', $vacancy->end_date) }}"/>
                            <div class="input-group-append" data-target="#end_date_picker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($vacancy->id)
                    <div class="form-group row">
                        <label for="start_date" class="col-sm-2 col-form-label text-md-right">Applications</label>
                        <div class="col-md-10">
                            @include('admin.partials.applications', ['vacancy' => $vacancy])
                        </div>
                    </div>
                @endif

                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-2">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>

                        <a class="btn btn-secondary" href="{{ route('admin.vacancies') }}">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection