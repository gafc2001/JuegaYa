@extends('templates.layout')


@section('content')
<section class="section">
    <div class="auth-img container">
        <div class="img-absolute">
            <img src="{{asset('assets/img/player.png')}}" alt="messi">
        </div>
    </div>
    </div>
</section>
<section class="section container">
    <h1 class="title m-y">
        Juega Ya
        <img src="{{asset('assets/img/categoria/soccer.png')}}" width="30" alt="ball">
    </h1>
    <p class="text-light m-y">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium tenetur unde
        debitis deleniti, dolor
        voluptatibus sapiente! In accusamus inventore veniam quam, sed doloremque deserunt unde? Ducimus quis
        praesentium nesciunt illo.</p>
    <div class="btn-container m-y">
        <div class="btn btn-primary" id="sign-in">
            Ingresar
        </div>
        <div class="btn btn-transparent" id="sign-up">
            Registrarse
        </div>
    </div>
</section>

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