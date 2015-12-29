<?php

namespace FlairBooks\Services;

use FlairBooks\Author;
use FlairBooks\Category;

class Search
{
	public function categories($search)
	{
		return Category::search($search)->paginate(20);
	}

	public function authors($search)
	{
		return Author::search($search)->paginate(20);
	}
}