<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Post;
use App\Models\Category;


class HomeController extends Controller
{
    public function index(Post $post, Category $category)
    {
    	return view('posts.index')->with([
    		'posts' => $post->latestFirst()->isLive()->simplePaginate(10),
    	]);
    }

    public function showSinglePost(Post $post)
    {
        if(!$post->live) {
            abort(404, 'Article does not exist');
        }

        $post->increment('views');

    	return view('posts.post')->with([
    		'post' => $post,
    	]);
    }

    public function showPostsWithCategory(Category $category, Post $post)
    {
        return view('categories.posts')->with([
            'category' => $category,
            'posts' => $category->posts()->latestFirst()->isLive()->simplePaginate(10),
        ]);
    }

    public function showTaggedPosts($tag, Post $post)
    {
        return view('tags.posts')->with([
            'tag' => $tag,
            'posts' => $post->withAnyTag([$tag])->latestFirst()->isLive()->simplePaginate(10),
        ]);
    }


}
