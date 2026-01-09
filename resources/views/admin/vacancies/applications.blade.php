@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">
    <div class="card">

        <div class="body-header">
                <h2><i class="fal {{ getAdminSectionIcon($active_nav['item']) }} fa-fw"></i> &nbsp;{{ $title }}</h2>
                <p><a href="#" onclick="history.back();return false" class="btn btn-outline-light">
                    <i class="fal fa-chevron-left"></i> &nbsp;back
                </a></p>
            </div>

        <div class="card-body">    

            @include('partials.flash_messages')

            <h3>{{ $vacancy }}</h3>

            @include('admin.partials.applications', ['vacancy' => $vacancy])

        </div>
    </div>
</div>
@endsection
