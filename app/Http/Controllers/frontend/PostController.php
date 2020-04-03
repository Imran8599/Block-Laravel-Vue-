<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function all_post()
    {
        $posts = Post::with('category','user')->get();
        return $posts;

        // $category = Category::with('posts')->get();
        // return $category;

        // $user = User::with('posts')->get();
        // return $user;
    }
}
