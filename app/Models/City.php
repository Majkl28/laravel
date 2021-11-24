<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * City
 *
 * @mixin Builder
 */
class City extends Model
{
    protected $fillable = [
        'name',
        'mayor_name',
        'city_hall_address',
        'phone',
        'fax',
        'img_path',
    ];

    /**
     * Get the emails for the city.
     */
    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    /**
     * Get the web addresses for the city.
     */
    public function webAddresses()
    {
        return $this->hasMany(WebAddress::class);
    }
}
