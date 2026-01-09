@extends('layouts.admin')

@section('content')

@include('admin.partials.header')

<div class="body">
    <div class="card">
        
        <div class="body-header">
                <h2>Dashboard</h2>
                <p>Welcome <b>{{ auth()->user()->name }}</b></p>
            </div>

        <div class="card-body">

        	@include('partials.flash_messages')

            <p>Some graphs, metrics here...</p>

        </div>
    </div>
</div>
@endsection
