@extends('layouts.app')

@section('content')
<div class="container">
    @auth
        <div class="d-flex flex-row-reverse mb-3">
            <a href="" class="btn btn-success" title="Create Post">
                New Post
            </a>
        </div>
    @endauth
    <div class="card">
        <div class="card-header text-bg-success ">
            Post List
        </div>
        <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id.</th>
                                <th>Title</th>
                                <th>Username</th>
                                <th>Creted At</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post )
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->username}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td>
                                        <a href="{{route('post.show', $post->id)}}" class="btn btn-success" title="Show">
                                            Show
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
