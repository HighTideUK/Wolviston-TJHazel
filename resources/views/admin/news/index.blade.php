@extends('layouts.admin')
@section('content')

@include('admin.partials.header')

<div class="body">
    <div class="card">

        <div class="body-header">
            <h2><i class="fal {{ getAdminSectionIcon($active_nav['item']) }} fa-fw"></i> &nbsp;{{ $title }}</h2>
            <p><a href="{{ route('admin.news.new') }}" class="btn btn-outline-light">
                <i class="fal fa-plus"></i> &nbsp;Add New Article
            </a></p>
        </div>

        <div class="card-body">

            @include('partials.flash_messages')

            @if (count($news) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Publish Date</th>
                            <th nowrap>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($news as $article)
                        <tr data-id="{{ $article->id }}">
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->publish_date->format('M jS, Y') }}</td>
                            <td nowrap class="align-right action-buttons">
                                <a href="{{ route('admin.news.edit', ['article' => $article->id ]) }}" class="btn btn-success">
                                    <i class="fal fa-pencil-alt"></i> &nbsp;Edit
                                </a>
                                <a href="{{ route('admin.news.delete', ['article' => $article->id ]) }}" class="btn btn-danger confirm-action" data-confirm-title="Delete News" data-confirm-message="Are you sure? There is no undo.">
                                    <i class="fal fa-trash"></i> &nbsp;Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $news->links() }}

            @else
                <div class="alert alert-info">No news articles found</div>
            @endif

        </div>
    </div>
</div>
@endsection
