<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styl.css">
        <title>Strona główna</title>
        <style>a {text-decoration: none;}
a:hover {text-decoration: none;}
        img {border-radius: 50%;}</style>
    </head>
    <body>
         <div class="container">
          
        <nav class="menu">
            <ul class="main-menu">
                <li onclick="location.href='{{ url('') }}'"><i class="fa fa-home"></i>Główna</li>
                <li c onclick="location.href='{{ url('/comments') }}'"><i class="fa fa-home"></i>Forum</li>
                
                @if (Route::has('login'))
                @auth
                <li class="with-submenu">
                    <i class="active fa fa-briefcase"></i>Profil<i class="fa fa-caret-down"></i>
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
            <h1>Dane użytkownika:</h1>
            <div class="content">
                <p>
                <img width="100px" height="100px" src="{{ asset('uploads/avatars/'.$user->avatar) }}">
                    <h2>{{ $user->name }}</h2>
                    
                    <form  action="{{ route('user.profile.update') }}" method="PATCH" files = true style="display: none;">@csrf
                    <p><input type='file' name='avatar' value='avatar'></p>
                    <p><input type='submit'> </p>
                    </form> 

                </p>
                <p>
                    @auth
                    Nazwa użytkownika: {{ Auth::user()->name }} <br>
                    Adres e-mail: {{ Auth::user()->email }} <br>
                    <a href ="{{ route ('users.edit', Auth::user()->id) }}"> <br>
                        <button value="Ustawienia">Ustawienia</button> </a>                   
                    @endauth
                    @guest
                    Nie jestes zalogowany!
                    @endguest
                </p>
            </div>
        </article>
    </div>

    </body>
</html>


