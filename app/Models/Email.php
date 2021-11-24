<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * City
 *
 * @mixin Builder
 */
class Email extends Model
{
    protected $fillable = [
        'email'
    ];
}
