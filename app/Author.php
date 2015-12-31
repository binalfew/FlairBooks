<?php

namespace FlairBooks;

use FlairBooks\Book;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	protected $table ='authors';

    protected $fillable = ['first_name', 'last_name', 'telephone'];

    public function books()
    {
    	return $this->belongsToMany(Book::class);
    }

    public function scopeSearch($query, $searchTerm)
    {
    	return $query->where(function($query) use ($searchTerm) {
    		$query->where('first_name', 'LIKE', "%$searchTerm%")
    			  ->OrWhere('last_name', 'LIKE', "%$searchTerm%");
    	});
    }

    public function count()
    {
    	return $this->books()->count();
    }

    public function publish($books)
    {
    	$method = $books instanceof Book ? 'save' : 'saveMany';

    	$this->books()->$method($books);
    }

    public function remove($books = null)
    {
    	if($books instanceof Book) {
			return $this->books()->detach($books->id);
    	}

    	$this->removeMany($books);
    }

    public function removeMany($books)
    {
    	$ids = $books->pluck('id')->all();

    	$this->books()->detach($ids);
    }

    public function abandon()
    {
    	$this->books()->detach();
    }
}