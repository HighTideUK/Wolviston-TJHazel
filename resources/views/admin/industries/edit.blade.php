@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">

    @include('admin.partials.loading_overlay')
    
    <div class="card">

        <div class="body-header">
            <h2>{{ $title }}</h2>
            <p><a href="{{ route('admin.industries') }}" class="btn btn-outline-light">
                All Industries &nbsp;<i class="fal fa-chevron-right"></i>
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            <form method="POST" action="{{ $action }}" class="disable-on-submit" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label text-md-right">Title</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" value="{{ old('title', $industry->title) }}" required autofocus="autofocus">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label text-md-right">Sub-heading</label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="2" name="sub_heading">{{ old('sub_heading', $industry->sub_heading) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label text-md-right">Description</label>
                    <div class="col-md-10">
                        <textarea class="wysiwyg" rows="8" name="description">{{ old('description', $industry->description) }}</textarea>
                    </div>
                </div>

                @if (empty($industry->image))
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
                            <img src="{{ $industry->image_url }}" style="width:400px;height:auto">
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

                        <a class="btn btn-secondary" href="{{ route('admin.industries') }}">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection