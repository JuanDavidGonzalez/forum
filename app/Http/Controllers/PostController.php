<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request){

        $posts = Post::searchTitle(request('title'))
                        ->sortByTitle(request('sort_by'))->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $post = new Post();
        $post->fill($request->all());
        $post->user_id = auth()->user()->id;

        if($request->file('image')){
            $path = $request->file('image')->store('post_images', 'public');
            $post->image = $path;
        }

        $post->save();
        
        return redirect()->route('post.index')->with('success', 'Post created successfully');

    }
}
