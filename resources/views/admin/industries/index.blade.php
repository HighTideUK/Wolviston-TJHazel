@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">
    <div class="card">

        <div class="body-header">
                <h2><i class="fal {{ getAdminSectionIcon($active_nav['item']) }} fa-fw"></i> &nbsp;{{ $title }}</h2>
                <p><a href="{{ route('admin.industry.new') }}" class="btn btn-outline-light">
                    <i class="fal fa-plus"></i> &nbsp;Add New Industry
                </a></p>
            </div>

        <div class="card-body">    

            @include('partials.flash_messages')

            @if (count($industries) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:100px">Re-order</th>
                            <th>Label</th>
                            <th nowrap>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody id="drag_reorder_rows" data-model="industries">
                    @foreach ($industries as $industry)
                        <tr data-id="{{ $industry->id }}">
                            <td class="handle"><i class="fas fa-arrows"></i></td>
                            <td>{{ $industry }}</td>
                            <td nowrap class="align-right action-buttons">
                                <a href="{{ route('admin.industry.edit', ['industry' => $industry->id ]) }}" class="btn btn-success">
                                    <i class="fal fa-pencil-alt"></i> &nbsp;Edit
                                </a>
                                <a href="{{ route('admin.industry.delete', ['industry' => $industry->id ]) }}" class="btn btn-danger confirm-action" data-confirm-title="Delete Industry" data-confirm-message="Are you sure? There is no undo.">
                                    <i class="fal fa-trash"></i> &nbsp;Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $industries->links() }}

            @else
                <div class="alert alert-info">No industries found</div>
            @endif

        </div>
    </div>
</div>
@endsection
