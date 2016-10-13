<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Message;

class DashboardController extends BaseController
{
	public function index()
	{
		$posts = Post::count();
		$categories = Category::count();
		$users = User::count();

		return view('admin.pages.home', compact('posts', 'categories', 'users'));
	}
}
