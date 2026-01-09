require('./functions');

jQuery.fn.exists = function(){ return this.length > 0; }
spinnerIcon = '<i class="fas fa-spinner fa-spin"></i>';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

$(document).ready(function() {

	attachSubNavEvent();
	iniDragula();

	$('.wysiwyg').summernote({
		tabsize: 2,
		height: 300,
		callbacks: {
			onImageUpload: function(images) {
				uploadSummernoteImage(images[0], $(this));
			}
		}
	});

    $('.modal-ajax-link').magnificPopup({
  		type: 'ajax'
	});

	$('.datetimepicker4').datetimepicker({
        format: 'YYYY-MM-DD'
    });

	setTimeout(function() {
		$('.fade-out').fadeOut();
	}, 4000);

	$('.custom-select').select2({
		width: '100%'
	});

	$('.custom-select.no-search').select2({
		width: '100%',
		minimumResultsForSearch: Infinity
	});

	$(document).on('submit', 'form.disable-on-submit', function(e) {
		button = $(this).find('button[type="submit"]');
		button.prop('disabled', true);
		button.html(spinnerIcon + '&nbsp; Submitting...');
	});

	$('#competitive_salary').on('click', function() {
		if ($(this).is(':checked')) {
			$('.min-salary-row').slideUp('fast');
			$('.max-salary-row').slideUp('fast');
		} else {
			$('.min-salary-row').slideDown('fast');
			$('.max-salary-row').slideDown('fast');
		}
	});

	if ($('#competitive_salary').exists()) {
		if ($('#competitive_salary').is(':checked')) {
			$('.min-salary-row').hide();
			$('.max-salary-row').hide();
		} else {
			$('.min-salary-row').show();
			$('.max-salary-row').show();
		}
	}

	$('a.disable-on-click').on('click', function(e) {
		$(this).addClass('disabled');
		$(this).html(spinnerIcon + '&nbsp; Please wait...');
	});

	$('.confirm-action').on('click', function(e) {
		e.preventDefault();
		var button = $(this);
		Swal.fire({
			type: 'warning',
			title: button.data('confirm-title'),
			text: button.data('confirm-message'),
			showCancelButton: true,
			focusCancel: true,
			confirmButtonColor: 'rgb(113, 183, 104)',
			confirmButtonText: 'Yes',
			cancelButtonText: 'Cancel'
		}).then(function(result) {
			if (result.value) {
				window.location = button.attr('href');
			}
		});
	});

});
