@extends('layouts.app')

@section('content')

    @include('components.navbar')

    <div class="card-body px-sm-4 px-0 mt-5 mb-5 mx-auto">

        <div class="row justify-content-center round">
            <div class="col-lg-10 col-md-12 ">
                <div class="card shadow-lg card-1">
                    <div class="card-body inner-card">
                        
                        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-10 col-12"> 
                                    <!-- Input foto postingan -->
                                    <div class="form-group files">
                                        {{-- <label class="my-auto">Upload Your Photo </label> 
                                        <input id="file" class="rounded" type="file" class="form-control" 
                                        multiple accept="image/*" name="image_path"/> --}}
                                        <div id="imagePreview"></div>
                                        <div class="dropzone">
                                            <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
                                            <input type="file" class="upload-input rounded" id="imageInput" 
                                            class="form-control" multiple accept="image/*" name="image_path" 
                                            onchange="handleFiles(this.files)" />
                                        </div>
                                    </div>

                                    <!-- Input judul postingan -->
                                    <div class="form-group">
                                        <label for="first-name">Title</label>
                                        <input type="text" class="form-control rounded" id="first-name" 
                                        placeholder="Give the title" name="title"> 
                                    </div>

                                    <!-- Input deskripsi postingan -->
                                    <div class="form-group"> 
                                        <label for="exampleFormControlTextarea2">Description</label> 
                                        <textarea class="form-control rounded" id="exampleFormControlTextarea2" 
                                        rows="5" placeholder="Give the description" name="description"></textarea>
                                    </div>

                                    <!-- submit postingan -->
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <small class="font-weight-bold">Upload your Post</small>
                                    </button> 
                                </div>
                            </div>
                        </form>
  
                            {{-- <div class="row justify-content-center">
                                <div class="col-lg-5 col-md-6 col-sm-12">
                                    
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-10 col-12">
                                    
                                </div>
                            </div>

                            <div class="row justify-content-end mb-5">
                                <div class="col-lg-4 col-auto">
                                    
                                </div>
                            </div>    --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection