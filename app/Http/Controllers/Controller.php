<?php

namespace FlairBooks\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $user;

    public function __construct()
    {
    	$this->user = Auth::user();
    	view()->share('signedIn', Auth::check());
    	view()->share('user', $this->user);
    	//view()->share('bookCategories', Category::roots()->get());
    }
}
