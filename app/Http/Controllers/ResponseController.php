<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;

class ResponseController extends Controller
{
    public function create($post_id)
    {
        return view('responses.create', compact('post_id'));
    }

    public function store(Request $request, $post_id)
    {

        $validated = $request->validate([
            'response_text' => 'required',
        ]);


        $response = new Response();
        $response->fill($request->all());
        $response->user_id = auth()->user()->id;
        $response->post_id = $post_id;

        $path = $request->file('image')->store('response_images', 'public');
        $response->image = $path;

        $response->save();
        return redirect()->route('post.show', $post_id)->with('success', 'Response created successfully');
    }
}
