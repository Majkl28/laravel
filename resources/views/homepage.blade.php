@extends('base')

@section('title', 'Homepage')

@section('content')
    <div class="search-section">
        <div class="container">
            <h1 class="text-white text-center mb-4">Vyhľadať v databáze obcí</h1>
            <div class="row justify-content-center">
                <form class="col-md-9 col-lg-6">
                    <input name="city" id="city" type="text" class="form-control shadow p-4" placeholder="Zadajte názov">
                </form>
            </div>
        </div>
    </div>
@endsection
