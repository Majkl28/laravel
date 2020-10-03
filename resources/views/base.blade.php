<!DOCTYPE html>
<html lang="cs-CZ">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="@yield('description')" />
    <title>@yield('title', env('APP_NAME'))</title>

    <link rel="shortcut icon" href="{{asset("images/car.png")}}" />

    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />

    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body class="bg-white">

<div class="bg-dark px-md-4 mb-3">
    <nav class="navbar navbar-expand-lg navbar-dark">

        <a class="navbar-brand mr-sm-5">Laravel</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="basicExampleNav">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link pr-3" href="{{url("")}}">Domov</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pr-3" href="{{route("car.index")}}">Automobily</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link pr-3" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Odhlásiť sa</a>
                    </li>
                    <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
                        @csrf
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link pr-3" href="{{route("login")}}">Prihlásenie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pr-3" href="{{route("register")}}">Registrácia</a>
                    </li>
                @endauth
            </ul>

            <div class="custom-control custom-switch mr-auto">
                <input type="checkbox" class="custom-control-input" id="darkSwitch" />
                <label class="custom-control-label text-white" for="darkSwitch">Tmavý režim</label>
            </div>

            <form class="form-inline">
                <div class="md-form my-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                </div>
            </form>
        </div>
    </nav>
</div>

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @include("messages.alerts")
    @yield('data')

    <footer class="pt-4 my-md-5 border-top">
        <p>
            Copyright © 2020
        </p>
    </footer>
</div>

@stack('scripts')
</body>
</html>
