<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'producer_id', 'model', 'engine', 'year', 'vin',
    ];

    public function producer()
    {
        return $this->belongsTo(Producer::class);
    }
}
