<div class="contact-block">

	<div class="inner block-inner">

		<div class="logo"><img src="/images/admin_logo.png" alt="" /></div>

		<div class="content">

			<div class="body">

				<h3 class="short-bottom-border">
						<span>Talk to us about your project</span></h3>

				<p>If you would like to know more about the sectors in which we operate or the services we provide, get in touch today. We look forward to working with you.</p>

				@include('snippets.addresses')

				<div class="social-icons">
					<a href="https://www.linkedin.com/company/t.j.-hazell-engineering-consultants-limited/">
						<span><i class="fab fa-linkedin-in fa-fw"></i></span>
					</a>
				</div>

			</div>

			<div class="form">

				<h3 class="short-bottom-border">
						<span>Send us a message</span></h3>

				<p>Completing the contact form will submit your query to one of our design engineering experts, who will get in touch with you to discuss your project.</p>

				<form id="contact_form">
					<div class="fields-row">
						<div class="column">
							<input type="text" class="form-control" name="name" value="" placeholder="name" required>
						</div>
						<div class="column">
							<input type="text" class="form-control" name="phone" value="" placeholder="telephone" required>
						</div>
					</div>
					<div class="fields-row">
						<div class="column">
							<input type="text" class="form-control" name="email" value="" placeholder="email" required>
						</div>
						<div class="column">
							<input type="text" class="form-control" name="company" value="" placeholder="company">
						</div>
					</div>
					<div class="fields-row">
						<div class="column full_width">
							<textarea class="form-control" name="message" value="" placeholder="message"></textarea>
						</div>
					</div>
					<div class="fields-row">
						<button class="btn btn-outline-primary" name="submit" type="submit">Submit</button>
					</div>
				</form>

			</div>
		</div>
	</div>

</div>