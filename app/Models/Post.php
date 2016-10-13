<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;
use Conner\Tagging\Taggable;

class Post extends Model
{
    use Taggable;
    use Searchable;

	protected $fillable = [
	    'slug', 'title', 'teaser', 'content', 'image', 'category_id', 'live'
	];

    public function getRouteKeyName()
    {
    	return 'slug';
    }

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

    public function category()
    {
    	return $this->belongsTo('App\Models\Category');
    }

    /**
     * Search the model
     */
    public function searchableAs()
    {
        return 'posts';
    }


    public function scopeLatestFirst($query)
    {
    	return $query->orderBy('created_at', 'desc');
    }

    public function scopePopular($query)
    {
        return $query->orderBy('views', 'desc');
    }

    public function scopeIsLive($query)
    {
        return $query->where('live', true);
    }
}
