<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * City
 *
 * @mixin Builder
 */
class WebAddress extends Model
{
    protected $fillable = [
        'web_address'
    ];
}
