<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function create($request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = Auth::user()->id;

        $post->save();

        return $post;
    }
    public function update($request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return $post;
    }

    public function get_all()
    {
        $post = Post::all();
        return $post;
    }
    public function get_by_id($id)
    {
        $post = Post::where('id', $id)->get();
        return $post;
    }
    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return $post;
    }
}
