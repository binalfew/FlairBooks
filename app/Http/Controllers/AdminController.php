<?php

namespace FlairBooks\Http\Controllers;

use Illuminate\Http\Request;

use FlairBooks\Http\Requests;
use FlairBooks\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
        parent::__construct();
    }

    public function getDashboard()
    {
        $dashboardCls = 'active';

    	return view('admin.dashboard', compact('dashboardCls'));
    }
}
