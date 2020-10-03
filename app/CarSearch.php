<?php


namespace App;

use Illuminate\Http\Request;

class CarSearch
{
    public static function apply(Request $filters){
        $cars = (new Car)->newQuery();

        if ($filters->has("producer") && !empty($filters->input("producer")))
            $cars->where("producer_id", $filters->input("producer"));
        if ($filters->has("sort"))
            $cars->orderBy($filters->input("sort"));

        return $cars->paginate(8);
    }
}
