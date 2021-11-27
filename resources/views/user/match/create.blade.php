@extends('templates.layout')

@section('content')

<main class="section container">
    <form action="{{route('match.store')}}" class="form" method="POST">
        @csrf
        <input type="hidden" name="latitude" id="latitude" required/>
        <input type="hidden" name="longitude" id="longitude" required/>
        <span class="close-form" id="close-form"></span>
        <header>
            <h2 class="title-2">Crear partido</h2>
        </header>
        <div class="form-group">
            <label for="date" class="title-3 mb-2">Fecha</label>
            <div class="input-container">
                <span class="input-icon">
                    <i class="fas fa-calendar-alt"></i>
                </span>
                <input type="date" placeholder="Fecha" class="input" name="date" id="date" required min="{{date('Y-m-d')}}" value="{{old('date')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="time" class="title-3 mb-2">Hora</label>
            <div class="input-container">
                <span class="input-icon">
                    <i class="fas fa-clock"></i>
                </span>
                <input type="time" placeholder="Hora" class="input" name="time" id="time"  min="{{date('H:i')}}" required value="{{old('time')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="players" class="title-3 mb-2">Deporte</label>
            <div class="input-container">
                <span class="input-icon">
                    <i class="far fa-futbol"></i>
                </span>
                {{Form::select('sport_id',$sports,old('sport_id'),array('class'=>'select','placeholder'=>'Seleccione un deporte','id'=>'sport','required'))}}
            </div>
        </div>
        <div class="form-group">
            <label for="players" class="title-3 mb-2">Jugadores</label>
            <div class="input-container">
                <span class="input-icon">
                    <i class="fas fa-users"></i>
                </span>
                <input type="number" placeholder="Maximo jugadores" class="input" name="max_participants" required min="1" value="{{old('max_participants')}}">
            </div>
        </div>

        <div class="form-group">
            <label for="players" class="title-3 mb-2">Distrito</label>
            <div class="input-container">
                <span class="input-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </span>
                {{Form::select('district_id',$districts,old('district_id'),array('class'=>'select','placeholder'=>'Seleccione distrito','id'=>'district','required'))}}
            </div>
            <div class="btn m-y {{$errors->first('latitude')?'btn-error':'btn-transparent'}}" id="btn-map"><i class="fas fa-map-marker-alt"></i> Activar mi ubicacion</div>

        </div>
        <div class="map-container m-y" id="map-container">
            <iframe id="map"width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?q=52.527995,13.302482&hl=es;z%3D14&amp&output=embed">
            </iframe>
        </div>

        <div class="btn-container column">
            <button type="submit" class="btn btn-primary">
                Crear
            </button>
            <a href="{{route('home')}}" class="btn btn-transparent link" id="btn-cancel">
                Cancelar
            </a>
        </div>
    </form>
</main>
@endsection


@section('css')
<link rel="stylesheet" href="{{asset('assets/css/nice-select2.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/match.css')}}">
@endsection

@section('js')
<script src="{{asset('assets/js/nice-select2.js')}}"></script>
<script src="{{asset('assets/js/form.js')}}"></script>
@endsection