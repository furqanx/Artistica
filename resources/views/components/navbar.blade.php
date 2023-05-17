<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="d-flex w-100 justify-content-between">
        <div>
            <a class="navbar-brand" href="{{ route('home') }}">
               <img src="{{ asset('img/logo.svg') }}" width="160" height="30">
                
            </a>
        </div>

        <div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a href="{{ route('post.create') }}">
                    <button type="button" class="btn btn-success" data-toggle="modal" 
                    data-target="#exampleModal">Create a new post</button>
                </a>
                        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Write your post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Type..." aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <div>
                                        <i class="fas fa-camera fa-2x"></i>
                                        <i class="fas fa-map-marker-alt fa-2x"></i>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary">Publish</button>
                                </div>
                                </div>
                            </div>
                        </div> --}}
                <ul class="navbar-nav mr-auto .">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{-- <i class="fas fa-cog"></i> --}}
                            </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            {{-- <a class="dropdown-item" href="#">Action</a> --}}
                            <a class="dropdown-item" href="{{ route('profile.show', ['id' => auth()->user()->id]) }}">Profile</a>
                            {{-- <a class="dropdown-item" href="{{ route('profile.destroy', ['id' => auth()->user()->id]) }}">Delete Account</a> --}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
                        </div>
                    </li>
                </ul>
                
            </div>
        </div>
    </div>
</nav>