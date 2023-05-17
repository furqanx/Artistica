@extends('layouts.app')

@section('content')

    @include('components.navbar')
    
    <!-- user profile -->
    <div class="people-container">
        @foreach ($users as $user)
            <div class="people">
                <a href="{{ route('profile.show', ['id' => $user->id]) }}" class="w3-bar-item w3-button">
                    <img src="{{ asset('img/profile/'. ($user->image_path ?? 'profile.svg')) }}" alt="Avatar" class="people-avatar" />
                </a>
            </div>
        @endforeach
    </div>
    

    {{-- <div class="d-flex w-100 justify-content-center">
        <ul class="nav nav-pills" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-square"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-th"></i></a>
            </li>
        </ul>
    </div> --}}

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container p-3 mb-2 bg-light text-dark">
                <h1></h1>

                
                @foreach ($posts as $post)
                    <div class="row justify-content-center p-3">
                        <div class="col-sm-12 col-md-8 col-lg-6">
                            <div class="card" width="350" height="400">
                                <!-- Lokasi postingan -->
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div><b>{{ $post->title }}</b><br> Paris, France</div>
                                        <div>
                                            <button class="btn btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span id="boot-icon" class="bi bi-three-dots-vertical" style="font-size: 20px;"></span>
                                            </button>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                {{-- <a class="dropdown-item" href="#">Edit</a>  --}}
                                                
                                                <!-- PR : buat pop up -->
                                                <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger dropdown-item">
                                                        Delete 
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ asset('img/post/' . $post->image_path) }}" 
                                class="card-img-top img-fluid" alt="...">
                                <div class="card-body" style="z-index: 1;">
                                    <!-- Title postingan -->
                                    <p class="card-text">{{ $post->title }}</p>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <a href="{{ route('post.show', ['id' => $post->id]) }}" class="btn btn-primary">
                                                Comment
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                @endforeach
                


                <!-- Postingan bodongan -->
                {{-- <div class="row justify-content-center p-3 ">
                    <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="card" style="">  --}}
                            <!-- Lokasi postingan -->
                            {{-- <div>
                                <div class="d-flex justify-content-between">
                                    <div><b>la crepe dentelle</b><br> Paris, France</div>
                                    <div>12/14</div>
                                </div>
                            </div> --}}
                                {{-- <img src="https://p0.ipstatp.com/large/tos-maliva-p-0000/72e2c976254a42c0bc7a74bda4d06eab" 
                                class="card-img-top" alt="...">
                            <div class="card-body"> --}}
                                {{-- <h6 class="card-title">47 likes</h6> --}}
                                <!-- Title postingan -->
                                {{-- <p class="card-text">Best crepes in the world here in the romance capital</p>
                                <div class="d-flex justify-content-between">
                                    <div> --}}
                                        {{-- <i class="far fa-heart"></i> --}}
                                        {{-- <a href="#" class="btn btn-primary">Comment</a>
                                    </div> --}}
                                    {{-- <div>
                                        <i class="fas fa-ellipsis-v"></i>
                                    </div> --}}
                                {{-- </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="row justify-content-center p-3">
                    <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="card" style="">
                            <div>
                                <div class="d-flex justify-content-between">
                                    <div><b>stubborn seed</b><br>Miami, Florida</div>
                                    <div>1/12</div>
                                </div>
                            </div>
                                <img src="http://2.bp.blogspot.com/-eM-xHDW3yz4/UGXPEUts2lI/AAAAAAAABBU/obnyoIU4RvU/s1600/photo(43).JPG" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title">38 likes</h6>
                                <p class="card-text">Amazing food here</p>
                                <div class="d-flex justify-content-between">
                                    <div><i class="far fa-heart"></i>
                                        <a href="#" class="btn btn-primary">Comment..</a>
                                    </div>
                                    <div>
                                        <i class="fas fa-ellipsis-v"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="row justify-content-center p-3">
                    <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="card" style="">
                            <div>
                                <div class="d-flex justify-content-between m-2">
                                    <div><b>Rome, Italy</b></div>
                                    <div>2/18</div>
                                </div>
                            </div>
                                <img src="https://www.findingtheuniverse.com/wp-content/uploads/2018/03/Castel-SantAngelo-Rome_by_Laurence-Norah-4.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title">41 likes</h6>
                                <p class="card-text">Walking thru history</p>
                                <div class="d-flex justify-content-between">
                                    <div><i class="far fa-heart"></i>
                                        <a href="#" class="btn btn-primary">Comment..</a>
                                    </div>
                                    <div>
                                        <i class="fas fa-ellipsis-v"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="row justify-content-center p-3">
                    <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="card" style="">
                            <div>
                                <div class="d-flex justify-content-between">
                                    <div><b>sobewff</b><br>Miami, Florida</div>
                                    <div>3/22</div>
                                </div>
                            </div>
                                <img src="https://media.timeout.com/images/105152645/630/472/image.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title">52 likes</h6>
                                <p class="card-text">Enjoying great wine and food</p>
                            <div class="d-flex justify-content-between">
                                    <div><i class="far fa-heart"></i>
                                        <a href="#" class="btn btn-primary">Comment..</a>
                                    </div>
                                    <div>
                                        <i class="fas fa-ellipsis-v"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div> 

@endsection