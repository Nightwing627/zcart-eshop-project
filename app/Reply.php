<?php

namespace App;

use App\Common\Attachable;

class Reply extends BaseModel
{
    use Attachable;

   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'replies';

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['repliable'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                    'reply',
                    'user_id',
                    'customer_id',
                    'read',
                    'repliable_id',
                    'repliable_type'
                ];

    /**
     * Get all of the owning repliable models.
     */
    public function repliable()
    {
        return $this->morphTo();
    }

    /**
     * Get the user associated with the model.
    */
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => trans('app.user')
        ]);;
    }

    /**
     * Get the customer associated with the model.
    */
    public function customer()
    {
        return $this->belongsTo(Customer::class)
        ->withDefault([
            'name' => trans('app.guest_customer')
        ]);
    }

}
