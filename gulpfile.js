var elixir = require('laravel-elixir');

elixir(function(mix) {
	mix.styles([
		'bootstrap.css',
		'font-awesome.css',
		'animate.css',
		'line-icons.css',
		'jquery.mCustomScrollbar.css',
		'components.css',
		'plugins.css',
		'app.css',
		'header.css',
		'footer.css',
		'log-reg.css',
		'sweetalert.css',
		'select2.min.css',
		'theme-colors/dark-red.css',
		'custom.css'
	]);

	mix.scripts([
		'jquery.min.js',
    	'jquery-migrate.min.js',
    	// 'jquery-ui.min.js',
    	// 'jquery.form.min.js',
    	// 'jquery.validate.min.js',
    	// 'jquery.maskedinput.min.js',
    	// 'validation.js',
    	'bootstrap.min.js',
        'sweetalert-dev.js',
        'select2.min.js',
        'owl-carousel.js',
        'revolution-slider.js',
        'back-to-top.js',
        'jquery.mCustomScrollbar.concat.min.js',
        'app.js',
        'smoothScroll.js',
        // 'datepicker.js',
        'custom.js'
	]);
});
