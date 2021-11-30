@extends('templates.layout')

@section('css')
<link rel="stylesheet" href="{{secure_asset('assets/css/quiz.css')}}">
@endsection
@section('content')
<main class="content">
    @foreach ($questions as $question)
    <section class="section container question-container" data-type="{{$question->type_question}}"  id="answer{{$loop->index}}">
        <header class="header-quiz">
            <h1 class="title-2">{{$question->question}}</h1>
            <span class="header-desc">Elige una opcion </span>
        </header>
        <div class="mb-2">
            <ul class="answers">
                @switch($question->type_question)
                    @case("SPORT")
                        @foreach ($sports as $sport )
                        <li class="answer enum" data-id="{{$sport->id}}">{{$sport->sport}}</li>
                        @endforeach
                        @break
                    @case("POSITION")
                        <li class="answer enum">Delantero</li>
                        <li class="answer enum">Defensa</li>
                        <li class="answer enum">Arquero</li>
                        <li class="answer enum">Volante</li>
                        @break
                    @case("TIME_PLAYING")
                        <li class="answer" data-id="time-playing">
                            <div class="form-group">
                                <div class="input-container">
                                    <span class="input-icon">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                    <input type="date" class="input date" id="time-playing">
                                </div>
                            </div>
                        </li>
                        @break
                    @case("HOBBIE")
                        @foreach ($hobbies as $hobbie )
                        <li class="answer enum" data-id="{{$hobbie->id}}">{{$hobbie->hobbie}}</li>
                        @endforeach
                        @break
                    @case("GENDER")
                        <li class="answer enum">Hombre</li>
                        <li class="answer enum">Mujer</li>
                        <li class="answer enum">Prefiero no decirlo</li>
                        @break
                    @case("AGE")
                        <li class="answer" data-id="age">
                            <div class="form-group">
                                <div class="input-container">
                                    <span class="input-icon">
                                        <i class="fas fa-sort-numeric-up-alt"></i>
                                    </span>
                                    <input type="date" class="input date" id="age">
                                </div>
                            </div>
                        </li>
                        @break
                @endswitch
            </ul>
        </div>
        <div class="btn-container column ">
            @if($loop->last)
            <div id="btn-send" class="btn btn-primary">Terminar encuesta</div>
            @else
            <a href="#answer{{$loop->index+1}}" class="btn btn-primary">Siguiente</a>
            @endif
        </div>
    </section>
    @endforeach
</main>
@endsection

@section('js')
<script>
    let csrf_token = "{{csrf_token()}}"
    let url = "{{route('quiz.store')}}";
</script>
<script src="{{secure_asset('assets/js/quiz.js')}}"></script>
@endsection