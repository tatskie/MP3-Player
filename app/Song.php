<?php

namespace App;

use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
	use HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mp3', 'title', 'user_id', 'slug'
    ];

    public function setSlugAttribute($value) {

	    if (static::whereSlug($slug = Str::slug($value))->exists()) {

	        $slug = $this->incrementSlug($slug);
	    }

	    $this->attributes['slug'] = $slug;
	}

	public function incrementSlug($slug) {

	    $original = $slug;

	    $count = 2;

	    while (static::whereSlug($slug)->exists()) {

	        $slug = "{$original}-" . $count++;
	    }

	    return $slug;

	}
}