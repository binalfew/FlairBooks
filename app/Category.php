<?php

namespace FlairBooks;

use Baum\Node;
use FlairBooks\Book;

class Category extends Node
{
    protected $parentColumn = 'parent_id';

    protected $leftColumn = 'lft';

    protected $rightColumn = 'rgt';

    protected $depthColumn = 'depth';

    protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth');

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('code', 'LIKE', "%$search%")
                  ->OrWhere('name', 'LIKE', "%$search%");
        });
    }

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function count()
    {
        return $this->books()->count();
    }

    public function add($books)
    {
        $method = $books instanceof Book ? 'save' : 'saveMany';

        $this->books()->$method($books);
    }

    public function remove($books =null)
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

    public function wipeout()
    {
        $this->books()->detach();
    }
}
