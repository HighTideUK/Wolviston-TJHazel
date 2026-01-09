@if (!empty($resource->filename))
	<div class="item">
		<h4>{{ $resource->label }}</h4>
		@if (!empty($resource->description))
			{!! displayWysiwyg($resource->description) !!}
		@endif
		<a href="{{ $resource->downloadUrl }}" class="btn btn-outline-dark">Download</a>
	</div>
@endif