<?php

namespace App\Http\Controllers;

use App\Models\City;
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
            'emails' => $city->emails()->get(),
            'webAddresses' => $city->webAddresses()->get()
        ]);
    }
}
