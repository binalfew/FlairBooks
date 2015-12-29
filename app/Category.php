<?php

namespace FlairBooks;

use Baum\Node;

class Category extends Node
{
    protected $parentColumn = 'parent_id';

    protected $leftColumn = 'lft';

    protected $rightColumn = 'rgt';

    protected $depthColumn = 'depth';

    protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth');

    public function scopeSearch($query, $search)
    {
    	return $query->where(function($query) use ($search) {
    		$query->where('code', 'LIKE', "%$search%")
    			  ->OrWhere('name', 'LIKE', "%$search%");
    	});
    }
}