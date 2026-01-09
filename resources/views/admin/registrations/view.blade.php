@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">
    <div class="card">

        <div class="body-header">
            <h2>{{ $title }}</h2>
            <p><a href="{{ route('admin.registrations') }}" class="btn btn-outline-light">
                All Registrations &nbsp;<i class="fal fa-chevron-right"></i>
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

                <table class="table">

                    <tr>
                        <th>Name</th>
                        <td>{{ $registration->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><a href="mailto:{{ $registration->email }}">{{ $registration->email }}</a></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $registration->phone }}</td>
                    </tr>
                    <tr>
                        <th>Industries</th>
                        <td>@if ($registration->industries()->count() > 0)
                            <p class="plaintext">
                                @foreach ($registration->industries()->pluck('label') as $industry)
                                    {{ $industry }}<br>
                                @endforeach
                            </p>
                        @else
                            None
                        @endif</td>
                    </tr>
                    <tr>
                        <th>Locations</th>
                        <td>@if ($registration->locations()->count() > 0)
                            <p class="plaintext">
                                @foreach ($registration->locations()->pluck('label') as $location)
                                    {{ $location }}<br>
                                @endforeach
                            </p>
                        @else
                            None
                        @endif</td>
                    </tr>
                    <tr>
                        <th>Vacancy Types</th>
                        <td>@if ($registration->vacancyTypes()->count() > 0)
                            <p class="plaintext">
                                @foreach ($registration->vacancyTypes()->pluck('label') as $vacancyType)
                                    {{ $vacancyType }}<br>
                                @endforeach
                            </p>
                        @else
                            None
                        @endif</td>
                    </tr>

                </table>

                <a class="btn btn-secondary" href="{{ route('admin.registrations') }}">Back</a>

        </div>
    </div>
</div>
@endsection