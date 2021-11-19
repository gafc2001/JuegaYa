@extends('templates.layout')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/match.css')}}">
@endsection

@section('content')
<header class="section container match-header m-y">
    <nav class="nav-match">
        <a href="{{route('home')}}">
            <div class="match-icon m-y">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.2541 4.24106C16.5522 4.53326 16.5793 4.99051 16.3354 5.31272L16.2541 5.40503L9.52658 12L16.2541 18.595C16.5522 18.8872 16.5793 19.3444 16.3354 19.6666L16.2541 19.7589C15.956 20.0511 15.4896 20.0777 15.161 19.8386L15.0668 19.7589L7.7459 12.582C7.44784 12.2898 7.42074 11.8325 7.66461 11.5103L7.7459 11.418L15.0668 4.24106C15.3947 3.91965 15.9262 3.91965 16.2541 4.24106Z" fill="#200E32" />
                </svg>
            </div>
        </a>
        <h1 class="m-y t-center title-2 match-title">Partido de futbol</h1>
    </nav>
    <div class="match-details text">
        <h3>Organizador</h3>

        <div class="host match-player m-y">
            <img src="{{ asset('assets/img/profile/default-profile.png')}}" alt="">
            <span>{{$match->host()->email}}</span>
        </div>
        <!-- <div class="match-status in-game text-small mb-2">En juego</div> -->
        <!-- <div class="match-status pregame text-small mb-2">Por comenzar</div> -->
        <div class="match-status ended text-small mb-2">{{$match->status()}}</div>
        <div class="date match-detail">
            <i class="fas fa-calendar-alt"></i>
            <span>{{$match->date()}}</span>
        </div>
        <div class="time match-detail">
            <i class="fas fa-clock"></i>
            <span>{{$match->time()}}</span>
        </div>
        <div class="place match-detail">
            <i class="fas fa-map-marker-alt"></i>
            <span>{{$match->district()}}</span>
        </div>
    </div>
</header>
<main class="section container">
    <header class="match-player-header">
        <h2 class="text m-y">Jugadores del partido</h2>
        <div class="match-values center text-small">
            <span class="current-players">{{$match->countParticipants()}}</span>
            <span class="match-polygon"></span>
            <span class="max-players">{{$match->max_participants}}</span>
        </div>
    </header>
    <div class="match-players">
        @foreach ($match->participants as $participant)
            <div class="match-player">
                <img src="{{asset('assets/img/profile/default-profile.png')}}" alt="">
            </div>
        @endforeach
        

    </div>
</main>

@if(!auth()->id())
<section class="section container m-y">
    <div class="btn btn-primary">
        Solicitar unirse
    </div>
</section>
@endif
@endsection