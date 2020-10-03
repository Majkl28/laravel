<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarSearch;
use App\Producer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Http\Request;



class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
        $this->authorizeResource(Car::class, 'car');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('car.index', [
            'cars' => CarSearch::apply($request),
            'producers' => Producer::select(["name", "id"])->orderBy("name")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("car.create", ["producers" => Producer::select(["name", "id"])->orderBy("name")->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'producer_id' => ['required'],
            'model' => ['required', 'max:80'],
            'year' => ['required'],
            'vin' => ['required', 'min:5', 'unique:cars,vin'],
            'engine' => ['required'],
        ]);

        //Mass assigment
        Car::create($request->all());

        return redirect()->route('car.index')->with("success", "Automobil bol úspešne pridaný do evidencie.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return Application|Factory|View
     */
    public function show(Car $car)
    {
        return view('car.show', ['car' => $car]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return RedirectResponse
     */
    public function destroy(Car $car)
    {
        try {
            $car->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['Pri procese odstraňovania automobilu došlo k chybe.']);
        }
        return redirect()->route("car.index")->with("success","Automobil bol úspešne odstránený z evidencie.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Car  $car
     * @return Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }
}
