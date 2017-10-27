<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blogs';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'published_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'published_at', 'user_id', 'status'];

    /**
     * Get the User associated with the blog post.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

	/**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany('App\BlogComment');
    }

    /**
     * Get all of the tags for the blog.
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    /**
     * Scope a query to only include published blogs.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('status', 1)->where('approved', 1);
    }

    /**
     * Get tag list for the post.
     *
     * @return array
     */
    public function getTagListAttribute()
    {
         if (count($this->tags)) return $this->tags->pluck('id')->toArray();
    }

    /**
     * Set tag time formate for the post.
     *
     * @return array
     */
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ? Carbon::createFromFormat('Y-m-d h:i a', $value) : null;
    }

}
