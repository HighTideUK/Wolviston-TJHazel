@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">

    @include('admin.partials.loading_overlay')
    
    <div class="card">

        <div class="body-header">
            <h2>{{ $title }}</h2>
            <p><a href="{{ route('admin.news') }}" class="btn btn-outline-light">
                All Articles &nbsp;<i class="fal fa-chevron-right"></i>
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            <form method="POST" action="{{ $action }}" class="disable-on-submit" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <div class="form-check offset-md-2">
                        @if ($news->publish)
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
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Title</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" value="{{ old('title', $news->title) }}" required autofocus="autofocus">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="summary" class="col-sm-2 col-form-label text-md-right">Summary</label>
                    <div class="col-md-10">
                        <textarea class="wysiwyg" rows="4" name="summary">{{ old('summary', $news->summary) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label text-md-right">Article</label>
                    <div class="col-md-10">
                        <textarea class="wysiwyg" rows="8" name="description">{{ old('description', $news->description) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="start_date" class="col-sm-2 col-form-label text-md-right">Publish Date</label>
                    <div class="col-md-10">
                        <div class="input-group date datetimepicker4" data-target-input="nearest" id="publish_date_picker">
                            <input type="text" class="form-control datetimepicker-input" data-target="#publish_date_picker" name="publish_date" value="{{ old('publish_date', $news->publish_date) }}"/>
                            <div class="input-group-append" data-target="#expires_at_picker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row category_list_row">
                    <label for="location" class="col-sm-2 col-form-label text-md-right">Categories</label>
                    <div class="col-md-10">
                        <select name="categories[]" multiple="multiple" class="custom-select">
                            <option value="">-- select --</option>
                            @foreach (App\NewsCategory::orderBy('label')->get() as $category)
                                @if (in_array($category->id, $selected_categories))
                                    <option value="{{ $category->id }}" selected="selected">{{ $category }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                @if (empty($news->listing_image))
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
                            <img src="{{ $news->listing_image_url }}" style="width:400px;height:auto">
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

                @if (empty($news->feature_image))
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
                        <label for="image" class="col-sm-2 col-form-label text-md-right">Listing Image</label>
                        <div class="col-md-10">
                            <img src="{{ $news->feature_image_url }}" style="width:400px;height:auto">
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

                <div class="form-group row category_list_row">
                    <label for="location" class="col-sm-2 col-form-label text-md-right">Related Articles</label>
                    <div class="col-md-10">
                        <select name="related[]" multiple="multiple" class="custom-select">
                            <option value="">-- select --</option>
                            @foreach (App\News::orderBy('title')->get() as $relatedArticle)
                                @if (in_array($relatedArticle->id, $related))
                                    <option value="{{ $relatedArticle->id }}" selected="selected">{{ $relatedArticle }}</option>
                                @else
                                    <option value="{{ $relatedArticle->id }}">{{ $relatedArticle }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-2">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>

                        <a class="btn btn-secondary" href="{{ route('admin.news') }}">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection