@extends('base')

@section('title', 'Pridanie automobilu')
@section('description', 'Formulár pre pridanie automobilu.')

@section('data')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">Nový automobil</div>


                <div class="card-body bg-light">
                    <form action="{{ route('car.store') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="producer_id" class="col-md-4 col-form-label text-md-right">Výrobca</label>
                            <select name="producer_id" id="producer_id" class="form-control col-md-6 custom-select" required>
                                <option></option>
                                @foreach($producers as $producer)
                                    <option value="{{$producer->id}}" {{ (old("producer_id") == $producer->id ? "selected":"") }}>{{$producer->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="model" class="col-md-4 col-form-label text-md-right">Model</label>
                            <input type="text" name="model" id="model" class="form-control col-md-6"
                                   value="{{ old('model') }}"
                                   required/>
                        </div>

                        <div class="form-group row">
                            <label for="engine" class="col-md-4 col-form-label text-md-right">Motor</label>
                            <input type="text" name="engine" id="engine" class="form-control col-md-6"
                                   value="{{ old('engine') }}"
                                   required/>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">Rok výroby</label>
                            <input type="number" name="year" id="year" class="form-control col-md-6"
                                   value="{{ old('year') }}"
                                   required
                                   min="1980" max="2020"/>
                        </div>

                        <div class="form-group row">
                            <label for="vin" class="col-md-4 col-form-label text-md-right">VIN</label>
                            <input type="text" name="vin" id="vin" class="form-control col-md-6"
                                   value="{{ old('vin') }}"
                                   required/>
                        </div>

                        <div class="form-group row">
                            <button type="submit" class="btn btn-dark col-md-6 offset-md-4">Pridať
                                automobil
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
