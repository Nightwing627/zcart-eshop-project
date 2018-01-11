<?php

namespace App;

use App\State;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'addresses';

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['country', 'state'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                        'address_title',
                        'address_type',
                        'address_line_1',
                        'address_line_2',
                        'city',
                        'state_id',
                        'country_id',
                        'zip_code',
                        'phone',
                        'addressable_id',
                        'addressable_type',
                        'latitude',
                        'longitude',
                    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function($address)
        {
            if(config('system_settings.address_geocode'))
            {
                $address->geocode();
            }
        });
    }

    /**
     * Get all of the owning addressable models.
     */
    public function addressable()
    {
        return $this->morphTo();
    }

    /**
     * Get the country of the address.
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * Get the state of the address.
     */
    public function state()
    {
        return $this->belongsTo('App\State');
    }

    /**
     * Creat new state and set the id if the given value is not available
     */
    public function setStateIdAttribute($value)
    {
        if (!is_numeric($value) and $value != NULL)
        {
            $state = State::create(['name' => $value, 'country_id' => \Request::input('country_id')]);
            $value = $state->id;
        }

        $this->attributes['state_id'] = $value;
    }

    /**
     * Try to fetch the coordinates from Google
     * and store it to database
     *
     * @return $this
     */
    public function geocode()
    {
        // build query string
        $query = [];
        $query[] = $this->address_line_1 ?: '';
        $query[] = $this->address_line_2 ?: '';
        $query[] = $this->city ?: '';
        $query[] = $this->state_name;
        // $query[] = $this->state_id ? $this->state->name : $this->state_name;
        $query[] = $this->zip_code ?: '';
        $query[] = $this->country ? $this->country->name : '';
        // build query string
        $query = trim( implode(', ', array_filter($query)) );
        $query = str_replace(' ', '+', $query);

        if(empty($query) || $query == '')
        {
            return;
        }

        // build url
        $url = 'https://maps.google.com/maps/api/geocode/json?address='.$query.'&sensor=false';
        // try to get geo codes
        if ( $geocode = file_get_contents($url) )
        {
            $output = json_decode($geocode);

            if ( count($output->results) && isset($output->results[0]) )
            {
                if ( $geo = $output->results[0]->geometry )
                {
                    $this->latitude = $geo->location->lat;
                    $this->longitude = $geo->location->lng;
                }
            }
        }

        return $this;
    }

    /**
     * Formate the address toHtml
     *
     * @param  string $separator html code
     *
     * @return str
     */
    public function toHtml($separator = '<br />')
    {
        $html = [];

        if ('App\Customer' == $this->addressable_type)
            $html [] = '<strong class="pull-right">' . strtoupper($this->address_type) . '</strong>';

        if(config('system_settings.show_address_title'))
            $html [] = $this->address_title;

        if(strlen($this->address_line_1))
            $html [] = $this->address_line_1;

        if(strlen($this->address_line_2))
            $html [] = $this->address_line_2;

        if(strlen($this->city))
            $html []= sprintf('%s, %s %s', e($this->city), e($this->state_id ? $this->state->name : $this->state_name), e($this->zip_code));

        if(config('system_settings.address_show_country'))
            $html []= e($this->country->name);

        if(strlen($this->phone))
            $html [] = '<abbr title="' . trans('app.phone') . '">P:</abbr> ' . e($this->phone);

        $addressStr = implode($separator, $html);

        $return = '<address>'.$addressStr.'</address>';

        return $return;
    }

    /**
     * Return a "string formatted" version of the address
     */
    public function toString()
    {
        $str = array();
        if(config('system_settings.show_address_title'))
        {
            $str [] = $this->address_title;
        }

        if(strlen($this->address_line_1))
            $str [] = $this->address_line_1;

        if(strlen($this->address_line_2))
            $str [] = $this->address_line_2;

        if(strlen($this->city))
        {
            $state_name = $this->state ? $this->state->name : '';
            $str []= sprintf('%s, %s %s', $this->city, $state_name, $this->zip_code);
        }

        if(config('system_settings.address_show_country'))
        {
            $str []= $this->country->name;
        }

        return implode(', ', $str);
    }

    /**
     * Get address as array
     *
     * @return array|null
     */
    public function toArray()
    {
        $address = [];
        $address ['address_type'] = $this->address_type;
        $address['address_title'] = $this->address_title;
        $address['address_line_1'] = $this->address_line_1;
        $address['address_line_2'] = $this->address_line_2;
        $address['city'] = $this->city;
        $address['state'] = $this->state->name;
        $address['zip_code'] = $this->zip_code;
        $address['country'] = $this->country->name;
        $address['phone'] = $this->phone;
        $address['latitude'] = $this->latitude;
        $address['longitude'] = $this->longitude;

        $address = array_filter($address);

        if ( empty($address) )
        {
            return NULL;
        }

        return $address;
    }

}
