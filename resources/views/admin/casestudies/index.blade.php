@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">
    <div class="card">

        <div class="body-header">
            <h2><i class="fal {{ getAdminSectionIcon($active_nav['item']) }} fa-fw"></i> &nbsp;{{ $title }}</h2>
            <p><a href="{{ route('admin.casestudies.new') }}" class="btn btn-outline-light">
                <i class="fal fa-plus"></i> &nbsp;Add New Casestudy
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            @if (count($casestudies) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Publish Date</th>
                            <th nowrap>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($casestudies as $casestudy)
                        <tr data-id="{{ $casestudy->id }}">
                            <td>{{ $casestudy->title }}</td>
                            <td>{{ $casestudy->publish_date->format('M jS, Y') }}</td>
                            <td nowrap class="align-right action-buttons">
                                <a href="{{ route('admin.casestudies.edit', ['casestudy' => $casestudy->id ]) }}" class="btn btn-success">
                                    <i class="fal fa-pencil-alt"></i> &nbsp;Edit
                                </a>
                                <a href="{{ route('admin.casestudies.delete', ['casestudy' => $casestudy->id ]) }}" class="btn btn-danger confirm-action" data-confirm-title="Delete Casestudy" data-confirm-message="Are you sure? There is no undo.">
                                    <i class="fal fa-trash"></i> &nbsp;Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $casestudies->links() }}

            @else
                <div class="alert alert-info">No casestudies found</div>
            @endif

        </div>
    </div>
</div>
@endsection
