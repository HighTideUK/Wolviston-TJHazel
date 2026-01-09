@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">
    <div class="card">

        <div class="body-header">
            <h2><i class="fal {{ getAdminSectionIcon($active_nav['item']) }} fa-fw"></i> &nbsp;{{ $title }}</h2>
            <p><a href="{{ route('admin.user.new') }}" class="btn btn-outline-light">
                <i class="fal fa-plus"></i> &nbsp;Add New Admin User
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            @if (count($users) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th nowrap>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr data-id="{{ $user->id }}">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td nowrap class="align-right action-buttons">
                                <a href="{{ route('admin.user.edit', ['user' => $user->id ]) }}" class="btn btn-success">
                                    <i class="fal fa-pencil-alt"></i> &nbsp;Edit
                                </a>
                                @if (auth()->user()->id !== $user->id)
                                    <a href="{{ route('admin.user.delete', ['user' => $user->id ]) }}" class="btn btn-danger confirm-action" data-confirm-title="Delete Admin User" data-confirm-message="Are you sure? There is no undo.">
                                        <i class="fal fa-trash"></i> &nbsp;Delete
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $users->links() }}

            @else
                <div class="alert alert-info">No admin users found</div>
            @endif

        </div>
    </div>
</div>
@endsection
