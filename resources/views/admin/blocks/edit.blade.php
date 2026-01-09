@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">

    @include('admin.partials.loading_overlay')
    
    <div class="card">

        <div class="body-header">
            <h2>{{ $title }}</h2>
            <p><a href="{{ route('admin.blocks') }}" class="btn btn-outline-light">
                All Blocks &nbsp;<i class="fal fa-chevron-right"></i>
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            <form method="POST" action="{{ $action }}" class="disable-on-submit">
                @csrf

                 <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Title</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="title" value="{{ old('title', $block->title) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Keyword</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="slug" value="{{ old('slug', $block->slug) }}">
                        <small class="form-text text-muted">
                                Use a lowercase keyword to identify this block
                            </small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="content" class="col-sm-2 col-form-label text-md-right">Block Content</label>
                    <div class="col-md-10">
                        <textarea class="wysiwyg" rows="8" name="content">{{ old('content', $block->content) }}</textarea>
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-2">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>

                        <a class="btn btn-secondary" href="{{ route('admin.blocks') }}">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection