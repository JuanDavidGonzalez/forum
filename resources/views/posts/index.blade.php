@extends('layouts.app')

@section('content')

    <div class="card mb-2">
        <div class="card-header text-bg-primary ">
            Search Post
        </div>
        <div class="card-body">
            <form method="get" action="{{route('post.index')}}">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{request('title')}}">
                </div>
                <div class="mb-3">
                    <label for="sort_by" class="form-label">Sort by Tittle:</label>
                    <select class="form-select" name="sort_by">
                        <option selected disabled>---</option>
                        <option value="DESC" {{'DESC' == request('sort_by')?'Selected':''}}>Desc</option>
                        <option value="ASC"  {{'ASC' == request('sort_by')?'Selected':''}}>Asc</option>
                    </select>
                </div>
                <div class="form-group col text-center">
                    <button type="submit" class="btn btn-primary" title="Search">Search</button>
                </div>
            </form>
        </div>
    </div>
         
    @auth
        <div class="d-flex flex-row-reverse mb-3">
            <a href="{{route('post.create')}}" class="btn btn-success" title="Create Post">
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
    </div>
@endsection
