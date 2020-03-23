<?php

namespace App;

class Currency extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'currencies';

    /**
     * The attributes that should be casted to boolean types.
     *
     * @var array
     */
    protected $casts = [
        'symbol_first' => 'boolean',
    ];

	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];

    /**
     * Get all of the countries for the currency.
     */
    public function countries()
    {
        return $this->hasMany(Country::class);
    }

    /**
     * Setters
     */
    // public function setAlternateSymbolsAttribute($value)
    // {
    //     $this->attributes['alternate_symbols'] = serialize($value);
    // }

    /**
     * Getters
     */
    // public function getAlternateSymbolsAttribute($value)
    // {
    //     return unserialize($value);
    // }
}
