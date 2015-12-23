<?php

namespace FlairBooks\Http\Controllers;

use Illuminate\Http\Request;

use FlairBooks\Http\Requests;
use FlairBooks\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }
}
