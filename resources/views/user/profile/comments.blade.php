@extends('user.profile.layout')

@section('profile')
<main class="section container">
    <div class="create-comment mb-2">
        <div class="create-comment-img f-start">
            <img src="{{asset('assets/img/profile/MRdj7FXcc37j6u544uDL5YHGy7BuCPXEbFrxPK4Q.jpg')}}" alt="">
        </div>
        <div class="create-comment-content">
            <textarea id="comment-content" placeholder="Escribe tu comentario aqui" rows="1"></textarea>
            <div class="create-rank text-sm mb-1" id="create-rank">
                
                <span class="star">
                    <i class="far fa-star star" data-rank="1"></i>
                </span class="star">
                <span class="star">
                    <i class="far fa-star star" data-rank="2"></i>
                </span class="star">
                <span class="star">
                    <i class="far fa-star star" data-rank="3"></i>
                </span class="star">
                <span class="star">
                    <i class="far fa-star star" data-rank="4"></i>
                </span class="star">
                <span class="star">
                    <i class="far fa-star star" data-rank="5"></i>
                </span class="star">
            </div>
        </div>
        <div class="btn btn-primary btn-send f-start" id="btn-send">
            <span>Enviar</span>
            <span class="fas fa-paper-plane"></span>
        </div>
    </div>
    <div class="comments">
        <div class="comment-item mb-2">
            <img src="{{asset('assets/img/profile/default-profile.png')}}" alt="">
            <div class="comment-header">
                <header class="comment-header title-2">
                    <div class="comment-user">Norman Reedus</div>
                    <span class="rank text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </span>
                    <span class="date text-sm">Ayer</span>
                </header>
                <p class="comment">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque quia porro, itaque aliquam deleniti cupiditate est sint, ea natus impedit totam? Minus aspernatur quis voluptatum a! Corrupti incidunt dolor ab.
                </p>
            </div>
            
        </div>
        <div class="comment-item mb-2">
            <img src="{{asset('assets/img/profile/default-profile.png')}}" alt="">
            <div class="comment-header">
                <header class="comment-header title-2">
                    <div class="comment-user">Norman Reedus</div>
                    <span class="rank text-sm">
                        <i class="star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </span>
                    <span class="date text-sm">Ayer</span>
                </header>
                <p class="comment">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque quia porro, itaque aliquam deleniti cupiditate est sint, ea natus impedit totam? Minus aspernatur quis voluptatum a! Corrupti incidunt dolor ab.
                </p>
            </div>
            
        </div>
        <div class="comment-item mb-2">
            <img src="{{asset('assets/img/profile/default-profile.png')}}" alt="">
            <div class="comment-header">
                <header class="comment-header title-2">
                    <div class="comment-user">Norman Reedus</div>
                    <span class="rank text-sm">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </span>
                    <span class="date text-sm">Ayer</span>
                </header>
                <p class="comment">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque quia porro, itaque aliquam deleniti cupiditate est sint, ea natus impedit totam? Minus aspernatur quis voluptatum a! Corrupti incidunt dolor ab.
                </p>
            </div>
            
        </div>
    </div>
</main>
@endsection

@section('js')
<script>const url = "{{route('profile.saveComment',5)}}"</script>
<script src="{{asset('assets/js/comment.js')}}"></script>
@endsection