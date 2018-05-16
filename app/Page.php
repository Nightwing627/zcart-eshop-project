<?php

namespace App;

use Carbon\Carbon;
use App\Common\Imageable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes, Imageable;

    const VISIBILITY_PUBLIC    = 1;         //Default
    const VISIBILITY_MERCHANT  = 2;

    const PAGE_ABOUT_US             = 1;         //About us page
    const PAGE_PRIVACY_POLICY       = 2;         //The privacy policy page
    const PAGE_TNC_FOR_CUSTOMER     = 3;         //Terms and condiotion page for customers
    const PAGE_TNC_FOR_MERCHANT     = 4;         //Terms and condiotion page for merchants
    const PAGE_RETURN_AND_REFUND    = 5;         //Return and refund policy page

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
