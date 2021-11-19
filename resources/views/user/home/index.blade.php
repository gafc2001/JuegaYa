@extends('templates.layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
@endsection


@section('content')
<header class="section container m-y header-home">
    <h1 class="title-2">Partidos</h1>
    <div class="notification">
        <span class="num-noti t-center">2</span>
    </div>
</header>

<main class="section m-y container">
    <div class="matches">
        @foreach ($matches as $match)
        <div class="match">
            <a href="{{route('match.show',$match->id)}}" class="link">
            <header class="match-info">
                <div class="match-profile">
                    <img src="https://randomuser.me/api/portraits/men/43.jpg" alt="profile">
                </div>
                <p class="text">{{$match->host()->email}}</p>
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
                            <div class="match-status center">{{$match->status()}}<span class="match-clip"></span></div>
                        </div>
                    </div>

                </div>
                <div class="match-players match-item center">
                    <p class="text-small tc-primary">Jugadores</p>
                    <div class="match-values center text-small">
                        <span class="current-players">{{$match->countParticipants()}}</span>
                        <span class="match-polygon"></span>
                        <span class="max-players">{{$match->max_participants}}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <a href="{{route('match.create')}}" class="btn btn-primary btn-absolute">
        <i class="fas fa-plus"></i>
    </a>
</main>

@endsection