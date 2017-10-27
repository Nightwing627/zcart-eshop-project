<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatus extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_statuses';

    /**
     * The attributes that should be casted to boolean types.
     *
     * @var array
     */
    protected $casts = [
        'send_email_to_customer' => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'deleted_at'];

    /**
     * Get the shop associated with the order status.
     */
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    /**
     * Get the orders associated with the order status.
     */
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    /**
     * Get the emailTemplate associated with the order status.
     */
    public function emailTemplate()
    {
        return $this->belongsTo('App\EmailTemplate', 'email_template_id');
    }

    /**
     * Get email template for the post.
     *
     * @return array
     */
    public function setEmailTemplateIdAttribute($template_id)
    {
        $this->attributes['email_template_id'] = ($template_id == 0) ? Null : $template_id;
    }

    /**
     * Scope a query to only include records from the users shop.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMine($query)
    {
        return $query->where('shop_id', Auth::user()->shop_id);
    }
}
