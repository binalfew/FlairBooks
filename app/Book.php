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
}
