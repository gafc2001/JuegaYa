@extends('templates.layout')

@section('content')
@include('user.profile.header',['user' => $user])
<main class="section container">
    @if(auth()->id() != $user->id)    
    <div class="create-comment mb-2">
        <div class="create-comment-img f-start">
            <img src="{{asset('assets/img/profile/'.auth()->user()->getProfilePicture())}}" alt="profile">
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
            <span class="btn-text">Enviar</span>
            <span class="fas fa-paper-plane"></span>
        </div>

    </div>
    @endif
    @if($user->recomendations()->get()->isEmpty())
        @if($user->id == auth()->id())
        <p class="text t-center">No hay comentarios, participa en un partido para que tu equipo comente</p>
        @else
        <p class="text t-center">No hay comentarios, se el primero en comentar</p>
        @endif
    @endif
    <div class="comments">
            @foreach ($user->recomendations()->get() as $comment)
            <div class="comment-item mb-2">
                <img src="{{asset('assets/img/profile/'.$comment->user()->getProfilePicture())}}" alt="">
                <div class="comment-header">
                    <header class="comment-header title-2">
                        <div class="comment-user">{{$comment->user()->profile()->getFullName()}}</div>
                        <span class="rank text-sm">
                            @for ($i = 0;$i<$comment->rank;$i++)
                                <i class="fas fa-star"></i>    
                            @endfor
                            @for ($i = 0;$i<(5-$comment->rank);$i++)
                                <i class="far fa-star"></i>    
                            @endfor
                            
                        </span>
                        <span class="date text-sm">{{$comment->getDate()}}</span>
                    </header>
                    <p class="comment">
                        {{$comment->comment}}
                    </p>
                </div>
            </div>
            @endforeach
    </div>
</main>
@endsection

@section('css'))
<link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
@endsection
@section('js')
<script>
const url = "{{route('profile.saveComment',$user->id)}}";
const commentUserId = "{{auth()->id()}}";
</script>
<script src="{{asset('assets/js/comment.js')}}"></script>
@endsection