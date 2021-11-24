<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Email;
use App\Models\WebAddress;
use Illuminate\Contracts\View\View;

class CityController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  City  $city
     * @return View
     */
    public function show(City $city): View
    {
        return view('city.show', [
            'city' => $city,
            'emails' => Email::where('city_id', $city->id)->get(),
            'webAddresses' => WebAddress::where('city_id', $city->id)->get()
        ]);
    }
}
