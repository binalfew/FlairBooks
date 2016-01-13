<?php

namespace FlairBooks;

use Carbon\Carbon;
use FlairBooks\Book;
use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $table = 'editions';

    protected $fillable = ['publisher', 'published_at', 'version', 'pages', 'price'];

    protected $dates = ['published_at'];

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }

    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = $price * 100;
    }

    public function getPriceAttribute($price)
    {
        return $price/100;
    }

    public function setPublishedAtAttribute($date)
    {
    	$this->attributes['published_at'] = Carbon::parse($date);
    }

    public function getPublishedAtAttribute($date)
    {
    	return Carbon::parse($date)->format('Y-m-d');
    }
}
