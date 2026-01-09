@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">

    @include('admin.partials.loading_overlay')
    
    <div class="card">

        <div class="body-header">
            <h2>{{ $title }}</h2>
            <p><a href="{{ route('admin.users') }}" class="btn btn-outline-light">
                All Admin Users &nbsp;<i class="fal fa-chevron-right"></i>
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            <form method="POST" action="{{ $action }}" class="disable-on-submit">
                @csrf

                 <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Name</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Email</label>
                    <div class="col-md-4">
                        <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Password</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" name="password" value="" autocomplete="off">
                        <small class="form-text text-muted">
                                Only complete if you wish to change the password
                            </small>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-2">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>

                        <a class="btn btn-secondary" href="{{ route('admin.users') }}">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection