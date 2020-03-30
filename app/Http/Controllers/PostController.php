<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;

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
