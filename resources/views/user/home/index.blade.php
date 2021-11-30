@extends('templates.layout')

@section('class','home')
@section('sidebar')
<div class="close center title-2" id="close"><i class="fas fa-times"></i></div>
<sidebar class="sidebar" id="sidebar">
    
    <h2 class="title-2">Distritos</h2>
    <div class="search form-group">
        <div class="input-container">
            <span class="input-icon">
                <i class="fas fa-search"></i>
            </span>
            <input type="text" placeholder="Buscar" class="input" id="search">
        </div>
    </div>
    <ul class="districts mb-2">
        <li class="district {{!request()->get('district')?'active':''}}">
            <a href="{{route('home')}}">Todos los distritos</a>
        </li>
        @foreach ($districts as $district)

        <li class="district {{request()->get('district')==$district->id?'active':''}}" id="{{$district->id}}">
            <a href="{{route('home','district='.$district->id)}}">{{$district->district}}</a>
        </li>
        @endforeach
    </ul>

    <!-- <footer class="footer">
        <div class="section">
            <h4 class="title-3 mb-2">Politicas</h4>
            <ul class="text mb-1">
                <li>Terminos de condiciones</li>
            </ul>
        </div>
        <div class="section">
            <h4 class="title-3 mb-2">Informacion de la tienda</h4>
            <ul class="text">
                <li><i class="fas fa-phone mb-1"></i> 992322323</li>
                <li><i class="fas fa-envelope mb-1"></i> paola@juegaya.com</li>
            </ul>
        </div>
        <div class="section book">
            <h4 class="text mb-1 t-center">Libro de reclamaciones</h4>
            <div class="center">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                        <path d="M500 3698 c0 -487 -3 -1175 -7 -1530 l-6 -646 74 -6 c472 -43 897 -188 1280 -438 188 -123 379 -285 516 -438 42 -47 80 -86 85 -88 4 -2 8 650 8 1450 l0 1453 -82 110 c-89 119 -331 368 -443 456 -406 317 -853 499 -1362 554 l-63 7 0 -884z" />
                        <path d="M4545 4573 c-441 -52 -840 -196 -1175 -423 -211 -144 -456 -376 -603 -571 l-87 -117 0 -1456 0 -1455 163 162 c161 162 285 265 447 369 364 237 786 385 1219 428 57 5 107 10 112 10 5 0 9 638 9 1530 l0 1530 -27 -1 c-16 -1 -41 -4 -58 -6z" />
                        <path d="M123 3862 l-123 -37 0 -1567 c0 -863 4 -1568 8 -1568 4 0 66 13 138 30 275 62 389 74 729 75 249 0 336 -4 440 -18 239 -34 476 -91 685 -166 46 -16 86 -28 88 -26 2 1 -38 39 -89 84 -431 381 -927 586 -1501 621 -119 7 -164 13 -183 26 -58 38 -55 -36 -55 1329 0 690 -3 1255 -7 1254 -5 0 -63 -17 -130 -37z" />
                        <path d="M4860 2636 l0 -1253 -23 -34 c-29 -43 -71 -58 -167 -58 -190 -2 -467 -51 -680 -121 -316 -103 -650 -301 -885 -524 l-80 -75 84 30 c228 81 470 140 726 175 182 26 637 26 815 1 101 -14 304 -53 448 -84 l22 -5 0 1565 0 1566 -112 36 c-61 19 -120 35 -130 35 -17 0 -18 -44 -18 -1254z" />
                    </g>
                </svg>
            </div>
        </div>
    </footer> -->
</sidebar>
@endsection
@section('content')
<header class="header-container">
    <div class="header-home">
        <div class="menu-icon title-2" id="menu">
            <i class="fas fa-bars"></i>
        </div>
        <h1 class="title-2 t-center">Partidos</h1>
        <!-- <div class="notification">
            <span class="num-noti t-center">2</span>
        </div> -->
    </div>
