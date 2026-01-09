@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">
    <div class="card">

        <div class="body-header">
            <h2><i class="fal {{ getAdminSectionIcon($active_nav['item']) }} fa-fw"></i> &nbsp;{{ $title }}</h2>
            <p><a href="{{ route('admin.person.new') }}" class="btn btn-outline-light">
                <i class="fal fa-plus"></i> &nbsp;Add New Person
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            @if (count($people) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:100px">Re-order</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Role</th>
                            <th>Category</th>
                            <th nowrap>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody id="drag_reorder_rows" data-model="people">
                    @foreach ($people as $person)
                        <tr data-id="{{ $person->id }}">
                            <td class="handle"><i class="fas fa-arrows"></i></td>
                            <td>{{ $person->first_name }}</td>
                            <td>{{ $person->last_name }}</td>
                            <td>{{ $person->role }}</td>
                            <td>{{ $person->category()->first() }}</td>
                            <td nowrap class="align-right action-buttons">
                                <a href="{{ route('admin.person.edit', ['person' => $person->id ]) }}" class="btn btn-success">
                                    <i class="fal fa-pencil-alt"></i> &nbsp;Edit
                                </a>
                                <a href="{{ route('admin.person.delete', ['person' => $person->id ]) }}" class="btn btn-danger confirm-action" data-confirm-title="Delete Person" data-confirm-message="Are you sure? There is no undo.">
                                    <i class="fal fa-trash"></i> &nbsp;Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $people->links() }}

            @else
                <div class="alert alert-info">No people found</div>
            @endif

        </div>
    </div>
</div>
@endsection
