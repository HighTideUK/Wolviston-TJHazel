(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/admin"],{

/***/ "./resources/js/admin/admin.js":
/*!*************************************!*\
  !*** ./resources/js/admin/admin.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./functions */ "./resources/js/admin/functions.js");

jQuery.fn.exists = function () {
  return this.length > 0;
};

spinnerIcon = '<i class="fas fa-spinner fa-spin"></i>';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
var token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

$(document).ready(function () {
  attachSubNavEvent();
  iniDragula();
  $('.wysiwyg').summernote({
    tabsize: 2,
    height: 300,
    callbacks: {
      onImageUpload: function onImageUpload(images) {
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
  setTimeout(function () {
    $('.fade-out').fadeOut();
  }, 4000);
  $('.custom-select').select2({
    width: '100%'
  });
  $('.custom-select.no-search').select2({
    width: '100%',
    minimumResultsForSearch: Infinity
  });
  $(document).on('submit', 'form.disable-on-submit', function (e) {
    button = $(this).find('button[type="submit"]');
    button.prop('disabled', true);
    button.html(spinnerIcon + '&nbsp; Submitting...');
  });
  $('#competitive_salary').on('click', function () {
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

  $('a.disable-on-click').on('click', function (e) {
    $(this).addClass('disabled');
    $(this).html(spinnerIcon + '&nbsp; Please wait...');
  });
  $('.confirm-action').on('click', function (e) {
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
    }).then(function (result) {
      if (result.value) {
        window.location = button.attr('href');
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/admin/functions.js":
/*!*****************************************!*\
  !*** ./resources/js/admin/functions.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

uploadSummernoteImage = function uploadSummernoteImage(image, editor) {
  showOverlay();
  var data = new FormData();
  data.append('image', image);
  var config = {
    headers: {
      'content-type': 'multipart/form-data'
    }
  };
  axios.post('/admin/upload-image', data, config).then(function (response) {
    if (response['data']['url'].length > 0) {
      var image = $('<img>').attr('src', response['data']['url']);
      editor.summernote('insertNode', image[0]);
      showToast('success', response['data']['message']);
    } else {
      showAlert('error', 'Image upload error', 'Sorry, a problem occurred during the image upload');
    }

    hideOverlay();
  })["catch"](function (e) {
    console.log(e);
    hideOverlay();
  });
};

iniDragula = function iniDragula() {
  var container = document.getElementById('drag_reorder_rows');

  if (container) {
    dragula([container], {
      accepts: function accepts(el, target, source, sibling) {
        if (!target || !source || target != source) {
          return false;
        } else {
          return true;
        }
      }
    }).on('drop', function (el, target, source, sibling) {
      order_data = [];
      tbody = $(target);
      target_model = $(tbody).data('model');
      url = '';
      tbody.find('tr').each(function (i, obj) {
        order_data.push({
          order: i,
          id: parseInt($(this).data('id')),
          model: target_model
        });
      });

      switch (target_model) {
        case 'industries':
          url = '/admin/actions/industries/order';
          break;

        case 'people':
          url = '/admin/actions/people/order';
          break;

        case 'resources':
          url = '/admin/actions/resources/order';
          break;

        case 'expertise':
          url = '/admin/actions/expertise/order';
          break;
      }

      if (url.length > 0) {
        axios.post(url, {
          data: order_data
        }).then(function (result) {
          showToast(result['data']['type'], result['data']['message']);
        })["catch"](function (error) {
          console.log(error);
          showError('Error', 'Sorry, an error occurred attempting to re-order the items');
        });
      }
    });
  }
};

showToast = function showToast(type, message) {
  if (type === 'success') toastr.success(message, '', {
    timeOut: 2000
  });
  if (type === 'warning') toastr.warning(message);
  if (type === 'error') toastr.error(message);
  if (type === 'info') toastr.info(message);
};

showError = function showError(title, message, callback) {
  options = {
    type: 'error',
    title: title,
    text: message,
    confirmButtonColor: 'rgb(113, 183, 104)'
  };
  swal(options).then(function (result) {
    if (typeof callback !== 'undefined') {
      if (result.value) {
        callback(result.value);
      }
    }
  });
};

showOverlay = function showOverlay() {
  $('.loading-overlay').fadeIn('fast');
};

hideOverlay = function hideOverlay() {
  $('.loading-overlay').fadeOut('fast');
};

showModalOverlay = function showModalOverlay() {
  $('.modal-loading-overlay').fadeIn('fast');
};

hideModalOverlay = function hideModalOverlay() {
  $('.modal-loading-overlay').fadeOut('fast');
};

attachSubNavEvent = function attachSubNavEvent() {
  $('.header nav li.nav-item').each(function (i) {
    subItems = $(this).find('ul.sub-items');
    link = $(this).find('.nav-link');

    if (subItems.length) {
      /*
      console.log('attach event to ' + link.attr('href'));
      */
      link.on('click', function (e) {
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
};

/***/ }),

/***/ 1:
/*!*******************************************!*\
  !*** multi ./resources/js/admin/admin.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/phil/Code/tjhazell/resources/js/admin/admin.js */"./resources/js/admin/admin.js");


/***/ })

},[[1,"/js/manifest"]]]);