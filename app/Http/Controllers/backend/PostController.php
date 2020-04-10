<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Image;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user','category')->orderBy('id','desc')->get();
        return response()->json([
            'posts' => $posts
        ],200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cat_id' => 'required',
            'title' => 'required',
        ]);
        $row = new Post;
        $row->cat_id = $request->cat_id;
        $row->user_id = '10';
        $row->comment_id = '17';
        $row->title = $request->title;
        $row->description = $request->description;

        if($request->photo != '')
        {
            $str_pos = strpos($request->photo, ';');
            $sub = substr($request->photo,0,$str_pos);
            $ex = explode('/',$sub)[1];
            $name = time().'.'.$ex;
            $img = Image::make($request->photo)->resize(300,200);
            $upload_path = public_path().'/img/';
            $img->save($upload_path.$name);
            $row->photo = $name;
        }

        $row->save();
    }
}
