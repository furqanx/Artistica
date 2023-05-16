@extends('layouts.app')

@section('content')

    @include('components.navbar')

    {{-- <p>Gambar postingan : <img src="{{ asset('img/post/'. $posts->image_path) }}" width="200" height="200"> </p>
    <p>Foto profil pemilik postingan : <img src="{{ asset('img/profile/'. ($posts->Users->image_path ?? 'profile.svg')) }}" width="100" height="100"></p>
    <p>Nama pemilik postingan : {{ $posts->Users->name }}</p> 
    <p>Judul postingan : {{ $posts->title }}</p>
    <p>Deskripsi postingan : {{ $posts->description }}</p>
    <br>

    @if (!empty($post_comments->Users->id))
        @foreach ($post_comments as $post_comment)
            <hr>
            <p> Foto profil user yang memberikan komentar : <img src="{{ asset('img/profile/'. ($posts->Users->image_path ?? 'profile.svg')) }}" width="100" height="100"></p>
            <p>Nama user yang memberikan komentar : {{ $post_comment->Users->name ?? '' }}</p>
            <p>Kalimat komentar / isi dari komentar : {{ $post_comment->comment_content ?? '' }}</p>
            <hr>
        @endforeach
    @endif --}}

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post-content">
                <!-- Post Image -->
                <img src="{{ asset('img/post/'. $posts->image_path) }}" alt="post-image" class="img-responsive post-image">
                    <div class="post-container">
                        <img src="{{ asset('img/profile/'. ($posts->Users->image_path ?? 'profile.svg')) }}" alt="user" class="profile-photo-md pull-left">
                        
                        <div class="post-detail">
                            <div class="user-info">
                                <h5>
                                    <a href="{{ route('profile.show', ['id' => $posts->Users->id]) }}" class="profile-link">{{ $posts->Users->name }}</a> 
                                    {{-- <span class="following">following</span> --}}
                                </h5>
                                {{-- <p class="text-muted">Published a photo about 3 mins ago</p> --}}
                            </div>
                            
                            {{-- <div class="reaction">
                                <a class="btn text-green"><i class="fa fa-thumbs-up"></i> 13</a>
                                <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                            </div> --}}
                            
                            <div class="line-divider"></div>

                            <div class="post-text">
                                <p>{{ $posts->description }} 
                                    <i class="em em-anguished"></i> 
                                    <i class="em em-anguished"></i> 
                                    <i class="em em-anguished"></i>
                                </p>
                            </div>
                            
                            <div class="line-divider"></div>

                            {{-- @if (!empty($post_comments->Users->id))
                                @foreach ($post_comments as $post_comment)
                                    <div class="post-comment">
                                        <img src="{{ asset('img/profile/'. ($post_comment->Users->image_path ?? 'profile.svg')) }}" alt="" class="profile-photo-sm">
                                        <p>
                                            <a href="timeline.html" class="profile-link">{{ $post_comment->Users->name ?? '' }} </a>
                                            <i class="em em-laughing"></i> 
                                            {{ $post_comment->comment_content ?? '' }} 
                                        </p>
                                    </div>
                                @endforeach
                            @endif --}}
                            @if (!empty($comments))
                                @foreach ($comments as $comment)
                                    <div class="post-comment">
                                        <img src="{{ asset('img/profile/'. ($comment->Users->image_path ?? 'profile.svg')) }}" alt="" class="profile-photo-sm">
                                        <p>
                                            <a href="{{ route('profile.show', ['id' => $comment->Users->id]) }}" class="profile-link">{{ $comment->Users->name ?? '' }} </a>
                                            <i class="em em-laughing"></i> 
                                            {{ $comment->comment_content ?? '' }} 
                                        </p>
                                    </div>
                                    <hr class="hr" />
                                @endforeach
                            @endif

                            <!-- input comment -->
                            <div class="post-comment">
                                <form action="{{ route('comment', ['id' => $posts->id]) }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <img src="{{ asset('img/profile/'. ($auth_user->image_path ?? 'profile.svg')) }}" alt="" class="profile-photo-sm">
                                    <input type="text" class="form-control col-20" placeholder="Post a comment"  name="comment">
                                    <button type="submit">Send</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection