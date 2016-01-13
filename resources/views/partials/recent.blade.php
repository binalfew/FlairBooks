<div class="container">
    <div class="heading heading-v1 margin-bottom-40">
        <h2>Recent books</h2>
    </div>

    <div class="row illustration-v2">
        @foreach ($recents as $book)
            <div class="col-md-3 col-sm-6 md-margin-bottom-30">
                <div class="product-img">
                    <a href="#"><img class="full-width img-responsive" src="/{{$book->photos->first()['thumbnail_path']}}" alt=""></a>
                    <a class="product-review" href="/books/{{ $book->id }}/overview">Quick overview</a>
                    <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
                <div class="product-description product-description-brd">
                    <div class="overflow-h margin-bottom-5">
                        <div class="pull-left">
                            <h4 class="title-price">Price</h4>
                        </div>    
                        <div class="product-price">
                            <span class="title-price">Br. {{ number_format($book->price(), 2)}}</span>
                        </div>
                    </div>    
                    <ul class="list-inline product-ratings">
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                        <li class="like-icon">
                            <a data-original-title="Add to wishlist"
                               data-toggle="tooltip"
                               data-placement="left"
                               class="tooltips"
                               href="/books/{{ $book->id }}/like">
                               <i class="fa fa-heart"></i>
                           </a>
                       </li>
                    </ul>    
                </div>
            </div>
        @endforeach        
    </div>
</div>