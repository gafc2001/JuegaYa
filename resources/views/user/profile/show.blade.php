@extends('templates.layout')

@section('content')
@include('user.profile.header',['user' => $user])
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
            <p class="profile-value text">{{$user->profile()->getAge()}}</p>
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
    <div class="profile-item">
        <div class="profile-icon center">
            <i class="fas fa-tshirt"></i>
        </div>
        <div class="profile-values">
            <p class="profile-label text">Posicion adecuada</p>
            <p class="profile-value text">{{$user->profile()->preferred_position}}</p>
        </div>
    </div>
</main>

@endsection

@section('js')
<script src="{{secure_asset('assets/js/profile.js')}}"></script>
@endsection

@section('css')
<link rel="stylesheet" href="{{secure_asset('assets/css/profile.css')}}">
@endsection