<?php

namespace FlairBooks;

use FlairBooks\Photo;
use FlairBooks\Author;
use FlairBooks\Edition;
use FlairBooks\Category;
use Illuminate\Database\Eloquent\Model;
use FlairBooks\Traits\BookHasAuthors;
use FlairBooks\Traits\BookHasCategories;
use FlairBooks\Traits\BookHasEditions;
use FlairBooks\Traits\BookHasPhotos;

class Book extends Model
{
    use BookHasCategories, BookHasAuthors, BookHasEditions, BookHasPhotos;

	protected $table = 'books';

	protected $fillable = ['title', 'description', 'isbn'];

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where(function($query) use ($searchTerm) {
            $query->where('title', 'LIKE', "%$searchTerm%")
                  ->OrWhere('description', 'LIKE', "%$searchTerm%")
                  ->OrWhere('isbn', 'LIKE', "%$searchTerm%");
        });
    }
}