</header>
<main class="section m-y container matches">
    <div class="matches">
        @if($matches->isEmpty())
        <p class="title-3 t-center">No hay partidos por ahora</p>
        @else
        @foreach ($matches as $match)
        <div class="match">
            <a href="{{route('match.show',$match->id)}}" class="link">
                <header class="match-info">
                    @if(!is_null($match->host()->profile()))
                    <div class="match-profile">
                        <img src="{{route('image',$match->host()->getProfilePicture())}}" alt="profile">
                    </div>
                    <p class="text">{{$match->host()->profile()->getFullName()}}</p>
                    @else
                    <div class="match-profile">
                        <img src="{{asset('assets/img/profile/default-profile.png')}}" alt="profile">
                    </div>
                    <p class="text">{{$match->host()->email}}</p>
                    @endif
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.7459 19.759C7.44784 19.4668 7.42074 19.0095 7.66461 18.6873L7.7459 18.595L14.4734 12L7.7459 5.40507C7.44784 5.11287 7.42074 4.65562 7.66461 4.33342L7.7459 4.24111C8.04396 3.94891 8.51037 3.92234 8.83904 4.16141L8.93321 4.24111L16.2541 11.4181C16.5522 11.7103 16.5793 12.1675 16.3354 12.4897L16.2541 12.582L8.93321 19.759C8.60534 20.0804 8.07376 20.0804 7.7459 19.759Z" fill="#200E32" />
                        </svg>
                    </div>
                </header>
            </a>
            <div class="match-content">
                <div class="match-icon match-value center">
                    <img src="{{asset('assets/img/categoria/soccer.png')}}" alt="">
                </div>
                <div class="match-description match-item text center">
                    <div class="t-center">
                        <p>{{$match->district()}}</p>
                        <div class="text-small tc-secondary t-center">
                            <div class="match-date">
                                <span>{{$match->date()}} </span>
                                <span> {{$match->time()}}</span>
                            </div>
                            <div class="match-status center">{{$match->getStatus()}}
                                <span class="match-clip {{$match->getClass()}}"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="match-players match-item center">
                    <p class="text-small tc-primary">Jugadores</p>
                    <div class="match-values center text-small">
                        <span class="current-players">{{$match->participantsAcepted()->count()}}</span>
                        <span class="match-polygon"></span>
                        <span class="max-players">{{$match->max_participants}}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif

    </div>
    <a href="{{route('match.create')}}" class="btn btn-primary btn-absolute center">
        <i class="fas fa-plus"></i>
    </a>
</main>
<footer class="footer-main section">
   
    <div class="container footer-content">
        <div class="section book">
            <h4 class="text-sm mb-1 t-center">Libro de reclamaciones</h4>
            <div class="center">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                        <path d="M500 3698 c0 -487 -3 -1175 -7 -1530 l-6 -646 74 -6 c472 -43 897 -188 1280 -438 188 -123 379 -285 516 -438 42 -47 80 -86 85 -88 4 -2 8 650 8 1450 l0 1453 -82 110 c-89 119 -331 368 -443 456 -406 317 -853 499 -1362 554 l-63 7 0 -884z" />
                        <path d="M4545 4573 c-441 -52 -840 -196 -1175 -423 -211 -144 -456 -376 -603 -571 l-87 -117 0 -1456 0 -1455 163 162 c161 162 285 265 447 369 364 237 786 385 1219 428 57 5 107 10 112 10 5 0 9 638 9 1530 l0 1530 -27 -1 c-16 -1 -41 -4 -58 -6z" />
                        <path d="M123 3862 l-123 -37 0 -1567 c0 -863 4 -1568 8 -1568 4 0 66 13 138 30 275 62 389 74 729 75 249 0 336 -4 440 -18 239 -34 476 -91 685 -166 46 -16 86 -28 88 -26 2 1 -38 39 -89 84 -431 381 -927 586 -1501 621 -119 7 -164 13 -183 26 -58 38 -55 -36 -55 1329 0 690 -3 1255 -7 1254 -5 0 -63 -17 -130 -37z" />
                        <path d="M4860 2636 l0 -1253 -23 -34 c-29 -43 -71 -58 -167 -58 -190 -2 -467 -51 -680 -121 -316 -103 -650 -301 -885 -524 l-80 -75 84 30 c228 81 470 140 726 175 182 26 637 26 815 1 101 -14 304 -53 448 -84 l22 -5 0 1565 0 1566 -112 36 c-61 19 -120 35 -130 35 -17 0 -18 -44 -18 -1254z" />
                    </g>
                </svg>
            </div>
        </div>
        <div class="section">
            <h4 class="title-3 mb-2">Politicas</h4>
            <ul class="text mb-1">
                <li>Terminos de condiciones</li>
            </ul>
        </div>
        <div class="section">
            <h4 class="title-3 mb-2">Informacion de la tienda</h4>
            <ul class="text">
                <li><i class="fas fa-phone mb-1"></i>  +51 927 298 219</li>
                <li><i class="fas fa-envelope mb-1"></i>  juegaya@gmail.com</li>
            </ul>
        </div>
    </div>

</footer>

@endsection


@section('css')
<link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
@endsection

@section('js')
<script src="{{asset('assets/js/home.js')}}"></script>
@endsection