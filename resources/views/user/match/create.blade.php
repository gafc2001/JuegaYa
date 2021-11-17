@extends('templates.layout')

@section('content')

<main class="section container">
<form action="{{route('match.store')}}" class="form" method="POST">
    @csrf
    <input type="hidden" name="latitude" id="latitude" value=""/>
    <input type="hidden" name="longitude" id="longitude" value=""/>
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
            <input type="date" placeholder="Fecha" class="input" name="date" id="date" required>
        </div>
    </div>
    <div class="form-group">
        <label for="time" class="title-3 mb-2">Hora</label>
        <div class="input-container">
            <span class="input-icon">
                <i class="fas fa-clock"></i>
            </span>
            <input type="time" placeholder="Hora" class="input" name="time" id="time" required>
        </div>
    </div>
    <div class="form-group">
        <label for="players" class="title-3 mb-2">Distrito</label>
        <div class="input-container">
            <span class="input-icon">
                <i class="fas fa-users"></i>
            </span>
            <input type="number" placeholder="Maximo jugadores" class="input" required>
        </div>
    </div>
    <div class="form-group">
        <label for="players" class="title-3 mb-2">Jugadores</label>
        <div class="input-container">
            <span class="input-icon">
                <i class="fas fa-users"></i>
            </span>
            <input type="number" placeholder="Maximo jugadores" class="input" required>
        </div>
    </div>
    
    <div class="btn-container column">
        <button type="submit" class="btn btn-primary">
            Crear
        </button>
        <div class="btn btn-transparent" id="btn-cancel">
            Cancelar
        </div>
    </div>
    <div class="container section">
    <iframe src = "https://maps.google.com/maps?q=10.305385,77.923029&hl=es;z=14&amp;output=embed"></iframe>
    </div>
</form>
</main>
@endsection

@section('js')
<script src="{{asset('assets/js/location.js')}}"></script>
@endsection