<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth_admin');
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home', ['parent_view' => 'app-admin']);
	}
}
