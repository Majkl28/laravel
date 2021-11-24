<!DOCTYPE html>
<html lang="sk-SK">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', env('APP_NAME'))</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />

    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-primary font-weight-bold" href="#">Kontakty a čísla na oddelenia</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-sm-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        EN
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">SK</a>
                        <a class="dropdown-item" href="#">DE</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <div class="input-group mr-sm-2">
                    <input class="form-control" type="search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn border-left-0 input-group-text bg-white" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <a href="#" class="btn btn-success my-2 my-sm-0">Prihlásenie</a>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item mr-sm-3">
                    <a class="nav-link font-weight-bold" href="#">O nás</a>
                </li>
                <li class="nav-item mr-sm-3">
                    <a class="nav-link font-weight-bold" href="#">Zoznam miest</a>
                </li>
                <li class="nav-item mr-sm-3">
                    <a class="nav-link font-weight-bold" href="#">Inšpekcia</a>
                </li>
                <li class="nav-item mr-sm-3">
                    <a class="nav-link font-weight-bold" href="#">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@yield('content')

<footer class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <ul>
                    <li class="text-uppercase font-weight-bold">Adresa a kontakt</li>
                    <li>ŠÚKL</li>
                    <li>Kvetná 11</li>
                    <li>825 08 Bratislava 26</li>
                    <li>Ústredňa:</li>
                    <li>+421-2-50701 111</li>
                </ul>
                <ul>
                    <li class="text-uppercase font-weight-bold">Kontakty</li>
                    <li><a href="#">telefónne čísla</a></li>
                    <li><a href="#">adresa</a></li>
                    <li><a href="#">úradné hodiny</a></li>
                    <li><a href="#">bankové spustenie</a></li>
                </ul>
                <ul>
                    <li class="text-uppercase font-weight-bold">Informácie pre verejnosť</li>
                    <li><a href="#">Zoznam vyvezených liekov</a></li>
                    <li><a href="#">MZ SR</a></li>
                    <li><a href="#">Národný portál zdravia</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3">
                <ul>
                    <li class="text-uppercase font-weight-bold">O nás</li>
                    <li><a href="#">Dotazníky</a></li>
                    <li><a href="#">Hlavní predstavitelia</a></li>
                    <li><a href="#">Zákldné dokumenty</a></li>
                    <li><a href="#">Zmluvy za ŠÚKL</a></li>
                    <li><a href="#">História a súčasnosť</a></li>
                    <li><a href="#">Národná spolupráca</a></li>
                    <li><a href="#">Medzinárodná spolupráca</a></li>
                    <li><a href="#">Poradné orgány</a></li>
                    <li><a href="#">Legislatíva</a></li>
                    <li><a href="#">Priestupky a iné správne delikty</a></li>
                    <li><a href="#">Zoznam dlžníkov</a></li>
                    <li><a href="#">Sadzobník ŠÚKL</a></li>
                    <li><a href="#">Verejné obstarávanie</a></li>
                    <li><a href="#">Vzdelávacie akcie a prezentácie</a></li>
                    <li><a href="#">Konzultácie</a></li>
                    <li><a href="#">Voľné pracovné miesta (0)</a></li>
                    <li><a href="#">Poskytovanie informácií</a></li>
                    <li><a href="#">Sťažnosti a petície</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3">
                <ul>
                    <li class="text-uppercase font-weight-bold">Médiá</li>
                    <li><a href="#">Tlačové správy</a></li>
                    <li><a href="#">Lieky v médiách</a></li>
                    <li><a href="#">Kontakt pre médiá</a></li>
                </ul>
                <ul>
                    <li class="text-uppercase font-weight-bold">Databázy a servis</li>
                    <li><a href="#">Databáza liekov a zdravotníckych pomôcok</a></li>
                    <li><a href="#">Iné zoznamy</a></li>
                    <li><a href="#">Kontaktný formulár</a></li>
                    <li><a href="#">Mapa stránok</a></li>
                    <li><a href="#">A - Z index</a></li>
                    <li><a href="#">Linky</a></li>
                    <li><a href="#">RSS</a></li>
                    <li><a href="#">Doplnok pre internetový prehliadač</a></li>
                    <li><a href="#">Prehliadače formátov</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3">
                <ul>
                    <li class="text-uppercase font-weight-bold">Drogové prekurzory</li>
                    <li><a href="#">Aktuality</a></li>
                    <li><a href="#">Legislatíva</a></li>
                    <li><a href="#">Pokyny</a></li>
                    <li><a href="#">Kontakt</a></li>
                </ul>
                <ul>
                    <li class="text-uppercase font-weight-bold">Iné</li>
                    <li><a href="#">Linky</a></li>
                    <li><a href="#">Mapa stránok</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Podmienky používania</a></li>
                </ul>
                <ul>
                    <li class="text-uppercase font-weight-bold">Rapid alert system</li>
                    <li><a href="#">Rýchla výstraha vyplývajúcaa z nedostatkov v kvalite liekov</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

@stack('scripts')
</body>
</html>
