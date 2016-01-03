<?php

namespace FlairBooks;

use FlairBooks\Author;
use FlairBooks\Category;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $table = 'books';

	protected $fillable = ['title', 'description', 'isbn'];

	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function getCategoryListAttribute()
    {
        return $this->categories->lists('id')->toArray();
    }

    public function getAuthorListAttribute()
    {
        return $this->authors->lists('id')->toArray();
    }

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where(function($query) use ($searchTerm) {
            $query->where('title', 'LIKE', "%$searchTerm%")
                  ->OrWhere('description', 'LIKE', "%$searchTerm%")
                  ->OrWhere('isbn', 'LIKE', "%$searchTerm%");
        });
    }

	public function count()
	{
		return $this->categories()->count();
	}

	public function join($category)
	{
		$method = $category instanceof Category ? 'save' : 'saveMany';

		$this->categories()->$method($category);

		return $this;
	}

    public function leave($categories = null)
    {
    	if($categories instanceof Category) {
    		return $this->categories()->detach($categories->id);	
    	}
    	
    	$this->leaveMany($categories);
    }

    public function leaveMany($categories)
    {
        $ids = $categories->pluck('id')->all();

        $this->categories()->detach($ids);
    }

    public function orphan()
    {
    	$this->categories()->detach();
    }

    public function syncAuthors($ids)
    {
        $this->authors()->sync($ids);
    }

    public function syncCategories($ids)
    {
        $this->categories()->sync($ids);
    }
}
