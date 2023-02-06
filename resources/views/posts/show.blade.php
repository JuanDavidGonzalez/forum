@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post</a></li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header text-bg-success ">
            Post # {{$post->id}}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">  
                    <h2>{{$post->title}}</h2>
                    <small><b>Created by:</b> {{$post->username}} at {{$post->created_at}} </small>
                    <p class="bg-light mt-3 p-3 rounded"">
                        {{$post->description}}
                    </p>
                        
                    @if($post->image)
                        <img src="{{asset('storage/'.$post->image)}}" class="img-fluid rounded mx-auto d-block" alt="post_image">
                    @else
                        <div class="alert alert-info" role="alert">
                            No image!
                        </div>
                    @endif
                </div>  
            </div>  
        <div class="row justify-content-center">
            <div class="col-md-12">
                @auth
                    <div class="d-flex flex-row-reverse mb-3">
                        <a href="{{route('response.create', $post->id)}}" class="btn btn-success" title="Create Post">
                            Add Answer
                        </a>
                    </div>
                @endauth

                @if($post->responses->count())
                    <h3 class="my-3">Responses:</h3>
                    <table class="table table-striped table-bordered">
                        <tbody>
                            @foreach ($post->responses as $response )
                                <tr>
                                    <td><b>{{$response->username}}</b></td>
                                    <td><p>{{$response->response_text}}</p></td>
                                    <td>
                                        <img src="{{asset('storage/'.$response->image)}}" 
                                        class="img-fluid rounded mx-auto d-block" alt="response_image">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info" role="alert">
                        No answers yet!
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
