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


<div class="form-container {{!$errors->isEmpty()?'active':''}}" id="form-signin">
    <form action="{{route('signin')}}" class="form" method="POST">
        @csrf
        <span class="close-form" id="close-form"></span>
        <header>
            <h2 class="title-2">Bienvenido</h2>
        </header>
        <div class="form-group">
            <div class="input-container">
                <span class="input-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5253 3.00005L7.45618 3C4.28665 3 2 5.56151 2 8.85897V15.141C2 18.4385 4.28665 21 7.45618 21H16.5168C18.0392 20.9829 19.4802 20.3421 20.5126 19.2266C21.5449 18.111 22.0786 16.6183 21.9893 15.0959L21.9906 8.85897C22.0786 7.38171 21.5449 5.88895 20.5126 4.77344C19.4802 3.65794 18.0392 3.01705 16.5253 3.00005ZM7.45618 4.52843L16.5084 4.52838C17.6073 4.54072 18.6532 5.00592 19.4026 5.81562C20.152 6.62533 20.5393 7.70887 20.4745 8.81389L20.4732 15.141C20.5393 16.2911 20.152 17.3747 19.4026 18.1844C18.6532 18.9941 17.6073 19.4593 16.5084 19.4716L7.45618 19.4716C5.16279 19.4716 3.51744 17.6284 3.51744 15.141V8.85897C3.51744 6.37155 5.16279 4.52843 7.45618 4.52843ZM18.024 8.63837C17.7622 8.30886 17.2847 8.25555 16.9576 8.5193L12.8583 11.8242L12.7408 11.9068C12.2575 12.2095 11.6228 12.1816 11.1598 11.8181L7.03057 8.51731L6.93763 8.4536C6.61736 8.26727 6.20141 8.34031 5.96461 8.64086C5.70412 8.97146 5.75904 9.45216 6.08726 9.71453L10.2217 13.0195L10.383 13.1375C11.4231 13.8459 12.8013 13.8067 13.7988 13.0236L17.9058 9.71255L17.9882 9.63551C18.24 9.36261 18.2621 8.93792 18.024 8.63837Z" fill="#200E32" />
                    </svg>
                </span>
                <input type="text" placeholder="Correo" class="input" name="email">
            </div>
        </div>
        <div class="form-group">
            <div class="input-container">
                <span class="input-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3344 2.0002H7.66543C4.26785 2.0002 2.00043 4.43279 2.00043 7.9162V16.0842C2.00043 19.5709 4.2618 22.0002 7.66543 22.0002H16.3334C19.738 22.0002 22.0004 19.5709 22.0004 16.0842V7.9162C22.0004 4.4297 19.7382 2.0002 16.3344 2.0002ZM7.66543 3.5002H16.3344C18.8849 3.5002 20.5004 5.23516 20.5004 7.9162V16.0842C20.5004 18.7654 18.8848 20.5002 16.3334 20.5002H7.66543C5.11519 20.5002 3.50043 18.7655 3.50043 16.0842V7.9162C3.50043 5.23857 5.12077 3.5002 7.66543 3.5002ZM8.84033 9.3982C7.40418 9.3982 6.23933 10.5639 6.23933 12.0002C6.23933 13.4365 7.40418 14.6022 8.84033 14.6022C10.0165 14.6022 11.0105 13.8213 11.3325 12.7502L13.4316 12.7501V13.8517L13.4385 13.9535C13.4881 14.3195 13.8019 14.6017 14.1816 14.6017C14.5958 14.6017 14.9316 14.2659 14.9316 13.8517V12.75L16.26 12.75L16.2603 13.8522L16.2672 13.954C16.3168 14.32 16.6306 14.6022 17.0103 14.6022C17.4245 14.6022 17.7603 14.2664 17.7603 13.8522V12.0002L17.7535 11.8984C17.7038 11.5324 17.39 11.2502 17.0103 11.2502H14.2093C14.2001 11.2499 14.1909 11.2497 14.1816 11.2497C14.1724 11.2497 14.1632 11.2499 14.154 11.2502H11.3325C11.0105 10.179 10.0165 9.3982 8.84033 9.3982ZM8.84033 10.8982C9.44871 10.8982 9.94233 11.392 9.94233 12.0002C9.94233 12.6084 9.44871 13.1022 8.84033 13.1022C8.23286 13.1022 7.73933 12.6083 7.73933 12.0002C7.73933 11.3921 8.23286 10.8982 8.84033 10.8982Z" fill="#200E32" />
                    </svg>
                </span>
                <input type="password" placeholder="Contraseña" class="input password" name="password" id="password">
                <span class="input-icon show-password">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.4177 3.71619C20.1248 3.42794 19.65 3.42794 19.3571 3.71619L17.2693 5.77086C15.6565 4.6629 13.8555 4.07543 12 4.07543C9.94315 4.07543 7.94745 4.79542 6.21856 6.14201C4.51054 7.46402 3.08697 9.37061 2.06144 11.7081C1.97974 11.8943 1.97951 12.1054 2.06081 12.2918C2.94643 14.3222 4.13598 16.0255 5.55444 17.2999L3.58307 19.24L3.51045 19.3228C3.2926 19.6117 3.3168 20.0218 3.58307 20.2838C3.87596 20.5721 4.35084 20.5721 4.64373 20.2838L20.4177 4.76002L20.4903 4.67724C20.7082 4.38828 20.684 3.97823 20.4177 3.71619ZM6.61636 16.2548L8.75422 14.1508C8.32259 13.5256 8.086 12.785 8.086 12.0012C8.086 9.86842 9.83371 8.1473 12 8.1473C12.7921 8.1473 13.5527 8.38178 14.1867 8.80457L16.1892 6.83382C14.8815 5.99055 13.4565 5.55163 12 5.55163C10.2903 5.55163 8.61992 6.15424 7.14764 7.30096C5.73781 8.39217 4.52945 9.96072 3.61706 11.9004L3.5704 12.0014L3.61575 12.1003C4.40872 13.7948 5.43049 15.2038 6.61636 16.2548ZM13.0935 9.8804C12.7618 9.71412 12.3876 9.6235 12 9.6235C10.6624 9.6235 9.586 10.6835 9.586 12.0012C9.586 12.385 9.67671 12.7495 9.8468 13.0756L13.0935 9.8804ZM15.1366 11.8158L15.238 11.8269C15.6456 11.8991 15.9167 12.2828 15.8434 12.684C15.556 14.2567 14.2992 15.496 12.7022 15.7813C12.2946 15.8541 11.9042 15.588 11.8303 15.1869C11.7563 14.7858 12.0267 14.4016 12.4342 14.3288C13.4152 14.1536 14.1904 13.3892 14.367 12.4227C14.4343 12.055 14.7675 11.8002 15.1366 11.8158ZM18.997 8.31439C19.3279 8.06924 19.7981 8.13452 20.0472 8.46021C20.773 9.40914 21.4073 10.4985 21.9384 11.7072C22.0205 11.894 22.0205 12.1059 21.9386 12.2927C19.8613 17.0289 16.1345 19.9245 12 19.9245C11.0588 19.9245 10.1275 19.7747 9.23057 19.4801C8.83766 19.351 8.62544 18.9329 8.75657 18.5463C8.8877 18.1596 9.31252 17.9507 9.70543 18.0798C10.4497 18.3242 11.2207 18.4483 12 18.4483C15.3046 18.4483 18.381 16.1864 20.2727 12.3298L20.4284 12.0014L20.3755 11.8846C19.9948 11.0784 19.5645 10.339 19.0898 9.67414L18.8488 9.34799C18.5997 9.02231 18.666 8.55955 18.997 8.31439Z" fill="#200E32" />
                    </svg>
                </span>
            </div>
            @if($errors->any())
                @foreach ($errors->all() as $error)
                <span class="error t-center">{{$error}}</span>
                @endforeach
            @endif
        </div>

        <button class="btn btn-primary btn-disabled btn-submit" disabled type="submit">
            Ingresar
        </button>
        <div class="form-group create-account">
            <span>No tienes una cuenta? <a href="#">Registrate aqui</a> </span>
        </div>
    </form>
