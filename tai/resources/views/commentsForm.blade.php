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
                <li onclick="location.href='{{ url('') }}'"><i class="fa fa-home"></i>Główna</li>
                <li class='active' onclick="location.href='{{ url('/comments') }}'"><i class="fa fa-home"></i>Forum</li>
                
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
                <li><i class="fa fa-user"></i><a href="{{ route('login') }}">Logowanie</a></li>
                @if (Route::has('register'))
                <li><i class="fa fa-user"></i><a href="{{ route('register') }}">Rejestracja</a></li>
                @endif
                @endauth
                @endif
            </ul>
            </ul>
        </nav>
        <article>
            <h1>Dodawanie wpisu</h1>
            <div class="content">
                <p>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form role="form"  action="{{ route('store') }}" id="comment-form" 
                   method="post" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="box">
                      <div class="box-body">
                        <div class="form-group{{ $errors->has('message')?'has-error':'' }}" id="roles_box">
                         <label><b>Treść</b></label> <br>
                         <textarea name="message" id="message" cols="20" rows="3" required></textarea>
                        </div>
                      </div>
                     </div>
                    <span><button type="submit" class="btn btn-success">Utwórz</button> </span>
                   </div>
                  </form>
                    
                </p>
              
            </div>
        </article>
    </div>

    </body>
</html>

    