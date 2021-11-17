@extends('templates.layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/quiz.css')}}">
@endsection
@section('content')
<main class="content">
    <section class="section container">
        <header class="header-quiz">
            <h1 class="title-2">Cual es tu deporte favorito?</h1>
            <span class="header-desc">Elige una opcion</span>
        </header>
        <div>
            <ul class="answers">
                <li class="answer selected">Futbol</li>
                <li class="answer">VoleyBall</li>
                <li class="answer">Basketball</li>
                <li class="answer">Tenis</li>
            </ul>
        </div>
        <div class="container">

        </div>
    </section>
    <section class="section container">
        <div class="btn-container column">
            <div class="btn btn-primary">Siguiente</div>
            <div class="btn btn-transparent">Saltar</div>
        </div>
    </section>
</main>
@endsection