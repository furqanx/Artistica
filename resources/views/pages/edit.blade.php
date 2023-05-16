@extends('layouts.app')

@section('content')

    @include('components.navbar')

    <div class="container rounded bg-white mt-4 mb-2 py-5 px-5">
        
            <div class="row">
            <div class="col-md-4 border-right"> 
                <div class="d-flex flex-column align-items-center text-center p-3 py-12">
                    <img class="rounded-circle mt-2 mb-5" src="{{ asset('img/profile/'. ($users->image_path ?? 'profile.svg')) }}" width="200" height="200">
                    <span class="font-weight-bold">{{ $users->name }}</span>
                    <span class="text-black-50">{{ $users->email }}</span>
                    <div class="col-md-12 mt-3">
                        <div id="imagePreview">
                            <i class="fas fa-cloud-upload-alt cloud-icon"></i>
                        </div>
                        <label class="labels">Image</label>
                        <input type="file" class="form-control" id="imageInput" multiple accept="image/*" onchange="handleFiles(this.files)" name="image_path" placeholder="Click to add image">
                    </div>
                </div> 
            </div> 
            
            <div class="col-md-8 p-3 py-8"> 
                <form action="{{ route('profile.update', ['id' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center mb-3"> 
                                <h4 class="text-right">Profile Settings</h4> 
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" class="form-control" placeholder="Your name" value="" name="name">
                        </div> 
                        <div class="col-md-6">
                            <label class="labels">Status</label>
                            <input type="text" class="form-control" placeholder="Enter your current status" value="" name="status">
                        </div> 
                        <div class="col-md-12">
                            <label class="labels">Description</label>
                            <input type="text" class="form-control" placeholder="Describe yourself" value="" name="description">
                        </div> 
                        <div class="col-md-6">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" placeholder="Enter address" value="" name="address">
                        </div> 
                        <div class="col-md-6">
                            <label class="labels">Birthdate</label>
                            <input type="date" class="form-control" placeholder="Enter your birthdate" value="" name="birthdate">
                        </div> 
                    </div> 

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
