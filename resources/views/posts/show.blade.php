@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-bg-success ">
            Post # {{$post->id}}
        </div>
        <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-12">  
                <h2>{{$post->title}}</h2>
                <small><b>Created by:</b> {{$post->username}} at {{$post->created_at}} </small>
                <p class="bg-light mt-3 p-3 rounded"">
                    {{$post->description}}
                </p>
            </div>  
        </div>  
        <div class="row justify-content-center">
            <div class="col-md-12">
            @auth
                <div class="d-flex flex-row-reverse mb-3">
                    <a href="" class="btn btn-success" title="Create Post">
                        Add Answer
                    </a>
                </div>
            @endauth
                <h3 class="my-3">Responses:</h3>
                <table class="table table-striped table-bordered">
                    <tbody>
                        @foreach ($post->responses as $response )
                            <tr>
                                <td><b>{{$response->username}}</b></td>
                                <td><p>{{$response->response_text}}</p></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
