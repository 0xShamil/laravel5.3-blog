<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UpdateBlogSettingsRequest;

use App\Models\Setting;

use Alert;

class SettingsController extends BaseController
{
    public function __construct()
	{
		$this->middleware('can:manage-settings');
	}

    public function index(Setting $setting)
    {
        return view('admin.settings.index')->with([
            'setting' => $setting->first(),
        ]);
    }

    public function showSettingsEditForm(Setting $setting)
    {
        return view('admin.settings.edit')->with([
            'setting' => $setting->first(),
        ]);
    }

    public function update(UpdateBlogSettingsRequest $request, Setting $setting)
    {
        $setting->fill([
            'blog_name' => $request->input('blog_name'),
            'blog_title' => $request->input('blog_title'),
            'blog_description' => $request->input('blog_description'),
            'blog_about' => $request->input('blog_about'),
            'blog_copyright' => $request->input('blog_copyright'),
            'blog_privacy' => $request->input('blog_privacy'),
            'blog_facebook' => $request->input('blog_facebook'),
            'blog_twitter' => $request->input('blog_twitter'),
        ])->save();

        Alert::success('Blog settings Updated', 'Success')->persistent("Close");

        return redirect()->route('admin.settings.index');
    }
}
