@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">

    @include('admin.partials.loading_overlay')
    
    <div class="card">

        <div class="body-header">
            <h2>{{ $title }}</h2>
            <p><a href="{{ route('admin.locations') }}" class="btn btn-outline-light">
                All Locations &nbsp;<i class="fal fa-chevron-right"></i>
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            <form method="POST" action="{{ $action }}" class="disable-on-submit" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Label</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="label" value="{{ old('label', $location->label) }}" required autofocus="autofocus">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-2">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>

                        <a class="btn btn-secondary" href="{{ route('admin.locations') }}">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection