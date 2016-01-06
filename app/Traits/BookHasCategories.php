<?php

namespace FlairBooks\Traits;

use FlairBooks\Category;

trait BookHasCategories
{
	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}

	public function getCategoryListAttribute()
    {
        return $this->categories->lists('id')->toArray();
    }

    public function countCategories()
	{
		return $this->categories()->count();
	}

    public function addCategories($categories)
	{
		$this->categories()->sync($categories);

		return $this;
	}

    public function removeCategories($categories = null)
    {
    	if(func_num_args() == 0) {
    		return $this->categories()->detach();	
    	}
    	
        $this->categories()->detach($categories);
    }
}