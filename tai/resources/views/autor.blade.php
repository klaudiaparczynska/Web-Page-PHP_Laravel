<!DOCTYPE html>
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
                <li class="active" onclick="location.href='{{ url('') }}'"><i class="fa fa-home"></i>Główna</li>
                <li class="active" onclick="location.href='{{ url('/comments') }}'"><i class="fa fa-home"></i>Forum</li>
                <li class="with-submenu">
                    <i class="fa fa-briefcase"></i>Kontakt<i class="fa fa-caret-down"></i>
                    <ul class="submenu">
                        <li>Autor</li>
                        <li onclick="location.href='https://pollub.pl';">Uczelnia</li>
                    </ul>
                </li>
                @if (Route::has('login'))
                @auth
                <li><i class="fa fa-user"></i><a href="{{ url('/profile') }}">Profil</a></li>
                <li><i class="fa fa-user"></i><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Wyloguj</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form></li>
                @else
                <li><i class="fa fa-user"></i><a href="{{ route('login') }}">Logowanie</a></li>
                @if (Route::has('register'))
                <li><i class="fa fa-user"></i><a href="{{ route('register') }}">Rejestracja</a></li>
                @endif
                @endauth
                @endif
            </ul>
        </nav>
        <article>
            <h1>Forum </h1>
            <div class="content">
                <p>
                Autorem forum jest: Klaudia Parczyńska
                Adres e-mail: klaudia.parczynska@pollub.edu.pl
                </p>
                <p>
Tekst2
                </p>
              
            </div>
        </article>
    </div>

    </body>
</html>




