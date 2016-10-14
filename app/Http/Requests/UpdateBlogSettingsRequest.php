<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Gate;

class UpdateBlogSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'blog_name' => 'required',
            'blog_title' => 'required',
            'blog_description' => 'required',
            'blog_about' => 'required',
            'blog_copyright' => 'required',
            'blog_privacy' => 'required',
            'blog_facebook' => 'url',
            'blog_twitter' => 'url',
        ];
    }
}
