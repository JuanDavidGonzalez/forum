@extends('layouts.app')

@section('content')
    <nav aria-label='breadcrumb'>
        <ol class='breadcrumb'>
            <li class='breadcrumb-item'>
                <a href='{{route('post.index')}}'>Post</a>
            </li>
        </ol>
    </nav>


    <div class='card'>
        <div class='card-header text-bg-success'>
            Post # {{$post->id}}
        </div>
        <div class='card-body'>
            <div class='row'>
                <div class='col-md-12'>  
                    <h2>{{$post->title}}</h2>
                    <small><b>Created by:</b> {{$post->username}} at {{$post->created_at}} </small>
                    <p class='bg-light mt-3 p-3 rounded'>
                        {{$post->description}}
                    </p>
                        
                    @if($post->image)
                        <img src='{{asset('storage/'.$post->image)}}' class='img-fluid rounded mx-auto d-block' alt='post_image'
                         style='max-width: 300px; max-height: 300px;'>
                    @else
                        <div class='alert alert-info' role='alert'>
                            No image!
                        </div>
                    @endif
                </div>  
            </div> 
        </div> 
    </div> 
    <div id='response' class='mt-4'>
        <response-component post_id={{$post->id}}></response-component>
    </div>    

@endsection

@section('js')
    <script src='{{ asset('js/scripts/response.js')}}'></script>
@endsection