@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styl.css">
        <title>Strona główna</title>
        <style>a {text-decoration: none;}
a:hover {text-decoration: none;}</style>
    </head>
    <body>
         <div class="container">
        <nav class="menu">
            <ul class="main-menu">
                <li onclick="location.href='{{ url('') }}'"><i class="fa fa-home"></i>Główna</li>
                <li onclick="location.href='{{ url('/comments') }}'"><i class="fa fa-home"></i>Forum</li>
                
                @if (Route::has('login'))
                @auth
                <li class="with-submenu">
                    <i class="fa fa-briefcase"></i>Profil<i class="fa fa-caret-down"></i>
                    <ul class="submenu">
                        <li onclick="location.href='{{ url('/profile') }}'">Dane</li>
                        <li onclick="location.href='https://pollub.pl';">Edycja</li>
                    </ul>
                </li>
                <li><i class="fa fa-user"></i><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Wyloguj</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form></li>
                @else
                <li><i class="active-link fa fa-user"></i><a href="{{ route('login') }}">Logowanie</a></li>
                @if (Route::has('register'))
                <li><i class="fa fa-user"></i><a href="{{ route('register') }}">Rejestracja</a></li>
                @endif
                @endauth
                @endif
            </ul>
            </ul>
        </nav>
        <article>
            <div class="content">
                <p>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Logowanie') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Hasło') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Zapamiętaj') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Zaloguj') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Zapomniałeś hasła?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                </p>
              
            </div>
        </article>
    </div>

    </body>
</html>
@endsection
