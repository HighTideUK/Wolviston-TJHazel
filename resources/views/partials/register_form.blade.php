<div class="register-form">

	<h3 class="short-bottom-border">Register for vacancies with us</h3>

	<p>If you don’t have an account you can create one below by entering your email details. We’ll drop you an email to confirm your details.</p>

	<form method="post" action="{{ route('register.submit') }}" enctype="multipart/form-data" class="disable-on-submit">

		@csrf

		<h4>Personal Details</h4>

		<div class="input-row">
			<input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="first name" required>
		</div>
		<div class="input-row">
			<input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="last name" required>
		</div>
		<div class="input-row">
			<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email address" required>
		</div>
		<div class="input-row">
			<input type="number" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="phone number">
		</div>

		<h4>CV Upload</h4>

		<div class="custom-file">
			<input type="file" name="cv" class="custom-file-input" id="uploadFile">
			<label class="custom-file-label" for="uploadFile" id="uploadFileLabel">Choose CV</label>
			<span class="form-text text-muted">Upload your CV in a .doc, .pdf or docx. Max. file size: 2MB.</span>
		</div>

		<div class="input-row buttons">
			<button type="submit" class="btn btn-primary">Register</button>
		</div>
	</form>

</div>