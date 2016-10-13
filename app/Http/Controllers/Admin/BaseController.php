<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;

use Auth;

class BaseController extends Controller
{
	protected $user;

	public function construct()
	{
		$this->user = Auth::user();
	}
}