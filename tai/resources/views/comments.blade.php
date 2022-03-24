<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styl.css">
        <link rel="stylesheet" href="comments.css">
        <title>Strona główna</title>
        <style>a {text-decoration: none;}
        a:hover {text-decoration: none;}
        img {border-radius: 50%;}</style>
    </head>
    <body>
         <div class="container">
          
        <nav class="menu">
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
        </nav>
        </nav>
        
        <article>
            <h1>Forum </h1>
            <div>
                <p>
                    @auth
    <?php $ile = 0; $all = 0; ?>               
    <div class="col-lg-6">
        <div class="commentcard">
            <div class="comment-widgets">
                @foreach($comments as $comment)
                <?php $all += 1; ?>
                <div class="d-flex flex-row comment-row">
                    <div class="p-2">
                        @if($comment->user_id == \Auth::user()->id)
                        <img width=50 height=50 src="{{ asset('uploads/avatars/'.Auth::user()->avatar) }}">
                        @else
                        <img src="https://lasucom.edu.ng/wp-content/uploads/2020/10/114-1149847_avatar-unknown-dp.png" alt="user" width="50" height="50" class="rounded">
                        @endif
                    </div>
                    <div class="comment-text w-100">
                        <h4 class="font-medium">{{$comment->user->name}}</h4>
                         
                        <span class="m-b-15 d-block">{{$comment->message}} </span>
                        <div class="comment-footer"> 
                        <p><span class="text-muted">{{$comment->created_at}}</span>
                            
                        @if($comment->user_id == \Auth::user()->id)
                            <?php $ile += 1; ?>
 
                            <a href="{{ route('edit', $comment) }}" title="Edytuj">
                                <button type="button" class="btn comment-btn-cyan btn-sm">Edycja</button></a><!-- comment -->
                                <!--<a href="#" title="Polub">
                            <button type="button" class="btn comment-btn-green btn-sm">Like</button> </a>-->
                                
                            <a href="{{ route('delete', $comment->id) }}" title="Skasuj">
                            <button type="button" class="btn comment-btn-danger btn-sm">Usuń</button> </a>
                        @endif
                        </p> </div>
                    
                    </div>
                </div>
                @endforeach
                <a href="{{ route('create') }}">
                    <button type="button" class="btn comment-btn-green btn-sm add-button">Dodaj</button>
                </a>
            </div> 
        </div>
         <?php echo("Liczba wystawionych przez ciebie komentarzy: $ile<br>"); 
                echo("Liczba wszystkich wystawionych komentarzy na forum: $all");?>
    </div>

                  @endauth
                  @guest
                  <h4><b>Zaloguj się aby umieścić wpis na forum</b></h4>
                  @endguest
                </p>
            </div>
        </article>
    </div>

    </body>
</html>


