@extends('base')

@section('title', $city->name)

@section('content')
    <div class="city-section bg-white border-top">
        <div class="container">
            <h1 class="text-center mb-5">Detail obce</h1>
            <div class="row m-0 shadow">
                <div class="col-lg-6 p-5">
                    <div class="row">
                        <div class="col-6 font-weight-bold">Meno starostu:</div>
                        <div class="col-6">{{$city->mayor_name}}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 font-weight-bold">Adresa obecného úradu:</div>
                        <div class="col-6">{{$city->city_hall_address}}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 font-weight-bold">Telefón:</div>
                        <div class="col-6">{{$city->phone}}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 font-weight-bold">Fax:</div>
                        <div class="col-6">{{$city->fax}}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 font-weight-bold">Email:</div>
                        <div class="col-6">
                            @foreach($emails as $email)
                                {{$email->email}}<br>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 font-weight-bold">Web:</div>
                        <div class="col-6">
                            @foreach($webAddresses as $webAddress)
                                {{$webAddress->web_address}}<br>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-5 d-flex justify-content-center align-items-center d-flex flex-column">
                    <img src="{{ asset('storage/' . $city->img_path) }}" alt="logo" width="80" class="mb-3">
                    <h1 class="text-primary text-center">{{$city->name}}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
