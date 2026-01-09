@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">
    <div class="card">

        <div class="body-header">
            <h2><i class="fal {{ getAdminSectionIcon($active_nav['item']) }} fa-fw"></i> &nbsp;{{ $title }}</h2>
            <p><a href="{{ route('admin.registrations.export') }}" class="btn btn-outline-light">
                <i class="fal fa-file-export"></i> &nbsp;Export
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            @if (count($registrations) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Created On</th>
                            <th nowrap>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($registrations as $registration)
                        <tr data-id="{{ $registration->id }}">
                            <td>{{ $registration }}</td>
                            <td><a href="mailto:{{ $registration->email }}">{{ $registration->email }}</a></td>
                            <td>{{ $registration->phone }}</td>
                            <td>{{ $registration->created_at->format('M jS, Y') }}</td>
                            <td nowrap class="align-right action-buttons">
                                <a href="{{ route('admin.registration.download_cv', ['registration' => $registration->id ]) }}" class="btn btn-success">
                                    <i class="fal fa-arrow-to-bottom"></i> &nbsp;Download CV
                                </a>
                                <a href="{{ route('admin.registration.delete', ['registration' => $registration->id ]) }}" class="btn btn-danger confirm-action" data-confirm-title="Delete Registration" data-confirm-message="Are you sure? There is no undo.">
                                    <i class="fal fa-trash"></i> &nbsp;Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $registrations->links() }}

            @else
                <div class="alert alert-info">No registrations found</div>
            @endif

        </div>
    </div>
</div>
@endsection
