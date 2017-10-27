<?php

namespace App;

// use App\Common\Addressable;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    // use Addressable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'systems';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the currency associated with the blog post.
     */
    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }


}
