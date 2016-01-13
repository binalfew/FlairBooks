@extends('layouts.app')

@section('styles.header')	
    <link rel="stylesheet" href="/plugins/owl-carousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/plugins/revolution-slider/rs-plugin/css/settings.css">
@stop

@section('slider')
	@include('partials.slider')
@stop

@section('content')
	@include('partials.recent')
@stop

@section('services')
	<div class="container">
	    <div class="heading heading-v1 margin-bottom-40">
	        <h2>Services</h2>
	    </div>
		@include('partials.services')
    </div>	
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