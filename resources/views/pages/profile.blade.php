@extends('layouts.app') 

@section('content') 

@include('components.navbar')

<section class="h-100 gradient-custom-2">
    <div class="container-pro">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="container rounded bg-white mt-4 mb-2 py-3 px-5">
                <div class="card">
                    <div
                        class="rounded-top text-white d-flex flex-row"
                        style="background-color: #000; height: 210px">
                        <div class="ms-4 mt-5 d-flex flex-column m-4" style="width: 150px">
                            <img
                                src="{{ asset('img/profile/'. ($users->image_path ?? 'profile.svg')) }}"
                                alt="Generic placeholder image"
                                class="img-fluid img-thumbnail mt-4 mb-2"
                                style="width: 150px; z-index: 1" />

                            @if ($users->id === auth()->user()->id)

                                <a href="{{ route('profile.edit', ['id' => auth()->user()->id]) }}"
                                    class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                                    style="z-index: 1">
                                    Edit profile
                                </a>
                            @endif
                        </div>

                        <div class="ms-3" style="margin-top: 130px">
                            <h5>&nbsp;{{ $users->name }}</h5>
                            <p>&nbsp;{{ $users->address }}</p>
                        </div>

                        <!-- PR : buat pop up -->
                        <div class="dropdown">
                            <form action="{{ route('profile.destroy', ['id' => auth()->user()->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <span id="boot-icon" class="bi bi-three-dots-vertical" style="font-size: 24px; 
                                color:#ffffff" type="button" id="dropdownMenuButton" data-toggle="dropdown"></span>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <button type="submit" class="btn btn-link text-danger dropdown-item" onclick="return confirm('Are you sure ?')">
                                        Delete Account
                                    </button>
                                </div>
                            </form>
                        </div>
                        
                    </div>

                    <div
                        class="p-4 text-black"
                        style="background-color: #f8f9fa">
                        <div class="d-flex justify-content-end text-center py-1">
                            <div>
                                <p class="mb-1 h5">{{ $users->posts->count() }}</p>
                                <p class="small text-muted mb-0">Photos</p>
                            </div>
                            {{-- <div class="px-3">
                                <p class="mb-1 h5">1026</p>
                                <p class="small text-muted mb-0">Followers</p>
                            </div>
                            <div>
                                <p class="mb-1 h5">478</p>
                                <p class="small text-muted mb-0">Following</p>
                            </div> --}}
                        </div>
                    </div>

                    <div class="card-body p-4 text-black">
                        <div class="mb-5">
                            <p class="lead fw-normal mb-1">About</p>
                            <div class="p-4" style="background-color: #f8f9fa">
                                <pre class="font-italic mb-1">
                                    Status      : {{ $users->status }}</pre>
                                <pre class="font-italic mb-1"> 
                                    Desctiption : {{ $users->description }}</pre>
                                <pre class="font-italic mb-0"> 
                                    Birthday    : {{ $users->birthdate }}</pre>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <p class="lead fw-normal mb-0">Recent photos</p>
                            <p class="mb-0">
                                <a href="#!" class="text-muted">Show all</a>
                            </p>
                        </div>

                        <!-- Postingan User -->
                        <div class="row g-2">
                            @foreach ($posts as $post)
                                <div class="col-md-4 mb-3">
                                    <img
                                        src="{{ asset('img/post/' . $post->image_path) }}"
                                        alt="image"
                                        class="w-100 rounded-3"
                                    />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
