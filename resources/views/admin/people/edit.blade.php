@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">

    @include('admin.partials.loading_overlay')
    
    <div class="card">

        <div class="body-header">
            <h2>{{ $title }}</h2>
            <p><a href="{{ route('admin.people') }}" class="btn btn-outline-light">
                All People &nbsp;<i class="fal fa-chevron-right"></i>
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            <form method="POST" action="{{ $action }}" class="disable-on-submit" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Firstname</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $person->first_name) }}" required autofocus="autofocus">
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Lastname</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $person->last_name) }}" required>
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Role</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="role" value="{{ old('role', $person->role) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Email</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control" name="email" value="{{ old('email', $person->email) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label text-md-right">Telephone</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="telephone" value="{{ old('telephone', $person->telephone) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bio" class="col-sm-2 col-form-label text-md-right">Bio</label>
                    <div class="col-md-10">
                        <textarea class="wysiwyg" rows="4" name="bio">{{ old('bio', $person->bio) }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label text-md-right">Category</label>
                    <div class="col-md-4">
                        <select name="category" class="custom-select">
                            <option value="">-- select --</option>
                            @foreach (App\PeopleCategory::orderBy('label')->get() as $category)
                                @if ($category->id === $person->category_id)
                                    <option value="{{ $category->id }}" selected="selected">{{ $category }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label text-md-right">Related Casestudies</label>
                    <div class="col-md-10">
                        <select name="casestudies[]" multiple="multiple" class="custom-select">
                            <option value="">-- select --</option>
                            @foreach (App\Casestudy::orderBy('title')->get() as $casestudy)
                                @if (in_array($casestudy->id, $selected_casestudies))
                                    <option value="{{ $casestudy->id }}" selected="selected">{{ $casestudy }}</option>
                                @else
                                    <option value="{{ $casestudy->id }}">{{ $casestudy }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                @if (empty($person->image))
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
                            <img src="{{ $person->image_url }}" style="width:400px;height:auto">
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

                <div class="form-group row">
                    <label for="twitter" class="col-sm-2 col-form-label text-md-right">Twitter URL</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="twitter" value="{{ old('twitter', $person->twitter) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="linkedin" class="col-sm-2 col-form-label text-md-right">LinkedIn URL</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="linkedin" value="{{ old('linkedin', $person->linkedin) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="facebook" class="col-sm-2 col-form-label text-md-right">Facebook URL</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="facebook" value="{{ old('facebook', $person->facebook) }}">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-2">
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>

                        <a class="btn btn-secondary" href="{{ route('admin.people') }}">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection