@extends('templates.layout')

@section('content')
<header class="profile-header container">
    <div class="profile-image center">
        <div class="img-container">
            <img src="{{asset('assets/img/profile/'.$user->profile()->profile_picture)}}" alt="profile">
        </div>
    </div>
    <div class="t-center m-y">
        <h3 class="user-name title-3">{{$user->profile()->getFullName()}}</h3>
        <p class="user-desc text-light">Coding and playing 🔥</p>
    </div>
    <nav class="btn-container btn-profile">
        <a href="{{route('profile.index')}}" class="btn btn-secondary">Mi perfil</a>
        <a href="#" class="btn btn-transparent">Actividad</a>
        <a href="{{route('profile.comment',5)}}" class="btn btn-transparent">Comentarios</a>
    </nav>
</header>
<main class="profile-information container">
    <div class="profile-item">
        <div class="profile-icon center">
            <i class="fas fa-user"></i>
        </div>
        <div class="profile-values">
            <p class="profile-label text">Nombre</p>
            <p class="profile-value text">{{$user->profile()->getFullName()}}</p>
        </div>
    </div>
    <div class="profile-item">
        <div class="profile-icon center">
            <i class="fas fa-sort-numeric-up-alt"></i>
        </div>
        <div class="profile-values">
            <p class="profile-label text">Edad</p>
            <p class="profile-value text">{{$user->profile()->age}}</p>
        </div>
    </div>
    <div class="profile-item">
        <div class="profile-icon center">
            <i class="fas fa-ruler-vertical"></i>
        </div>
        <div class="profile-values">
            <p class="profile-label text">Altura</p>
            <p class="profile-value text">{{$user->profile()->high}} metros</p>
        </div>
    </div>
    <div class="profile-item">
        <div class="profile-icon center">
            <i class="fas fa-clock"></i>
        </div>
        <div class="profile-values">
            <p class="profile-label text">Tiempo jugando</p>
            <p class="profile-value text">{{$user->profile()->getTimePlaying()}}</p>
        </div>
    </div>
    <div class="profile-item">
        <div class="profile-icon center">
            <i class="far fa-futbol"></i>
        </div>
        <div class="profile-values">
            <p class="profile-label text">Deporte</p>
            <p class="profile-value text">{{$user->profile()->favorite_sport}}</p>
        </div>
    </div>
    <div class="profile-item">
        <div class="profile-icon center">
            <i class="fas fa-venus-mars"></i>
        </div>
        <div class="profile-values">
            <p class="profile-label text">Genero</p>
            <p class="profile-value text">{{$user->profile()->gender}}</p>
        </div>
    </div>
</main>

@endsection

@section('js')
<script src="{{asset('assets/js/profile.js')}}"></script>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
@endsection