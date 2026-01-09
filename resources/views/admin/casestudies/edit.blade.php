@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">

    @include('admin.partials.loading_overlay')
    
    <div class="card">

        <div class="body-header">
            <h2>{{ $title }}</h2>
            <p><a href="{{ route('admin.casestudies') }}" class="btn btn-outline-light">
                All Casestudies &nbsp;<i class="fal fa-chevron-right"></i>
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            <form method="POST" action="{{ $action }}" class="disable-on-submit" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Title</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" value="{{ old('title', $casestudy->title) }}" required autofocus="autofocus">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="summary" class="col-sm-2 col-form-label text-md-right">Sub Heading</label>
                    <div class="col-md-10">
                        <textarea class="form-control" rows="2" name="sub_heading">{{ old('sub_heading', $casestudy->sub_heading) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label text-md-right">Article</label>
                    <div class="col-md-10">
                        <textarea class="wysiwyg" rows="8" name="description">{{ old('description', $casestudy->description) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="start_date" class="col-sm-2 col-form-label text-md-right">Publish Date</label>
                    <div class="col-md-4">
                        <div class="input-group date datetimepicker4" data-target-input="nearest" id="publish_date_picker">
                            <input type="text" class="form-control datetimepicker-input" data-target="#publish_date_picker" name="publish_date" value="{{ old('publish_date', $casestudy->publish_date) }}"/>
                            <div class="input-group-append" data-target="#publish_date_picker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label text-md-right">Related Expertise</label>
                    <div class="col-md-10">
                        <select name="expertise[]" multiple="multiple" class="custom-select">
                            <option value="">-- select --</option>
                            @foreach (App\Expertise::orderBy('label')->get() as $expertise)
                                @if (in_array($expertise->id, $selected_expertise))
                                    <option value="{{ $expertise->id }}" selected="selected">{{ $expertise }}</option>
                                @else
                                    <option value="{{ $expertise->id }}">{{ $expertise }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label text-md-right">Related Industries</label>
                    <div class="col-md-10">
                        <select name="industries[]" multiple="multiple" class="custom-select">
                            <option value="">-- select --</option>
                            @foreach (App\Industry::orderBy('title')->get() as $industry)
                                @if (in_array($industry->id, $selected_industries))
                                    <option value="{{ $industry->id }}" selected="selected">{{ $industry }}</option>
                                @else
                                    <option value="{{ $industry->id }}">{{ $industry }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                @if (empty($casestudy->listing_image))
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label text-md-right">Listing Image</label>
                        <div class="col-md-10">
                            <input type="file" name="listing_image">
                            <small class="form-text text-muted">
                                Upload a JPEG or PNG which is less than 2Mb
                            </small>
                        </div>
                    </div>
                @else
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label text-md-right">Listing Image</label>
                        <div class="col-md-10">
                            <img src="{{ $casestudy->listing_image_url }}" style="width:400px;height:auto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-check offset-md-2">
                            <input class="form-check-input" type="checkbox" name="remove_listing_image" id="removeListingImageCheck">
                            <label class="form-check-label" for="removeListingImageCheck">
                                Remove Listing Image
                            </label>
                        </div>
                    </div>
                @endif

                @if (empty($casestudy->feature_image))
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label text-md-right">Feature Image</label>
                        <div class="col-md-10">
                            <input type="file" name="feature_image">
                            <small class="form-text text-muted">
                                Upload a JPEG or PNG which is less than 2Mb
                            </small>
                        </div>
                    </div>
                @else
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label text-md-right">Feature Image</label>
                        <div class="col-md-10">
                            <img src="{{ $casestudy->feature_image_url }}" style="width:400px;height:auto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-check offset-md-2">
                            <input class="form-check-input" type="checkbox" name="remove_feature_image" id="removeFeatureImageCheck">
                            <label class="form-check-label" for="removeFeatureImageCheck">
                                Remove Feature Image
                            </label>
                        </div>
                    </div>
                @endif

                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-2">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>

                        <a class="btn btn-secondary" href="{{ route('admin.casestudies') }}">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection