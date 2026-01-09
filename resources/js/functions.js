getWindowOptions = function() {
	var width = 500;
	var height = 350;
	var left = (window.innerWidth / 2) - (width / 2);
	var top = (window.innerHeight / 2) - (height / 2);

	return [
	'resizable,scrollbars,status',
	'height=' + height,
	'width=' + width,
	'left=' + left,
	'top=' + top,
	].join();
};

getTeamMembers = function(category) {

	spinnerIcon = '<i class="fas fa-spinner fa-spin"></i>';
	$('#team-members').html(spinnerIcon);

	if (category) {
		url = '/ajax/team/category/' + category;
	} else {
		url = '/ajax/team';
	}
	axios.get(url).then(function(result) {
		if (result['data']['type'] === 'success') {
			$('#team-members').html(result['data']['view']);
		}
	}).catch(function(e) {
		console.log(e);
	});

}

getCasestudies = function(industry) {

	spinnerIcon = '<i class="fas fa-spinner fa-spin"></i>';
	$('#team-members').html(spinnerIcon);

	if (industry) {
		url = '/ajax/casestudies/industry/' + industry;
	} else {
		url = '/ajax/casestudies';
	}
	axios.get(url).then(function(result) {
		if (result['data']['type'] === 'success') {
			$('#load-casestudies').html(result['data']['view']);
		}
	}).catch(function(e) {
		console.log(e);
	});

}

initialiseNav = function() {

	if ($('#panel').exists()) {

		var slideout = new Slideout({
			'panel': document.getElementById('panel'),
			'menu': document.getElementById('menu'),
			'padding': 256,
			'tolerance': 70,
			'side': 'right'
		});

		// Toggle button
		$('.toggle-menu').on('click', function() {
	    	slideout.toggle();
		});

		// get the first URL segment
		var pathArray = window.location.pathname.split('/');
		var secondLevelLocation = '';

		if (pathArray.length > 1) {
			secondLevelLocation = pathArray[1];
		}

		// attach active link
		$('#menu ul a').each(function(i, obj) {
			href = $(this).attr('href');
			hrefArray = href.split('/');
			if (hrefArray.length > 2) {
				if (hrefArray[3] === secondLevelLocation) {
					$(this).addClass('active');
					return;
				}
			}
			// homepage
			if (hrefArray.length === 3 && secondLevelLocation.length === 0) {
				$(this).addClass('active');
				return;
			}
		});

	}

}

truncateString = function(str, maxLength = 24) {
	if (str.length <= maxLength) {
		return str
	}
	return str.slice(0, maxLength) + '...'
}