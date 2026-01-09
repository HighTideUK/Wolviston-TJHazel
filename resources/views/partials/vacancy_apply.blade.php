<div class="vacancy-apply">

	<h3>{{ $vacancy }}</h3>

	<form method="post" action="{{ route('vacancy.apply_submit', ['vacancy' => $vacancy]) }}" enctype="multipart/form-data" class="disable-on-submit">

		@csrf

		<div class="input-row">
			<input type="text" class="form-control" value="{{ old('first_name') }}" placeholder="first name" name="first_name" required>
		</div>
		<div class="input-row">
			<input type="text" class="form-control" value="{{ old('last_name') }}" placeholder="last name" name="last_name" required>
		</div>
		<div class="input-row">
			<input type="email" class="form-control" value="{{ old('email') }}" placeholder="email address" name="email" required>
		</div>
		<div class="input-row">
			<input type="number" class="form-control" value="{{ old('phone') }}" placeholder="phone number" name="phone" required>
		</div>

		<div class="custom-file">
			<input type="file" name="cv" class="custom-file-input" id="uploadFile">
			<label class="custom-file-label" for="uploadFile" id="uploadFileLabel">Choose CV</label>
			<span class="form-text text-muted">Upload your CV in a .doc, .pdf or docx. Max. file size: 2MB.</span>
		</div>

		<div class="input-row buttons">
			<button type="submit" class="btn btn-primary">Send</button>
			<a href="{{ route('register') }}" class="btn btn-outline-dark">Register</a>
		</div>
	</form>

</div>