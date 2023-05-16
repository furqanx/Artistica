@extends('layouts.app')

@section('content')

    @include('components.navbar')

    <div class="container rounded bg-white mt-5 mb-5"> 

        <div class="row display-flex justify-content-around">
            <div class="col-md-3 border-right"> 
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-2 mb-5" src="{{ asset('img/profile/'. ($users->image_path ?? 'profile.svg')) }}" width="200" height="200">
                    <span class="font-weight-bold">{{ $users->name }}</span>
                    <span class="text-black-50">{{ $users->email }}</span>
                    <span> </span>
                </div> 
            </div> 
            
            <form action="{{ route('profile.update', ['id' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-md-5 border-right">
                    
                    <div class="p-3 py-5"> 
                        <div class="d-flex justify-content-between align-items-center mb-3"> 
                            <h4 class="text-right">Profile Settings</h4> 
                        </div> 
                        <div class="row mt-3"> 
                            <div class="col-md-4">
                                <div id="imagePreview">
                                    <i class="fas fa-cloud-upload-alt cloud-icon"></i>
                                </div>
                                <label class="labels">Image</label>
                                <input type="file" class="form-control" id="imageInput" multiple accept="image/*" 
                                onchange="handleFiles(this.files)" name="image_path">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Name</label>
                                <input type="text" class="form-control" placeholder="your name" value="" name="name">
                            </div> 
                            <div class="col-md-12">
                                <label class="labels">Status</label>
                                <input type="text" class="form-control" placeholder="enter your current status" value="" name="status">
                            </div> 
                            <div class="col-md-12">
                                <label class="labels">Description</label>
                                <input type="text" class="form-control" placeholder="describe yourself" value="" name="description">
                            </div> 
                            <div class="col-md-12">
                                <label class="labels">Address</label>
                                <input type="text" class="form-control" placeholder="enter address" value="" name="address">
                            </div> 
                            <div class="col-md-12">
                                <label class="labels">Birthdate</label>
                                <input type="date" class="form-control" placeholder="enter your birthdate" value="" name="birthdate">
                            </div> 
                        </div> 
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                        </div> 
                    </div>
                    
                </div>
            </form>

            
        </div>
    </div>
@endsection