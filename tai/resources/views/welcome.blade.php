<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styl.css">
        <link rel="stylesheet" href="icons.css">
        <title>Strona główna</title>
        <style>a {text-decoration: none;}
a:hover {text-decoration: none;}</style>
    </head>
    <body>
         <div class="container">
          
        <nav class="menu">
            <ul class="main-menu">
                <li class="active" onclick="location.href='{{ url('') }}'"><i class="fa fa-home"></i>Główna</li>
                <li c onclick="location.href='{{ url('/comments') }}'"><i class="fa fa-home"></i>Forum</li>
                
                @if (Route::has('login'))
                @auth
                <li class="with-submenu">
                    <i class="fa fa-briefcase"></i>Profil<i class="fa fa-caret-down"></i>
                    <ul class="submenu">
                        <li onclick="location.href='{{ url('/profile') }}'">Dane</li>
                        <li onclick="location.href='{{ route ('users.edit', Auth::user()->id) }}';">Edycja</li>
                    </ul>
                </li>
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
                       Witaj na naszym forum gdzie możesz swobodnie wymieniać sie wiadomościami z innymi użytkownikami!
                       Zaloguj się lub zarejestruj, żeby zyskać dodatkowe funkcjonalnosci takie jak: zarządzanie wpisami czy edycja profilu.
                </p>
                <p>
                      Przewodnik po zakładkach:<br>
                      Forum - daje ci dostęp do forum gdzie możesz sie udzielać oraz zarządzać wpisami<br>
                      Profil - zapoznaj się ze szczegółami profilu oraz modyfikuj dane<br>
                      Wyloguj - aby bezpiecznie wylogować się z forum
                </p>
                <p>
                    <b>Kącik autora</b><br>
                
                Autor: Klaudia Parczyńska <br>
                E-Mail: klaudia.parczynksa@pollub.edu.pl<br>
                Uczelnia: <a href='https://pollub.pl'>Politechnika Lubelska</a>
                <br><!-- comment -->
                <div class="wrapper">
                    <div class="icon facebook">
                      <div class="tooltip">Facebook</div>
                      <span><i class="fab fa-facebook-f"></i></span>
                    </div>
                    <div class="icon twitter">
                      <div class="tooltip">Twitter</div>
                      <span><i class="fab fa-twitter"></i></span>
                    </div>
                    <div class="icon instagram">
                      <div class="tooltip">Instagram</div>
                      <span><i class="fab fa-instagram"></i></span>
                    </div>
                    <div class="icon github">
                      <div class="tooltip">Github</div>
                      <span><i class="fab fa-github"></i></span>
                    </div>
                    <div class="icon youtube">
                      <div class="tooltip">Youtube</div>
                      <span><i class="fab fa-youtube"></i></span>
                    </div>
                  </div>
                </p>
              
            </div>
        </article>
    </div>

    </body>
</html>
