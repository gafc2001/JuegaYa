@extends('templates.layout')

@section('content')

<main class="section container">
    <form action="{{route('profile.store')}}" class="form" method="POST" enctype="multipart/form-data">
        @csrf
        <span class="close-form" id="close-form"></span>
        <header>
            <h2 class="title-2">Informacion de perfil</h2>
        </header>
        <div class="form-row">
            <div class="form-group">
                <label for="first_name" class="title-3 mb-2">Nombres</label>
                <div class="input-container">
                    <span class="input-icon">
                        <i class="fas fa-address-card"></i>
                    </span>
                    <input type="text" placeholder="Tus nombres" class="input" name="first_name" id="first_name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="last_name" class="title-3 mb-2">Apellidos</label>
                <div class="input-container">
                    <span class="input-icon">
                        <i class="fas fa-address-card"></i>
                    </span>
                    <input type="text" placeholder="Tus apellidos" class="input" name="last_name" id="last_name" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="age" class="title-3 mb-2">Edad</label>
                <div class="input-container">
                    <span class="input-icon">
                        <i class="fas fa-sort-numeric-up-alt"></i>
                    </span>
                    <input type="date" placeholder="Tu edad" class="input" name="age" id="age" required>
                </div>
            </div>
            <div class="form-group">
                <label for="high" class="title-3 mb-2">Altura</label>
                <div class="input-container">
                    <span class="input-icon">
                        <i class="fas fa-ruler-vertical"></i>
                    </span>
                    <input type="text" placeholder="Tu altura" class="input" name="high" id="high" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="time_playing" class="title-3 mb-2">Tiempo jugando</label>
                <div class="input-container">
                    <span class="input-icon">
                        <i class="fas fa-clock"></i>
                    </span>
                    <input type="date" placeholder="Tiempo jugando" class="input" name="time_playing" id="time_playing" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="players" class="title-3 mb-2">Distrito</label>
                <div class="input-container">
                    <span class="input-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                    {{Form::select('district_id',$districts,$profile->district_id,array('class'=>'select','placeholder'=>'Seleccione distrito','id'=>'district','required'))}}
                </div>
            </div>
        </div>
            
        <div class="form-row">
            <div class="form-group">
                <label for="favorite_sport" class="title-3 mb-2">Deporte Favorito</label>
                <div class="input-container">
                    <span class="input-icon">
                        <i class="far fa-futbol"></i>
                    </span>
                    {{Form::select('sport_id',$sports,$profile->sport_id,array('class'=>'select','placeholder'=>'Seleccione su deporte favorito','id'=>'sport','required'))}}
                </div>
            </div>
            <div class="form-group">
                <label for="date" class="title-3 mb-2">Genero</label>
                <div class="input-container">
                    <span class="input-icon">
                        <i class="fas fa-venus-mars"></i>
                    </span>
                    {{Form::select('gender',$genders,$profile->gender,array('class'=>'select','placeholder'=>'Seleccione su genero','id'=>'gender','required'))}}
                </div>
            </div>
        </div>
        <div class="form-row column m-y">
            <div class="form-group">
                <label for="profile_picture" class="title-3 mb-2 profile-picture">
                    <i class="fas fa-camera"></i> 
                    <span>Imagen de Perfil</span>
                </label>
                <input type="file" name="profile_picture" id="profile_picture">
            </div>
            <div class="current-picture">
                <img src="{{route('image','defaultprofile.png')}}" alt="profile" id="current-img-picture" required>
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
    </form>
</main>
@endsection


@section('css')
<link rel="stylesheet" href="{{secure_asset('assets/css/nice-select2.css')}}">
<link rel="stylesheet" href="{{secure_asset('assets/css/profile.css')}}">
@endsection

@section('js')
<script src="{{secure_asset('assets/js/nice-select2.js')}}"></script>
<script src="{{secure_asset('assets/js/profile.js')}}"></script>
@endsection