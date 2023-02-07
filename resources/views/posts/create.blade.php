@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header text-bg-success ">
            New Post
        </div>
        <form action="{{route('post.store')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            <div class="card-body"> 
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="title">
                    @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3"></textarea>
                    @error('description')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>  
                <div class="mb-3">
                    <label for="image" class="form-label">Load Image:</label>
                    <input type="file" class="form-control" name="image" />
                    @error('image')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success">Submit</button>
                <a href="{{route('post.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
