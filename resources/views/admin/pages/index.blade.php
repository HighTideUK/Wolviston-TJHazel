@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">
    <div class="card">

        <div class="body-header">
            <h2><i class="fal {{ getAdminSectionIcon($active_nav['item']) }} fa-fw"></i> &nbsp;{{ $title }}</h2>
            <p><a href="{{ route('admin.page.new') }}" class="btn btn-outline-light">
                <i class="fal fa-plus"></i> &nbsp;Add New Page
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            @if (count($pages) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>URL</th>
                            <th nowrap>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td>{{ $page->title }}</td>
                            <td><a href="{{ $page->url }}" target="_new">{{ $page->url }}</a></td>
                            <td nowrap class="align-right action-buttons">
                                <a href="{{ route('admin.page.edit', ['page' => $page->id ]) }}" class="btn btn-success">
                                    <i class="fal fa-pencil-alt"></i> &nbsp;Edit
                                </a>
                                <a href="{{ route('admin.page.delete', ['page' => $page->id ]) }}" class="btn btn-danger confirm-action" data-confirm-title="Delete Page" data-confirm-message="Are you sure? There is no undo.">
                                    <i class="fal fa-trash"></i> &nbsp;Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $pages->links() }}

            @else
                <div class="alert alert-info">No pages found</div>
            @endif

        </div>
    </div>
</div>
@endsection
