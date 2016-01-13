@extends('layouts.app')

@section('styles.header')
	<link rel="stylesheet" href="/plugins/masterslider/style/masterslider.css">
    <link rel='stylesheet' href="/plugins/masterslider/skins/default/style.css">
    <link rel="stylesheet" href="/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <link rel="stylesheet" href="/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">

@stop

@section('content')
	<div class="shop-product">
        <div class="container">
            <div class="row">
                <div class="col-md-6 md-margin-bottom-50">
                        <div class="ms-showcase2-template">
                            <!-- Master Slider -->
                            <div class="master-slider ms-skin-default" id="masterslider">
                                @foreach ($book->photos as $photo)
                                    <div class="ms-slide">
                                        <img class="ms-brd"
                                             src="/{{ $photo->thumbnail_path }}"
                                             data-src="/{{ $photo->thumbnail_path }}"
                                             alt="{{ $photo->name }}">
                                         <img class="ms-thumb" src="/{{ $photo->thumbnail_path }}" alt="{{ $photo->name }}">
                                    </div>
                                @endforeach
                            </div>
                            <!-- End Master Slider -->
                        </div>
                    </div>
        
                    <div class="col-md-6">
                        <div class="shop-product-heading">
                            <h2>{{ $book->title }}</h2>
                            <ul class="list-inline shop-product-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div><!--/end shop product social-->
        
                        <ul class="list-inline product-ratings margin-bottom-30">
                            <li><i class="rating-selected fa fa-star"></i></li>
                            <li><i class="rating-selected fa fa-star"></i></li>
                            <li><i class="rating-selected fa fa-star"></i></li>
                            <li><i class="rating fa fa-star"></i></li>
                            <li><i class="rating fa fa-star"></i></li>
                        </ul><!--/end shop product ratings-->
        
                        <p>{{ $book->description }}</p>

                        <ul class="list-unstyled specifies-list">
                            <li>
                                <i class="fa fa-caret-right"></i>Publisher: 
                                <span>{{ $edition->publisher}}</span>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>Published Date: 
                                <span>{{ $edition->published_at}}</span
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>Version: 
                                <span>{{ $edition->version }}</span>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>Pages: 
                                <span>{{ $edition->pages }}</span>
                            </li>
                        </ul>
        
                        <ul class="list-inline shop-product-prices margin-bottom-30">
                            <li class="shop-red">Br. {{ number_format($book->price(), 2)}}</li>
                            {{-- <li class="line-through">$70.00</li>
                            <li><small class="shop-bg-red time-day-left">4 days left</small></li> --}}
                        </ul>
        
                        <ul class="list-inline add-to-wishlist add-to-wishlist-brd">
                            <li class="wishlist-in">
                                <i class="fa fa-heart"></i>
                                <a href="#">Add to Wishlist</a>
                            </li>
                        </ul>    
                        <p class="wishlist-category"><strong>Categories:</strong>
                            @foreach ($book->categories as $category)
                                <a href="#">{{ $category->name }} </a>
                            @endforeach
                        </p>
                    </div>
            </div>
        </div>
    </div>

    <div class="content-md container">
        @include('partials.services')
        @include('partials.reviews')
    </div>
@stop

@section('scripts.footer')
	<script src="/plugins/masterslider/masterslider.min.js"></script>
	<script src="/plugins/masterslider/jquery.easing.min.js"></script>
	<script src="/plugins/js/masterslider.js"></script>

	<script>
	    jQuery(document).ready(function() {  
	        BookReviewSlider.initSlider();
	    });
	</script>
@stop