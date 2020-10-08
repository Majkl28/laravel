@extends('base')

@section('data')
    <table class="car table table-striped table-bordered table-responsive-md">
        <tr>
            <td>Výrobca:</td>
            <td>{{$car->producer->name}}</td>
        </tr>
        <tr>
            <td>Model:</td>
            <td>{{ $car->model }}</td>
        </tr>
        <tr>
            <td>Motor:</td>
            <td>{{ $car->engine }}</td>
        </tr>
        <tr>
            <td>Rok výroby:</td>
            <td>{{ $car->year }}</td>
        </tr>
        <tr>
            <td>VIN:</td>
            <td>{{ $car->vin }}</td>
        </tr>
    </table>

    <div>
        <p class="small text-secondary pt-2 mt-4"><i class="fa fa-calendar"></i> {{ $car->updated_at }}</p>
    </div>
@endsection
