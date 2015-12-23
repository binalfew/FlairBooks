<?php

namespace FlairBooks\Http\Controllers;

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
    	return view('pages.welcome');
    }
}
