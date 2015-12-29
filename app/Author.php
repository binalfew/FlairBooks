<?php

namespace FlairBooks;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	protected $table ='authors';

    protected $fillable = ['first_name', 'last_name', 'telephone'];

    public function scopeSearch($query, $searchTerm)
    {
    	return $query->where(function($query) use ($searchTerm) {
    		$query->where('first_name', 'LIKE', "%$searchTerm%")
    			  ->OrWhere('last_name', 'LIKE', "%$searchTerm%");
    	});
    }
}