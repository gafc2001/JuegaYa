<header class="profile-header container">
    <div class="profile-image center">
        <div class="img-container">
            <img src="{{asset('assets/img/profile/'.$user->profile()->profile_picture)}}" alt="profile">
            @if(auth()->id() == $user->id)    
            <span class="profile-edit link" id="edit-profile">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.96867 13.9157L13.6592 4.41662C14.906 3.19446 16.9283 3.19446 18.175 4.41662L19.4694 5.6854C20.7162 6.90755 20.7162 8.88985 19.4694 10.112L9.74061 19.6486C9.1843 20.1939 8.43007 20.4999 7.64282 20.4999H3.65854C3.28841 20.4999 2.99098 20.201 3.00021 19.8383L3.10043 15.8975C3.12036 15.1526 3.43127 14.4425 3.96867 13.9157ZM18.5381 6.59831L17.2437 5.32953C16.5113 4.61156 15.323 4.61156 14.5905 5.32953L13.8382 6.06697L17.7862 9.93612L18.5381 9.19909C19.2705 8.48112 19.2705 7.31628 18.5381 6.59831ZM4.89998 14.8287L12.9069 6.97989L16.8549 10.849L8.8093 18.7357L8.70228 18.8317C8.4067 19.0745 8.03222 19.2088 7.64282 19.2088L4.33345 19.2084L4.41707 15.9305C4.42814 15.5169 4.60126 15.1215 4.89998 14.8287ZM21 19.8545C21 19.498 20.7052 19.2089 20.3415 19.2089H13.471L13.3816 19.2148C13.0602 19.2576 12.8125 19.5277 12.8125 19.8545C12.8125 20.211 13.1073 20.5 13.471 20.5H20.3415L20.4308 20.4941C20.7523 20.4514 21 20.1813 21 19.8545Z" fill="#200E32" />
                </svg>
            </span>
            @endif
        </div>
    </div>
    <div class="t-center m-y">
        <h3 class="user-name title-3">{{$user->profile()->getFullName()}}</h3>
        <p class="user-desc text-light">Coding and playing 🔥</p>
    </div>
    <nav class="btn-container btn-profile">
        <a href="{{route('profile.index')}}" class="btn btn-secondary">Mi perfil</a>
        <a href="#" class="btn btn-transparent">Actividad</a>
        <a href="{{route('profile.comment',$user->id)}}" class="btn btn-transparent">Comentarios</a>
    </nav>
</header>