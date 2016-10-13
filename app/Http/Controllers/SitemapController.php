<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Post;
use App\Models\Category;

use Sitemap;

class SitemapController extends Controller
{
    public function index()
    {
        // Get a general sitemap.
        Sitemap::addSitemap('/sitemap');

        // You can use the route helpers too.
        Sitemap::addSitemap(route('sitemap.posts'));
        Sitemap::addSitemap(route('sitemap.categories'));

        // Return the sitemap to the client.
        return Sitemap::index();
    }

	public function posts()
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            Sitemap::addTag(route('post.show', $post->slug), $post->updated_at, 'daily', '0.8');
        }

        return Sitemap::render();
    }

	public function categories()
	{
	    $categories = Category::all();

	    foreach ($categories as $category) {
            Sitemap::addTag(route('category.show', $category->slug), $category->updated_at, 'daily', '0.8');
        }

	    return Sitemap::render();
	}

}
