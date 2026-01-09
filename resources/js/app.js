/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./functions');

jQuery.fn.exists = function(){ return this.length > 0; }
spinnerIcon = '<i class="fas fa-spinner fa-spin"></i>';

$(document).ready(function() {

	initialiseNav();

	$('.share_facebook').on('click', function(e) {
		e.preventDefault();
		var shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + document.location.href + '&title=' + encodeURIComponent(document.title);
  		var win = window.open(shareUrl, 'Share On Facebook', getWindowOptions());
  		win.opener = null; // 2
	});

	$('.share_twitter').on('click', function(e) {
		var shareUrl = 'https://twitter.com/intent/tweet?url=' + document.location.href + '&text=' + encodeURIComponent(document.title);
		e.preventDefault();
		var win = window.open(shareUrl, 'Share On Twitter', getWindowOptions());
		win.opener = null; // 2
	});

	$('.share_linkedin').on('click', function(e) {
		e.preventDefault();
		var shareUrl = 'https://www.linkedin.com/shareArticle?url=' + document.location.href + '&title=' + encodeURIComponent(document.title);
  		var win = window.open(shareUrl, 'Share On LinkedIn', getWindowOptions());
  		win.opener = null; // 2
	});

	if ($('#team-members').exists()) {

		getTeamMembers();

		$('.team-member-categories a').on('click', function(e) {
			e.preventDefault();
			$('.team-member-categories a').removeClass('selected');
			$(this).addClass('selected');
			getTeamMembers($(this).data('category'));
		});

	}

	if ($('#load-casestudies').exists()) {

		getCasestudies();

		$('a.load-casestudies').on('click', function(e) {
			e.preventDefault();
			$('a.load-casestudies').removeClass('selected');
			$(this).addClass('selected');
			getCasestudies($(this).data('industry'));
		});

	}

	var expertiseBlockCounter = 0;
	$('.expertise-blocks .block').each(function(i, obj) {
		expertiseBlockCounter++;
		if (expertiseBlockCounter === 2) $(this).addClass('alt');
		if (expertiseBlockCounter === 3) $(this).addClass('alt');
		if (expertiseBlockCounter === 4) expertiseBlockCounter = 0;
	});

	$('a.industry-block-anchor').on('click', function(e) {
		e.preventDefault();
		targetId = $(this).attr('href');
		$('body, html').animate({
			scrollTop: $(targetId).offset().top
		}, 200);
	});

	$('.scroll-to-top').on('click', function(e) {
		e.preventDefault();
		$('body, html').animate({
			scrollTop: 0
		}, 200);
	});

	$(document).on('submit', 'form.disable-on-submit', function(e) {
		button = $(this).find('button[type="submit"]');
		button.prop('disabled', true);
		button.html(spinnerIcon + '&nbsp; Submitting...');
	});

	$(document).on('submit', '#contact_form', function(e) {

		e.preventDefault();
		form = $(this);

		button = form.find('button[type="submit"]');
		defaultLabel = button.text();
		button.prop('disabled', true);
		button.html(spinnerIcon + '&nbsp; Please wait...');

		data = {
			name : form.find('input[name="name"]').val(),
			email : form.find('input[name="email"]').val(),
			phone : form.find('input[name="phone"]').val(),
			company : form.find('input[name="company"]').val(),
			message : form.find('textarea[name="message"]').val()
		};

		/* submit to ajax, close pop up on success and show alert */

		axios.post('/ajax/contact', data).then(function(result) {

			if (result['data']['type'] === 'success') {

				// reset form
				button.html(defaultLabel);
				button.prop('disabled', false);
				document.getElementById('contact_form').reset();

				Swal.fire({
					type: 'success',
					title: result['data']['title'],
					html: result['data']['message'],
					confirmButtonColor: 'rgb(113, 183, 104)',
					focusConfirm: true
				});

			} else {
				button.html(defaultLabel);
				button.prop('disabled', false);
				showError(result['data']['title'], result['data']['message']);
			}
		}).catch(function(e) {
			button.html(defaultLabel);
			button.prop('disabled', false);
			showError('Error', 'Sorry, an error occurred attempting this action');
			console.log(e);
		});

	});

});
