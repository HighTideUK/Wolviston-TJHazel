@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">

    @include('admin.partials.loading_overlay')
    
    <div class="card">

        <div class="body-header">
            <h2>{{ $title }}</h2>
            <p><a href="{{ route('admin.expertise') }}" class="btn btn-outline-light">
                All Services &nbsp;<i class="fal fa-chevron-right"></i>
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            <form method="POST" action="{{ $action }}" class="disable-on-submit" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Title</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="label" value="{{ old('label', $expertise->label) }}" required autofocus="autofocus">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sub_heading" class="col-sm-2 col-form-label text-md-right">Sub-heading</label>
                    <div class="col-md-10">
                        <textarea rows="2" class="form-control" name="sub_heading">{{ old('sub_heading', $expertise->sub_heading) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label text-md-right">Description</label>
                    <div class="col-md-10">
                        <textarea class="wysiwyg" rows="8" name="description">{{ old('description', $expertise->description) }}</textarea>
                    </div>
                </div>

                @if (empty($expertise->image))
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label text-md-right">Image</label>
                        <div class="col-md-10">
                            <input type="file" name="image">
                            <small class="form-text text-muted">
                                Upload a JPEG or PNG which is less than 2Mb
                            </small>
                        </div>
                    </div>
                @else
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label text-md-right">Image</label>
                        <div class="col-md-10">
                            <img src="{{ $expertise->image_url }}" style="width:400px;height:auto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-check offset-md-2">
                            <input class="form-check-input" type="checkbox" name="remove_image" id="removeImageCheck">
                            <label class="form-check-label" for="removeImageCheck">
                                Remove Image
                            </label>
                        </div>
                    </div>
                @endif

                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-2">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>

                        <a class="btn btn-secondary" href="{{ route('admin.expertise') }}">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection