@extends('templates.layout')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/quiz.css')}}">
@endsection
@section('content')
<main class="content">
    @foreach ($questions as $question)
    <section class="section container question-container" id="answer{{$loop->index}}">
        <header class="header-quiz">
            <h1 class="title-2">{{$question->question}}</h1>
            <span class="header-desc">Elige una opcion </span>
        </header>
        <div class="mb-2">
            <ul class="answers">
                @switch($question->type_question)
                    @case("SPORT")
                        @foreach ($sports as $sport )
                        <li class="answer">{{$sport->sport}}</li>
                        @endforeach
                        @break
                    @case("POSITION")
                        <li class="answer">Delantero</li>
                        <li class="answer">Defensa</li>
                        <li class="answer">Arquero</li>
                        <li class="answer">Volante</li>
                        @break
                    @case("TIME_PLAYING")
                        <li class="answer">Mas 1 año</li>
                        <li class="answer">Mas 5 años</li>
                        <li class="answer">Mas 10 años</li>
                        <li class="answer">Mas 20 años</li>
                        @break
                    @case("HOBBIE")
                        @foreach ($hobbies as $hobbie )
                        <li class="answer">{{$hobbie->hobbie}}</li>
                        @endforeach
                        @break
                    @case("GENDER")
                        <li class="answer">Masculino</li>
                        <li class="answer">Femenino</li>
                        <li class="answer">Prefiero no decirlo</li>
                        @break
                    @case("AGE")
                        <li class="answer">Mas 10 años</li>
                        <li class="answer">Mas 15 años</li>
                        <li class="answer">Mas 20 años</li>
                        <li class="answer">Mas 30 años</li>
                        <li class="answer">Mas 40 años</li>
                        @break
                @endswitch
            </ul>
        </div>
        <div class="btn-container column ">
            @if($loop->last)
            <a href="{{route('index')}}" class="btn btn-primary">Terminar encuesta</a>
            @else
            <a href="#answer{{$loop->index+1}}" class="btn btn-primary">Siguiente</a>
            @endif
        </div>
    </section>
    @endforeach
</main>
@endsection

@section('js')
<script src="{{asset('assets/js/quiz.js')}}"></script>
@endsection