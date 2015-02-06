<?php namespace Incremently\Http\Controllers;

use Incremently\Http\Requests;
use Incremently\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

    public function about( )
    {
        return view('pages.about');
	}

}
