@extends('templates.layout')


@section('content')      
    <section class="section">
        <div class="auth-img container">
            <div class="img-absolute">
                <img src="{{route('image',)" alt="messi">
            </div>
        </div>
    </section>
    <section class="section container s">
        <h1 class="title m-y center">
            Juega Ya
            <img src="{{asset('favicon.ico')}}" width="60" alt="ball">
        </h1>
        <p class="text-light m-y">JUEGA YA es un aplicativo digital que te ayudara a organizar encuentros deportivos con tus
        amigos o personas nuevas que quieran practicar el mismo deporte.</p>
        <div class="btn-container m-y">
            <div class="btn btn-primary" id="sign-in">
                Ingresar
            </div>
            <div class="btn btn-transparent" id="sign-up">
                Registrarse
            </div>
        </div>
    </section>
    
@endsection

@section('form')
    @include('auth.signin')
    @include('auth.signup')
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">
@endsection

@section('js')
<script src="{{asset('assets/js/signin.js')}}"></script>
<script src="{{asset('assets/js/signup.js')}}"></script>
@endsection