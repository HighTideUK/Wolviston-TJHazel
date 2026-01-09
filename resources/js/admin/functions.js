uploadSummernoteImage = function(image, editor) {

    showOverlay();

    let data = new FormData();
    data.append('image', image);

    const config = {
        headers: { 'content-type': 'multipart/form-data' }
    }

    axios.post('/admin/upload-image', data, config).then(function(response) {

    	if (response['data']['url'].length > 0) {
        	var image = $('<img>').attr('src', response['data']['url']);
        	editor.summernote('insertNode', image[0]);
        	showToast('success', response['data']['message']);
        } else {
        	showAlert('error', 'Image upload error', 'Sorry, a problem occurred during the image upload');
        }

        hideOverlay();

	}).catch(function(e) {
		console.log(e);
	    hideOverlay();
	});
	
}

iniDragula = function() {

	var container = document.getElementById('drag_reorder_rows');

	if (container) {
		dragula([container], {
			accepts: function(el, target, source, sibling) {
				if (!target || !source || (target != source)) {
					return false;
				} else {
					return true;
				}
			}
		})
		.on('drop' , function(el, target, source, sibling) {
			
			order_data = [];

			tbody = $(target);
			target_model = $(tbody).data('model');
			url = '';

			tbody.find('tr').each(function(i, obj) {

				order_data.push({ 
					order: i, 
					id: parseInt($(this).data('id')),
					model: target_model
				});

			});

			switch (target_model) {
				case 'industries' :
					url = '/admin/actions/industries/order';
					break;
				case 'people' :
					url = '/admin/actions/people/order';
					break;
				case 'resources' :
					url = '/admin/actions/resources/order';
					break;
				case 'expertise' :
					url = '/admin/actions/expertise/order';
					break;
			}

			if (url.length > 0)	{

		        axios.post(url, { data: order_data })
		        	.then(function(result) {
						showToast(result['data']['type'], result['data']['message']);
					})
					.catch(function(error) {
						console.log(error);
						showError('Error', 'Sorry, an error occurred attempting to re-order the items');
					});

		    }

		});
	}

}

showToast = function(type, message) {
	if (type === 'success') toastr.success(message, '', { timeOut: 2000 });
	if (type === 'warning') toastr.warning(message);
	if (type === 'error') toastr.error(message);
	if (type === 'info') toastr.info(message);
}

showError = function(title, message, callback) {

	options = {
		type: 'error',
		title: title,
		text: message,
		confirmButtonColor: 'rgb(113, 183, 104)'
	}

	swal(options).then((result) => {
		if (typeof callback !== 'undefined') {
			if (result.value) {
				callback(result.value);
			}
		}
	});

}

showOverlay = function() {
	$('.loading-overlay').fadeIn('fast');
}

hideOverlay = function() {
	$('.loading-overlay').fadeOut('fast');
}

showModalOverlay = function() {
	$('.modal-loading-overlay').fadeIn('fast');
}

hideModalOverlay = function() {
	$('.modal-loading-overlay').fadeOut('fast');
}

attachSubNavEvent = function() {
	
	$('.header nav li.nav-item').each(function(i) {
		subItems = $(this).find('ul.sub-items');
		link = $(this).find('.nav-link');
		if (subItems.length) {
			/*
			console.log('attach event to ' + link.attr('href'));
			*/
			link.on('click', function(e) {
				e.preventDefault();
				arrowIcon = $(this).find('.label .inner i.fal');
				itemsList = $(this).siblings('ul');
				if (itemsList.is(':visible')) {
					itemsList.slideUp('fast');
					arrowIcon.removeClass('fa-chevron-down');
					arrowIcon.addClass('fa-chevron-right');
				} else {
					itemsList.slideDown('fast');
					arrowIcon.removeClass('fa-chevron-right');
					arrowIcon.addClass('fa-chevron-down');
				}
			});
		}
	});

}