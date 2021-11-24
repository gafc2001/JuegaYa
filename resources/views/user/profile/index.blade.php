@extends('templates.layout')

@section('content')
@include('user.profile.header',['user' => auth()->user()])
<main class="profile-information container">
    <div class="profile-item">
        <div class="profile-icon center">
            <i class="fas fa-user"></i>
        </div>
        <div class="profile-values">
            <p class="profile-label text">Nombre</p>
            <p class="profile-value text">{{auth()->user()->profile()->getFullName()}}</p>
        </div>
    </div>
    <div class="profile-item">
        <div class="profile-icon center">
            <i class="fas fa-sort-numeric-up-alt"></i>
        </div>
        <div class="profile-values">
            <p class="profile-label text">Edad</p>
            <p class="profile-value text">{{auth()->user()->profile()->age}}</p>
        </div>
    </div>
    <div class="profile-item">
        <div class="profile-icon center">
            <i class="fas fa-ruler-vertical"></i>
        </div>
        <div class="profile-values">
            <p class="profile-label text">Altura</p>
            <p class="profile-value text">{{auth()->user()->profile()->high}} metros</p>
        </div>
    </div>
    <div class="profile-item">
        <div class="profile-icon center">
            <i class="fas fa-clock"></i>
        </div>
        <div class="profile-values">
            <p class="profile-label text">Tiempo jugando</p>
            <p class="profile-value text">{{auth()->user()->profile()->getTimePlaying()}}</p>
        </div>
    </div>
    <div class="profile-item">
        <div class="profile-icon center">
            <i class="far fa-futbol"></i>
        </div>
        <div class="profile-values">
            <p class="profile-label text">Deporte</p>
            <p class="profile-value text">{{auth()->user()->profile()->sport()}}</p>
        </div>
    </div>
    <div class="profile-item">
        <div class="profile-icon center">
            <i class="fas fa-venus-mars"></i>
        </div>
        <div class="profile-values">
            <p class="profile-label text">Distrito</p>
            <p class="profile-value text">{{auth()->user()->profile()->district()}}</p>
        </div>
    </div>
    <div class="profile-item">
        <div class="profile-icon center">
            <i class="fas fa-house-user"></i>
        </div>
        <div class="profile-values">
            <p class="profile-label text">Genero</p>
            <p class="profile-value text">{{auth()->user()->profile()->gender}}</p>
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