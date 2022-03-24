<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Strona główna</title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Lexend+Deca&display=swap');

            body {
                margin: 0;
                padding: 0;
                background: linear-gradient(
                    #243545,
                    #243545 var(--line-offset),
                    #dedede var(--line-offset)
                );
                width: 100vw;
                height: 100vh;
                font-family: 'Lexend Deca', sans-serif;
                color: #878787;

                --menu-item-size: 50px;
                --green-color: #329680;
                --blue-color: #099c95;
                --dark-green-color: #175b52;
                --white-color: #FFF;
                --gray-color: #EDEDED;
                --container-width: 700px;
                --container-height: 400px;
                --line-offset: calc((100% - var(--container-height))/ 2 + var(--menu-item-size) + 0.6em);
            }


            .container {
                width: var(--container-width);
                height: var(--container-height);
                margin-left: -350px;
                margin-top: -200px;
                top: 50%;
                left: 50%;
                position: absolute;
                z-index: 1;
            }

            .main-menu {
                display: flex;
                list-style: none;
                margin: auto 0;
                padding: 0.6em 0 0 0;
            }

            .main-menu > li {
                box-sizing: border-box;
                height: var(--menu-item-size);
                width: calc(3.5 * var(--menu-item-size));  
                line-height: var(--menu-item-size);
                padding: 0 2em;
                margin: 1px;
                transition: 0.5s linear all;
                background: var(--green-color);
                color: var(--dark-green-color);
                cursor: pointer;
                font-size: 16px;
                user-select: none;
            }

            .main-menu > li:not(.with-submenu) {
                clip-path: polygon(10% 0%, 0% 100%, 95% 100%, 100% 50%, 95% 0%);
                shape-outside: polygon(10% 0%, 0% 100%, 95% 100%, 100% 50%, 95% 0%);
            }

            .main-menu > li:nth-child(2) {
                transform: translateX(-5%);
            }

            .main-menu > li:nth-child(3) {
                transform: translateX(-10%)
            }

            .main-menu > li:nth-child(4) {
                transform: translateX(-15%)
            }

            .main-menu i {
                margin-right: 5px;
            }

            .main-menu > li:hover:not(.active){
                background: linear-gradient(to right, var(--green-color), var(--blue-color));

            }
            li a {text-decoration: none;
               color: var(--dark-green-color);
            }
            li a:active {
                color: var(--white-color);
            }
            a:hover {text-decoration: none;}

            .main-menu > li:active:not(.active),
            .main-menu > li:active:not(.with-submenu){
                background: var(--blue-color);

            }

            .main-menu > li:hover i:not(li.active) {
                color: #175c58;
            }

            .main-menu .active{
                color: var(--white-color);
                background: var(--blue-color);
                cursor: default;
                text-shadow: 1px 1px 1px var(--dark-green-color);
                font-size: 18px;
            }

            article {
               background: var(--gray-color);
               padding: 1em;
               border-radius: 0 0 5px 5px;
               box-shadow: 5px 5px 5px #CCC;
               position: relative;
               z-index: -1;
            }

            h1 {
                font-size: 115%;
                margin: 1em 2em;
                padding: 0;
                position: relative;
                color: #777;
            }

            .content {
                padding: 0 0 0 3em;
                font-size: 16px;
            }

            .submenu {
                display: none;
                position: absolute;
                z-index: 10;
                list-style: none;
                left: 0;
                margin: 0;
                padding: 0;
                min-width: calc(3.5 * var(--menu-item-size) - 5%);
                box-shadow: 5px 5px 5px #CCC;
            }

            .with-submenu {
                position: relative;
                display: inline-block;
                clip-path: polygon(10% 0%, 0% 100%, 0% 500%, 95% 500%, 95% 100%, 100% 50%, 95% 0%);
                shape-outside: polygon(10% 0%, 0% 100%, 95% 100%, 100% 50%, 95% 0%);
            }

            .with-submenu:hover .submenu {
                display: block;
            }

            .submenu > li {
                background: #dedede;
                border-bottom: 1px solid var(--gray-color); 
                color: #777;
                padding: 1.2em 1em;
                transition: 0.3s all linear;
                display: block;
                line-height: 0%;
            }

            .submenu > li:hover {
                background: var(--gray-color)
            }

            .submenu > li:active {
                background: var(--white-color);
            }
            textarea {
              width: 90%;
              height: 150px;
              padding: 12px 20px;
              box-sizing: border-box;
              border: 2px solid #ccc;
              border-radius: 4px;
              background-color: #f8f8f8;
              font-size: 16px;
              resize: none;
              margin: 5% 0% 5%;
            }
        </style>
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
            <h1>Forum</h1>
            <div class="content">
                <p>
                    <form role="form" id="comment-form" method="post" 
                    action="{{ route('update', $comment) }}">
                     {{ csrf_field() }}
                     <input name="_method" type="hidden" value="PUT">
                     <div class="box">
                     <div class="box-body">
                     <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}" 
                     id="roles_box">
                     <label><b>Treść</b></label><br>
                     <textarea name="message" id="message" cols="30" rows="10" required>{{$comment->message}}</textarea>
                     </div>
                     </div>
                     </div>
                     <div class="box-footer">
                     <button type="submit" class="btn btn-success">Zapisz</button>
                     </div>
                    </form>
                </p>
              
            </div>
        </article>
    </div>

    </body>
</html>