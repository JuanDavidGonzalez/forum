@extends('layouts.app')

@section('content')
    <div class="card">
        <form action="{{route('response.store', $post_id)}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            <div class="card-body"> 
                @csrf
                <div class="mb-3">
                    <label for="response_text" class="form-label">Response:</label>
                    <textarea class="form-control @error('response_text') is-invalid @enderror" id="response_text" name="response_text" rows="3"></textarea>
                    @error('response_text')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>  
                <div class="mb-3">
                    <label for="image" class="form-label">Load Image:</label>
                    <input type="file" name="image" />
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
