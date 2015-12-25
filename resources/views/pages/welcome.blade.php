@extends('layouts.app')

@section('styles.header')	
    <link rel="stylesheet" href="/plugins/owl-carousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/plugins/revolution-slider/rs-plugin/css/settings.css">
@stop

@section('slider')
	@include('partials.slider')
@stop

@section('services')
	@include('partials.services')
@stop

@section('scripts.footer')
	<script src="/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>	
	<script src="/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script>
	    jQuery(document).ready(function() {
	        App.init();
	        App.initScrollBar();
	        OwlCarousel.initOwlCarousel();
	        RevolutionSlider.initRSfullWidth();     
	    });
	</script>
@stop