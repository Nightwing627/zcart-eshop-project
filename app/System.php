<?php

namespace App;

use App\Common\Imageable;
use App\Common\Addressable;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use Addressable, Imageable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'systems';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                        'maintenance_mode',
                        'name',
                        'legal_name',
                        'slogan',
                        'email',
                        'timezone_id',
                        'currency_id',
                        'google_analytics_id',
                    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'maintenance_mode' => 'boolean',
    ];

    /**
     * Get the currency associated with the blog post.
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Check if the system is down or live.
     *
     * @return bool
     */
    public function isDown()
    {
        return $this->maintenance_mode;
    }
}
