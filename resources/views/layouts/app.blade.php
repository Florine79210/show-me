<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="/js/app.js"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container-fluid">

                <a class="navbar-brand" href="{{ url('/home') }}">
                    <div class="row">
                        <img class="w-25" src="{{ asset("images/logoBlanc_show-me.png") }}" alt="main avec doigt pointé">
                        <p class="ml-5 nomDuSite">Show Me<p>
                    </div>
                </a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        @auth
                        <div class="col-md-12">

                            <div class="row justify-content-end">
                                <li class="nav-item dropdown">

                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('Bonjour')}} {{ Auth::user()->pseudo }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item text-dark" href="{{ route('user.profile', auth()->user()) }}">{{ __('Mon profil') }}</a>

                                        <a class="dropdown-item text-dark" href="{{ route('user.update') }}">{{ __('Mes infos') }}</a>

                                        <a class="dropdown-item text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Déconnexion') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </div>

                            <div class="row">
                                <li class="nav-item">
                                    <form class="form-inline" action="{{ route('show-its.search') }}" method="post" role="search">
                                        @csrf
                                        <input class="form-control mr-sm-2" name="q" type="search" placeholder="Rechercher un Show It">
                                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Rechercher</button>
                                    </form>
                                </li>
                            </div>

                        </div>
                        @endauth

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session()->has('message'))
            <p class="alert alert-success">{{ session()->get('message') }}</p>
            @endif

            @yield('content')

        </main>
    </div>
</body>

</html>