</div>
<div class="form-container active" id="form-signup">
    <form action="{{route('signup')}}" class="form" method="POST">
        @csrf
        <span class="close-form" id="close-form"></span>
        <header>
            <h2 class="title-2">Bienvenido</h2>
        </header>
        <div class="form-group">
            <div class="input-container">
                <span class="input-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5253 3.00005L7.45618 3C4.28665 3 2 5.56151 2 8.85897V15.141C2 18.4385 4.28665 21 7.45618 21H16.5168C18.0392 20.9829 19.4802 20.3421 20.5126 19.2266C21.5449 18.111 22.0786 16.6183 21.9893 15.0959L21.9906 8.85897C22.0786 7.38171 21.5449 5.88895 20.5126 4.77344C19.4802 3.65794 18.0392 3.01705 16.5253 3.00005ZM7.45618 4.52843L16.5084 4.52838C17.6073 4.54072 18.6532 5.00592 19.4026 5.81562C20.152 6.62533 20.5393 7.70887 20.4745 8.81389L20.4732 15.141C20.5393 16.2911 20.152 17.3747 19.4026 18.1844C18.6532 18.9941 17.6073 19.4593 16.5084 19.4716L7.45618 19.4716C5.16279 19.4716 3.51744 17.6284 3.51744 15.141V8.85897C3.51744 6.37155 5.16279 4.52843 7.45618 4.52843ZM18.024 8.63837C17.7622 8.30886 17.2847 8.25555 16.9576 8.5193L12.8583 11.8242L12.7408 11.9068C12.2575 12.2095 11.6228 12.1816 11.1598 11.8181L7.03057 8.51731L6.93763 8.4536C6.61736 8.26727 6.20141 8.34031 5.96461 8.64086C5.70412 8.97146 5.75904 9.45216 6.08726 9.71453L10.2217 13.0195L10.383 13.1375C11.4231 13.8459 12.8013 13.8067 13.7988 13.0236L17.9058 9.71255L17.9882 9.63551C18.24 9.36261 18.2621 8.93792 18.024 8.63837Z" fill="#200E32" />
                    </svg>
                </span>
                <input type="text" placeholder="Correo" class="input" name="email">
            </div>
            
        </div>
        <div class="form-group">
            <div class="input-container password-container">
                <span class="input-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3344 2.0002H7.66543C4.26785 2.0002 2.00043 4.43279 2.00043 7.9162V16.0842C2.00043 19.5709 4.2618 22.0002 7.66543 22.0002H16.3334C19.738 22.0002 22.0004 19.5709 22.0004 16.0842V7.9162C22.0004 4.4297 19.7382 2.0002 16.3344 2.0002ZM7.66543 3.5002H16.3344C18.8849 3.5002 20.5004 5.23516 20.5004 7.9162V16.0842C20.5004 18.7654 18.8848 20.5002 16.3334 20.5002H7.66543C5.11519 20.5002 3.50043 18.7655 3.50043 16.0842V7.9162C3.50043 5.23857 5.12077 3.5002 7.66543 3.5002ZM8.84033 9.3982C7.40418 9.3982 6.23933 10.5639 6.23933 12.0002C6.23933 13.4365 7.40418 14.6022 8.84033 14.6022C10.0165 14.6022 11.0105 13.8213 11.3325 12.7502L13.4316 12.7501V13.8517L13.4385 13.9535C13.4881 14.3195 13.8019 14.6017 14.1816 14.6017C14.5958 14.6017 14.9316 14.2659 14.9316 13.8517V12.75L16.26 12.75L16.2603 13.8522L16.2672 13.954C16.3168 14.32 16.6306 14.6022 17.0103 14.6022C17.4245 14.6022 17.7603 14.2664 17.7603 13.8522V12.0002L17.7535 11.8984C17.7038 11.5324 17.39 11.2502 17.0103 11.2502H14.2093C14.2001 11.2499 14.1909 11.2497 14.1816 11.2497C14.1724 11.2497 14.1632 11.2499 14.154 11.2502H11.3325C11.0105 10.179 10.0165 9.3982 8.84033 9.3982ZM8.84033 10.8982C9.44871 10.8982 9.94233 11.392 9.94233 12.0002C9.94233 12.6084 9.44871 13.1022 8.84033 13.1022C8.23286 13.1022 7.73933 12.6083 7.73933 12.0002C7.73933 11.3921 8.23286 10.8982 8.84033 10.8982Z" fill="#200E32" />
                    </svg>
                </span>
                <input type="password" placeholder="Contraseña" class="input password" name="password" id="signup-password">
                <span class="input-icon show-password">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.4177 3.71619C20.1248 3.42794 19.65 3.42794 19.3571 3.71619L17.2693 5.77086C15.6565 4.6629 13.8555 4.07543 12 4.07543C9.94315 4.07543 7.94745 4.79542 6.21856 6.14201C4.51054 7.46402 3.08697 9.37061 2.06144 11.7081C1.97974 11.8943 1.97951 12.1054 2.06081 12.2918C2.94643 14.3222 4.13598 16.0255 5.55444 17.2999L3.58307 19.24L3.51045 19.3228C3.2926 19.6117 3.3168 20.0218 3.58307 20.2838C3.87596 20.5721 4.35084 20.5721 4.64373 20.2838L20.4177 4.76002L20.4903 4.67724C20.7082 4.38828 20.684 3.97823 20.4177 3.71619ZM6.61636 16.2548L8.75422 14.1508C8.32259 13.5256 8.086 12.785 8.086 12.0012C8.086 9.86842 9.83371 8.1473 12 8.1473C12.7921 8.1473 13.5527 8.38178 14.1867 8.80457L16.1892 6.83382C14.8815 5.99055 13.4565 5.55163 12 5.55163C10.2903 5.55163 8.61992 6.15424 7.14764 7.30096C5.73781 8.39217 4.52945 9.96072 3.61706 11.9004L3.5704 12.0014L3.61575 12.1003C4.40872 13.7948 5.43049 15.2038 6.61636 16.2548ZM13.0935 9.8804C12.7618 9.71412 12.3876 9.6235 12 9.6235C10.6624 9.6235 9.586 10.6835 9.586 12.0012C9.586 12.385 9.67671 12.7495 9.8468 13.0756L13.0935 9.8804ZM15.1366 11.8158L15.238 11.8269C15.6456 11.8991 15.9167 12.2828 15.8434 12.684C15.556 14.2567 14.2992 15.496 12.7022 15.7813C12.2946 15.8541 11.9042 15.588 11.8303 15.1869C11.7563 14.7858 12.0267 14.4016 12.4342 14.3288C13.4152 14.1536 14.1904 13.3892 14.367 12.4227C14.4343 12.055 14.7675 11.8002 15.1366 11.8158ZM18.997 8.31439C19.3279 8.06924 19.7981 8.13452 20.0472 8.46021C20.773 9.40914 21.4073 10.4985 21.9384 11.7072C22.0205 11.894 22.0205 12.1059 21.9386 12.2927C19.8613 17.0289 16.1345 19.9245 12 19.9245C11.0588 19.9245 10.1275 19.7747 9.23057 19.4801C8.83766 19.351 8.62544 18.9329 8.75657 18.5463C8.8877 18.1596 9.31252 17.9507 9.70543 18.0798C10.4497 18.3242 11.2207 18.4483 12 18.4483C15.3046 18.4483 18.381 16.1864 20.2727 12.3298L20.4284 12.0014L20.3755 11.8846C19.9948 11.0784 19.5645 10.339 19.0898 9.67414L18.8488 9.34799C18.5997 9.02231 18.666 8.55955 18.997 8.31439Z" fill="#200E32" />
                    </svg>
                </span>
            </div>
        </div>
        <div class="form-group">
            <div class="input-container password-container">
                <span class="input-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3344 2.0002H7.66543C4.26785 2.0002 2.00043 4.43279 2.00043 7.9162V16.0842C2.00043 19.5709 4.2618 22.0002 7.66543 22.0002H16.3334C19.738 22.0002 22.0004 19.5709 22.0004 16.0842V7.9162C22.0004 4.4297 19.7382 2.0002 16.3344 2.0002ZM7.66543 3.5002H16.3344C18.8849 3.5002 20.5004 5.23516 20.5004 7.9162V16.0842C20.5004 18.7654 18.8848 20.5002 16.3334 20.5002H7.66543C5.11519 20.5002 3.50043 18.7655 3.50043 16.0842V7.9162C3.50043 5.23857 5.12077 3.5002 7.66543 3.5002ZM8.84033 9.3982C7.40418 9.3982 6.23933 10.5639 6.23933 12.0002C6.23933 13.4365 7.40418 14.6022 8.84033 14.6022C10.0165 14.6022 11.0105 13.8213 11.3325 12.7502L13.4316 12.7501V13.8517L13.4385 13.9535C13.4881 14.3195 13.8019 14.6017 14.1816 14.6017C14.5958 14.6017 14.9316 14.2659 14.9316 13.8517V12.75L16.26 12.75L16.2603 13.8522L16.2672 13.954C16.3168 14.32 16.6306 14.6022 17.0103 14.6022C17.4245 14.6022 17.7603 14.2664 17.7603 13.8522V12.0002L17.7535 11.8984C17.7038 11.5324 17.39 11.2502 17.0103 11.2502H14.2093C14.2001 11.2499 14.1909 11.2497 14.1816 11.2497C14.1724 11.2497 14.1632 11.2499 14.154 11.2502H11.3325C11.0105 10.179 10.0165 9.3982 8.84033 9.3982ZM8.84033 10.8982C9.44871 10.8982 9.94233 11.392 9.94233 12.0002C9.94233 12.6084 9.44871 13.1022 8.84033 13.1022C8.23286 13.1022 7.73933 12.6083 7.73933 12.0002C7.73933 11.3921 8.23286 10.8982 8.84033 10.8982Z" fill="#200E32" />
                    </svg>
                </span>
                <input type="password" placeholder="Confirme contraseña" class="input password" name="password" id="confirm-password">
                <span class="input-icon show-password">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.4177 3.71619C20.1248 3.42794 19.65 3.42794 19.3571 3.71619L17.2693 5.77086C15.6565 4.6629 13.8555 4.07543 12 4.07543C9.94315 4.07543 7.94745 4.79542 6.21856 6.14201C4.51054 7.46402 3.08697 9.37061 2.06144 11.7081C1.97974 11.8943 1.97951 12.1054 2.06081 12.2918C2.94643 14.3222 4.13598 16.0255 5.55444 17.2999L3.58307 19.24L3.51045 19.3228C3.2926 19.6117 3.3168 20.0218 3.58307 20.2838C3.87596 20.5721 4.35084 20.5721 4.64373 20.2838L20.4177 4.76002L20.4903 4.67724C20.7082 4.38828 20.684 3.97823 20.4177 3.71619ZM6.61636 16.2548L8.75422 14.1508C8.32259 13.5256 8.086 12.785 8.086 12.0012C8.086 9.86842 9.83371 8.1473 12 8.1473C12.7921 8.1473 13.5527 8.38178 14.1867 8.80457L16.1892 6.83382C14.8815 5.99055 13.4565 5.55163 12 5.55163C10.2903 5.55163 8.61992 6.15424 7.14764 7.30096C5.73781 8.39217 4.52945 9.96072 3.61706 11.9004L3.5704 12.0014L3.61575 12.1003C4.40872 13.7948 5.43049 15.2038 6.61636 16.2548ZM13.0935 9.8804C12.7618 9.71412 12.3876 9.6235 12 9.6235C10.6624 9.6235 9.586 10.6835 9.586 12.0012C9.586 12.385 9.67671 12.7495 9.8468 13.0756L13.0935 9.8804ZM15.1366 11.8158L15.238 11.8269C15.6456 11.8991 15.9167 12.2828 15.8434 12.684C15.556 14.2567 14.2992 15.496 12.7022 15.7813C12.2946 15.8541 11.9042 15.588 11.8303 15.1869C11.7563 14.7858 12.0267 14.4016 12.4342 14.3288C13.4152 14.1536 14.1904 13.3892 14.367 12.4227C14.4343 12.055 14.7675 11.8002 15.1366 11.8158ZM18.997 8.31439C19.3279 8.06924 19.7981 8.13452 20.0472 8.46021C20.773 9.40914 21.4073 10.4985 21.9384 11.7072C22.0205 11.894 22.0205 12.1059 21.9386 12.2927C19.8613 17.0289 16.1345 19.9245 12 19.9245C11.0588 19.9245 10.1275 19.7747 9.23057 19.4801C8.83766 19.351 8.62544 18.9329 8.75657 18.5463C8.8877 18.1596 9.31252 17.9507 9.70543 18.0798C10.4497 18.3242 11.2207 18.4483 12 18.4483C15.3046 18.4483 18.381 16.1864 20.2727 12.3298L20.4284 12.0014L20.3755 11.8846C19.9948 11.0784 19.5645 10.339 19.0898 9.67414L18.8488 9.34799C18.5997 9.02231 18.666 8.55955 18.997 8.31439Z" fill="#200E32" />
                    </svg>
                </span>
            </div>
            <span class="error t-center d-none" id="message-password">Las contraseñas no coinciden</span>
        </div>

        <button class="btn btn-primary btn-disabled btn-submit" disabled type="submit">
            Registrarse
        </button>
    </form>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">
@endsection

@section('js')
<script src="{{asset('assets/js/signin.js')}}"></script>
<script src="{{asset('assets/js/signup.js')}}"></script>
@endsection