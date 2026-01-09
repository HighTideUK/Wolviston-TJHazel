@extends('layouts.email')

@section('content')

<h2>Contact Form Submission</h2>

<ul>
	@if (!empty($details->name)) <li>Name : <b>{{ $details->name }}</b></li> @endif
	@if (!empty($details->email)) <li>Email : <b>{{ $details->email }}</b></li> @endif
	@if (!empty($details->phone)) <li>Phone : <b>{{ $details->phone }}</b></li> @endif
	@if (!empty($details->company)) <li>Company : <b>{{ $details->company }}</b></li> @endif
	@if (!empty($details->message)) <li>Message : <b>{{ $details->message }}</b></li> @endif
</ul>

@endsection
