@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">
    <div class="card">

        <div class="body-header">
                <h2><i class="fal {{ getAdminSectionIcon($active_nav['item']) }} fa-fw"></i> &nbsp;{{ $title }}</h2>
                <p><a href="{{ route('admin.vacancy.new') }}" class="btn btn-outline-light">
                    <i class="fal fa-plus"></i> &nbsp;Add New Vacancy
                </a></p>
            </div>

        <div class="card-body">    

            @include('partials.flash_messages')

            @if (count($vacancies) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Applications</th>
                            <th nowrap>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($vacancies as $vacancy)
                        <tr data-id="{{ $vacancy->id }}">
                            <td>{{ $vacancy }}</td>
                            <td>@if ($type = $vacancy->type()->first())
                                {{ $type }}
                            @endif</td>
                            <td>@if ($location = $vacancy->location()->first())
                                {{ $location }}
                            @endif</td>
                            <td>{{ $vacancy->start_date->format('M jS, Y') }}</td>
                            <td>{{ $vacancy->end_date->format('M jS, Y') }}</td>
                            <td>
                                @if ($vacancy->applications()->count() > 0)
                                    {{ $vacancy->applications()->count() }} &nbsp;<a href="{{ route('admin.applications', ['vacancy' => $vacancy]) }}">View</a>
                                @else
                                    <span class="note">n/a</span>
                                @endif
                            </td>
                            <td nowrap class="align-right">
                                <a href="{{ route('admin.vacancy.edit', ['vacancy' => $vacancy->id ]) }}" class="btn btn-success">
                                    <i class="fal fa-pencil-alt"></i> &nbsp;Edit
                                </a>
                                <a href="{{ route('admin.vacancy.delete', ['vacancy' => $vacancy->id ]) }}" class="btn btn-danger confirm-action" data-confirm-title="Delete Vacancy" data-confirm-message="Are you sure? There is no undo.">
                                    <i class="fal fa-trash"></i> &nbsp;Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $vacancies->links() }}

            @else
                <div class="alert alert-info">No vacancies found</div>
            @endif

        </div>
    </div>
</div>
@endsection
