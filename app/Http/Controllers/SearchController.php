<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        return view('posts.search')->with([
            'posts' => Post::search($request->q)->get(),
        ]);
    }
}
