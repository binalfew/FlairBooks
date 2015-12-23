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
		'theme-colors/dark-red.css',
		'custom.css'
	]);

	mix.scripts([
		'jquery.min.js',
    	'jquery-migrate.min.js',
    	'bootstrap.min.js',
        'sweetalert-dev.js',
        'owl-carousel.js',
        'revolution-slider.js',
        'back-to-top.js',
        'jquery.mCustomScrollbar.concat.min.js',
        'app.js',
        'smoothScroll.js',
        'custom.js'
	]);
});
