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
}