<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
        'name', 'slug', 'icon',
    ];

	public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function posts()
    {
    	return $this->hasMany('App\Models\Post');
    }
}
