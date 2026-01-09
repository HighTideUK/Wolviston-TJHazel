let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.copy('node_modules/@fortawesome/fontawesome-pro/webfonts', 'public/webfonts');
mix.copy('node_modules/slick-carousel/slick/fonts', 'public/css/fonts');
mix.copy('node_modules/slick-carousel/slick/ajax-loader.gif', 'public/css');
mix.copy('node_modules/summernote/dist/font', 'public/css/font');

mix.styles([
	'node_modules/@fortawesome/fontawesome-pro/css/all.css',
	'node_modules/magnific-popup/dist/magnific-popup.css',
	'node_modules/animate.css/animate.min.css',
	'node_modules/toastr/build/toastr.min.css',
	'node_modules/axios-progress-bar/dist/nprogress.css',
	'node_modules/slick-carousel/slick/slick.css',
	'node_modules/slick-carousel/slick/slick-theme.css',
	'node_modules/sweetalert2/dist/sweetalert2.min.css',
], 'public/css/vendor.css');

mix.scripts([
	'node_modules/slick-carousel/slick/slick.min.js',
	'node_modules/bootstrap/dist/js/bootstrap.min.js',
	'node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
	'node_modules/toastr/toastr.js',
	'node_modules/moment/min/moment.min.js',
	'node_modules/slideout/dist/slideout.min.js',
	'node_modules/typeahead.js/dist/typeahead.bundle.min.js',
	'node_modules/sweetalert2/dist/sweetalert2.min.js',
], 'public/js/libraries.js')
.version();

mix.js('resources/js/app.js', 'public/js')
	.extract([
		'axios', 
		'toastr', 
		'sweetalert2'
	])
	.version();

mix.sass('resources/sass/app.scss', 'public/css').version();

/* ADMIN AREA */

mix.sass('resources/sass/admin/admin.scss', 'public/css').version();
mix.js('resources/js/admin/admin.js', 'public/js').version();

mix.styles([
	'node_modules/@fortawesome/fontawesome-pro/css/all.css',
	'node_modules/magnific-popup/dist/magnific-popup.css',
	'node_modules/tooltipster/dist/css/tooltipster.bundle.min.css',
	'node_modules/tooltipster/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-borderless.min.css',
	'node_modules/toastr/build/toastr.min.css',
	'node_modules/axios-progress-bar/dist/nprogress.css',
	'node_modules/sweetalert2/dist/sweetalert2.min.css',
	'node_modules/select2/dist/css/select2.min.css',
	'node_modules/summernote/dist/summernote-bs4.css',
	'node_modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.css',
	'node_modules/dragula/dist/dragula.min.css',
], 'public/css/admin-vendor.css');

mix.scripts([
	'node_modules/popper.js/dist/umd/popper.js',
	'node_modules/promise-polyfill/dist/polyfill.min.js',
	'node_modules/axios/dist/axios.min.js',
	'node_modules/axios-progress-bar/dist/index.js',
	'node_modules/toastr/toastr.js',
	'node_modules/sweetalert2/dist/sweetalert2.min.js',
	'node_modules/tooltipster/dist/js/tooltipster.bundle.min.js',
	'node_modules/bootstrap/dist/js/bootstrap.min.js',
	'node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
	'node_modules/select2/dist/js/select2.min.js',
	'node_modules/summernote/dist/summernote-bs4.js',
	'node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.js',
	'node_modules/urijs/src/URI.js',
	'node_modules/dragula/dist/dragula.min.js'
], 'public/js/admin-vendor.js');
