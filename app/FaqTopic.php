<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqTopic extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'faq_topics';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the faqs associated with the topic.
     */
    public function faqs()
    {
        return $this->hasMany(Faq::class, 'faq_topic_id');
    }

    /**
     * Get the faqs associated with the topic.
     */
    public function hasFaqs()
    {
        return $this->faqs->count();
    }
}
