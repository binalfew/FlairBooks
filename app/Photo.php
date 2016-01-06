<?php

namespace FlairBooks;

use FlairBooks\Book;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'book_photos';

    protected $fillable = ['path'];

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }
}
