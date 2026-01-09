@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">
    <div class="card">

        <div class="body-header">
            <h2><i class="fal {{ getAdminSectionIcon($active_nav['item']) }} fa-fw"></i> &nbsp;{{ $title }}</h2>
            <p><a href="{{ route('admin.resource.new') }}" class="btn btn-outline-light">
                <i class="fal fa-plus"></i> &nbsp;Add New Download
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            @if (count($resources) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:100px">Re-order</th>
                            <th>Label</th>
                            <th>Created On</th>
                            <th nowrap>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody id="drag_reorder_rows" data-model="resources">
                    @foreach ($resources as $resource)
                        <tr data-id="{{ $resource->id }}">
                            <td class="handle"><i class="fas fa-arrows"></i></td>
                            <td>{{ $resource->label }}</td>
                            <td>{{ $resource->created_at->format('M jS, Y') }}</td>
                            <td nowrap class="align-right action-buttons">
                                @if (!empty($resource->filename))
                                    <a href="{{ $resource->downloadUrl }}" class="btn btn-primary">
                                        <i class="fal fa-arrow-to-bottom"></i> &nbsp;Download
                                    </a>
                                @endif
                                <a href="{{ route('admin.resource.edit', ['resource' => $resource->id ]) }}" class="btn btn-success">
                                    <i class="fal fa-pencil-alt"></i> &nbsp;Edit
                                </a>
                                <a href="{{ route('admin.resource.delete', ['resource' => $resource->id ]) }}" class="btn btn-danger confirm-action" data-confirm-title="Delete Resource" data-confirm-message="Are you sure? There is no undo.">
                                    <i class="fal fa-trash"></i> &nbsp;Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $resources->links() }}

            @else
                <div class="alert alert-info">No downloads found</div>
            @endif

        </div>
    </div>
</div>
@endsection
