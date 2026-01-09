@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">

    @include('admin.partials.loading_overlay')
    
    <div class="card">

        <div class="body-header">
            <h2>{{ $title }}</h2>
            <p><a href="{{ route('admin.resources') }}" class="btn btn-outline-light">
                All Downloads &nbsp;<i class="fal fa-chevron-right"></i>
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            <form method="POST" action="{{ $action }}" class="disable-on-submit" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <div class="form-check offset-md-2">
                        @if ($resource->publish)
                            <input class="form-check-input" type="checkbox" name="publish" id="publishCheck" checked>
                        @else
                            <input class="form-check-input" type="checkbox" name="publish" id="publishCheck">
                        @endif
                        <label class="form-check-label" for="publishCheck">
                            Publish
                        </label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Label</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="label" value="{{ old('label', $resource->label) }}" required autofocus="autofocus">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label text-md-right">Description</label>
                    <div class="col-md-10">
                        <textarea class="wysiwyg" rows="8" name="description">{{ old('description', $resource->description) }}</textarea>
                    </div>
                </div>

                @if (empty($resource->filename))
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label text-md-right">Upload File</label>
                        <div class="col-md-10">
                            <input type="file" name="file">
                            <small class="form-text text-muted">
                                Upload a PDF or Word DOC which is less than 2Mb
                            </small>
                        </div>
                    </div>
                @else
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label text-md-right">FIle</label>
                        <div class="col-md-10">
                            <span class="form-text">
                                <a href="{{ $resource->downloadUrl }}" class="btn btn-primary"><i class="far fa-arrow-to-bottom"></i> &nbsp;Download</a>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-check offset-md-2">
                            <input class="form-check-input" type="checkbox" name="remove_file" id="removeImageCheck">
                            <label class="form-check-label" for="removeImageCheck">
                                Remove File
                            </label>
                        </div>
                    </div>
                @endif

                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-2">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>

                        <a class="btn btn-secondary" href="{{ route('admin.resources') }}">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection