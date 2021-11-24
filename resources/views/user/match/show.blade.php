@extends('templates.layout')
@section('content')
<header class="section container match-header m-y">
    <div class="alert" id="alert">
        <i class="fas fa-info-circle"></i>
        <span>Mensaje</span>
    </div>
    <nav class="nav-match">
        <a href="{{route('home')}}">
            <div class="match-icon m-y">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.2541 4.24106C16.5522 4.53326 16.5793 4.99051 16.3354 5.31272L16.2541 5.40503L9.52658 12L16.2541 18.595C16.5522 18.8872 16.5793 19.3444 16.3354 19.6666L16.2541 19.7589C15.956 20.0511 15.4896 20.0777 15.161 19.8386L15.0668 19.7589L7.7459 12.582C7.44784 12.2898 7.42074 11.8325 7.66461 11.5103L7.7459 11.418L15.0668 4.24106C15.3947 3.91965 15.9262 3.91965 16.2541 4.24106Z" fill="#200E32" />
                </svg>
            </div>
        </a>
        <h1 class="m-y t-center title-2 match-title">Partido de futbol</h1>
        @if(auth()->id() == $match->host_user_id)
        <div class="requests">
            <div class="request-icon" id="request-icon">
                <i class="fas fa-bell"></i>
                <span class="count-requests center" id="count-requests">{{$match->participantsRequests()->count()}}</span>
            </div>
            <div class="request-container">                
                <ul class="request-list" id="request-list">
                    @if($match->participantsRequests()->get()->isEmpty())
                        No hay notificaciones
                    @else
                        @foreach ($match->participantsRequests()->get() as $participant)
                        <li class="request-item m-y">
                            <a href="{{route('profile.show',$participant->user_id)}}">
                                <header class="request-header mb-1 link">
                                    <div class="request-player">
                                        <img src="{{asset('assets/img/profile/'.$participant->user()->getProfilePicture())}}" alt="">
                                    </div>
                                    <div class="request-name">{{$participant->user()->profile()->getFullName()}}</div>
                                </header>
                            </a>
                            <div class="btn-container">
                                <div class="btn btn-sm btn-primary accept-request" data-id="{{$participant->id}}">Aceptar</div>
                                <div class="btn btn-sm btn-danger deny-request"  data-id="{{$participant->id}}">Rechazar</div>
                            </div>
                        </li>    
                        @endforeach
                    @endif
                    
                </ul>
            </div>
        </div>
        @endif
    </nav>
    <div class="match-details text">
        <h3>Organizador</h3>

        <div class="host match-player m-y">
            @if(!is_null($match->host()->profile()))
            <img src="{{asset('assets/img/profile/'.$match->host()->profile()->profile_picture)}}" alt="profile">
                <span>{{$match->host()->profile()->getFullName()}}</span>
            @else
                <img src="{{ asset('assets/img/profile/default-profile.png')}}" alt="profile">
                <span>{{$match->host()->email}}</span>
            @endif
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
        <div class="match-map m-y" id="match-map">
            <iframe id="map"width="100%" height="150" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?q={{$match->latitude}},{{$match->longitude}}&hl=es;z%3D14&amp&output=embed">
            </iframe>
        </div>
    </div>
</header>
<main class="section container">
    <header class="match-player-header">
        <h2 class="text m-y">Jugadores del partido</h2>
        <div class="match-values center text-small">
            <span class="current-players" id="current-players">{{$match->participantsAcepted()->count()}}</span>
            <span class="match-polygon"></span>
            <span class="max-players">{{$match->max_participants}}</span>
        </div>
    </header>
    <div class="match-players" id="match-players">
        @foreach ($match->participantsAcepted()->get() as $participant)
            <a href="{{route('profile.show',$participant->user_id)}}"" class="link">
                <div class="match-player">
                    <img src="{{asset('assets/img/profile/'.$participant->user()->getProfilePicture())}}" alt="">
                </div>
            </a>
        @endforeach
    </div>
</main>


@if($match->host_user_id != auth()->id())





<section class="section container m-y">
    {{--Show button request if not host--}}    
    @if(auth()->user()->participation($match->id) == null)
        <form action="{{route('match.update',$match->id)}}"  role="form" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="match_id" value="{{$match->id}}">
            <input type="hidden" name="status" value="PENDIENTE">
            <button class="btn btn-primary" type="submit">
                Solicitar unirse
            </button>
        </form>
    @else
        @switch(auth()->user()->participation($match->id)->status)
            @case("PENDIENTE")
                <div class="message warning"><i class="fas fa-hourglass-start"></i> PENDIENTE</div>
                @break
            @case("ACEPTADO")
                <div class="message success"><i class="fas fa-check-circle"></i> ACEPTADO</div>
                @break
            @case("RECHAZADO")
                <div class="message error"><i class="fas fa-times-circle"></i> RECHAZADO</div>
                @break
        @endswitch
        
    
    
    @endif
</section>
@endif

@endsection 
{{--End section content--}}

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/match.css')}}">
@endsection

@section('js')
<script>
    let csrf_token = "{{csrf_token()}}"
    let url = "{{route('match.status',$match->id)}}"
</script>
<script src="{{asset('assets/js/match.js')}}"></script>
@endsection