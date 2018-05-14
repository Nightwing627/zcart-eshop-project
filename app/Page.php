<?php

namespace App;

use Carbon\Carbon;
use App\Common\Imageable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    const VISIBILITY_PUBLIC    = 1;         //Default
    const VISIBILITY_MERCHANT  = 2;

    use SoftDeletes, Imageable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['published_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'shop_id',
                    'author_id',
                    'title',
                    'slug',
                    'content',
                    'published_at',
                    'visibility',
                ];

    /**
     * Get the author for the refund.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Set the published_at for the model.
     */
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ? date("Y-m-d H:i:s", strtotime($value)) : null;
        // if($value) $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d h:i a', $value);
    }

    /**
     * Scope a query to only include records that have the given visibility.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVisibilityOf($query, $visibility)
    {
        return $query->where('visibility', $visibility);
    }

    public function visibilityName()
    {
        switch ($this->visibility) {
            case static::VISIBILITY_PUBLIC: return '<span class="label label-primary">' . trans('app.public') . '</span>';
            case static::VISIBILITY_MERCHANT: return '<span class="label label-outline">' . trans('app.merchants') . '</span>';
        }
    }
}
