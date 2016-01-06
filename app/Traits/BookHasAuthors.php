<?php

namespace FlairBooks\Traits;

use FlairBooks\Author;

trait BookHasAuthors
{
	public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function countAuthors()
    {
        return $this->authors()->count();
    }

    public function getAuthorListAttribute()
    {
        return $this->authors->lists('id')->toArray();
    }

    public function addAuthors($authors)
    {
    	$this->authors()->sync($authors);

    	return $this;
    }

    public function removeAuthors($authors = null)
    {
        if(func_num_args() == 0) {
            return $this->authors()->detach();   
        }
        
        $this->authors()->detach($authors);
    }
}