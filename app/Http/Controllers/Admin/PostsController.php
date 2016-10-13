<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

use Auth;
use Gate;

use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Services\Slug;
use App\Repositories\ImageRepository;

use Alert;

class PostsController extends BaseController
{
    /**
     * Display a listing of the post.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Post $post)
    {
    	return view('admin.posts.index')->with([
    		'posts' => $post->latestFirst()->simplePaginate(10),
    	]);
    }

    public function userPosts(User $user, Post $post)
    {
        return view('admin.posts.index')->with([
            'posts' => $user->posts()->latestFirst()->simplePaginate(10),
        ]);
    }

    public function create(Category $category)
    {
        $this->authorize('create', Post::class);

    	return view('admin.posts.create')->with([
    		'categories' => $category->get(),
            'tags' => Post::existingTags()->pluck('name'),
    	]);
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPostRequest $request, ImageRepository $imageRepo, Slug $slug)
    {
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $imageRepo->upload($request->file('image'));
        }

        $post = $request->user()->posts()->create([
            'slug' => $slug->createSlug($request->title),
            'title' => $request->title,
            'teaser' => $request->teaser,
            'content' => $request->content,
            'image' => $request->hasFile('image') ? $image : null,
            'category_id' => $request->input('category'),
            'live' => $request->input('save')
        ]);

        $post->tag(explode(',', $request->tags));

        if($post->live) {
            Alert::success('Post published successfully', 'Success')->persistent("Close");
        } else {
            Alert::success('Post drafted', 'Success')->persistent("Close");
        }

        return redirect()->route('admin.posts');
    }

    public function edit(Post $post, Category $category)
    {
        $this->authorize('owns', $post);
        return view('admin.posts.edit')->with([
            'post' => $post,
            'categories' => $category->get(),
        ]);
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Post $post
     * @param \App\Repositories\ImageRepository
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, UpdatePostRequest $request, ImageRepository $imageRepo)
    {
        $this->authorize('owns', $post);

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $imageRepo->upload($request->file('image'));
        }

        $post->title = $request->title;
        $post->teaser = $request->teaser;
        $post->content = $request->content;
        $post->image = $request->hasFile('image') ? $image : $post->image;
        $post->category_id = $request->input('category');
        $post->live = $request->input('save');

        $post->update();

        if(!empty($request->tags)) {
            $post->untag();
            $post->retag(explode(',', $request->tags));
        }

        Alert::success('Post successfully updated', 'Success')->persistent("Close");

        return redirect()->route('admin.posts');

    }

    /**
     * Remove the specified post from storage.
     *
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     *
     */
    public function destroy(Post $post)
    {
        $this->authorize('owns', $post);

        $post->delete();

        Alert::success('Post deleted successfully', 'Success')->persistent("Close");

        return redirect()->back();
    }
}
