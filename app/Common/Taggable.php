<?php

namespace App\Common;

/**
 * Attach this Trait to a model to have the ability of tagging
 *
 * @author Munna Khan
 */
trait Taggable {

    /**
     * Get all of the tags for the model.
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

}