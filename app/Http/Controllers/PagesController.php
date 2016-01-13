<?php

namespace FlairBooks\Http\Controllers;

use FlairBooks\Book;
use Illuminate\Http\Request;
use FlairBooks\Http\Requests;
use FlairBooks\Http\Controllers\Controller;

class PagesController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

    public function welcome()
    {
    	$recents = Book::latest()->take(4)->get();

    	return view('pages.welcome', compact('recents'));
    }
}
