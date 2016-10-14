<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'blog_name', 'blog_title', 'blog_description', 'blog_about', 'blog_copyright', 'blog_privacy', 'blog_facebook', 'blog_twitter',
    ];
}
