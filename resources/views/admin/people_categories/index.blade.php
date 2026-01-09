@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">
    <div class="card">

        <div class="body-header">
            <h2><i class="fal {{ getAdminSectionIcon($active_nav['item']) }} fa-fw"></i> &nbsp;{{ $title }}</h2>
            <p><a href="{{ route('admin.people_categories.new') }}" class="btn btn-outline-light">
                <i class="fal fa-plus"></i> &nbsp;Add New Category
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            @if (count($categories) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Label</th>
                            <th nowrap>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody id="drag_reorder_rows" data-model="people">
                    @foreach ($categories as $category)
                        <tr data-id="{{ $category->id }}">
                            <td>{{ $category->label }}</td>
                            <td nowrap class="align-right action-buttons">
                                <a href="{{ route('admin.people_categories.edit', ['category' => $category->id ]) }}" class="btn btn-success">
                                    <i class="fal fa-pencil-alt"></i> &nbsp;Edit
                                </a>
                                <a href="{{ route('admin.people_categories.delete', ['category' => $category->id ]) }}" class="btn btn-danger confirm-action" data-confirm-title="Delete Category" data-confirm-message="Are you sure? There is no undo.">
                                    <i class="fal fa-trash"></i> &nbsp;Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $categories->links() }}

            @else
                <div class="alert alert-info">No categories found</div>
            @endif

        </div>
    </div>
</div>
@endsection
