<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user','category')->get();
        return response()->json([
            'posts' => $posts
        ],200);
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'cat_id' => 'required',
        //     'title' => 'required',
        //     'description' => 'required',
        //     'photo' => 'required',
        // ]);
        dd($request->all());
    }
}
