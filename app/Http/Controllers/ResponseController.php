<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;
use App\Http\Resources\ResponseResource;

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
            'image' => 'nullable|image',
        ]);

        $response = new Response();
        $response->fill($request->all());
        $response->user_id = auth()->user()->id;
        $response->post_id = $post_id;

        if($request->file('image')){
            $path = $request->file('image')->store('response_images', 'public');
            $response->image = $path;
        }

        $response->save();
        return;
    }

    public function list($post_id)
    {
        $responses = Response::where('post_id', $post_id)->latest()->paginate(3);

        return ResponseResource::collection($responses);
    }
}
