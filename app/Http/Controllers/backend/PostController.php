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

    public function edit($id)
    {
        $row = Post::find($id);
        return response()->json([
            'row'=>$row
        ],200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cat_id' => 'required',
            'title' => 'required',
        ]);

        $row = Post::find($id);

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

            if($row->photo != '')
            {
                @unlink($upload_path.$row->photo);
            }

            $img->save($upload_path.$name);
            $row->photo = $name;
        }

        $row->save();
    }

    public function delete($id)
    {
        $row = Post::find($id);
        $image_path = public_path().'/img/';
        $image = $image_path.$row->photo;
        if(file_exists($image))
        {
            @unlink($image);
        }

        $row->delete();
    }


    public function details($id)
    {
        $row = Post::with('user','category')->where('id',$id)->first();
        return response()->json([
            'post'=>$row
        ],200);
    }

    public function latestPost()
    {
        $row = Post::orderBy('id','desc')->limit(3)->get();
        return response()->json([
            'posts'=>$row
        ],200);
    }

    public function categoryPost($id)
    {
        $rows = Post::with('user','category')->where('cat_id',$id)->orderBy('id','desc')->get();
        return response()->json([
            'category_posts'=>$rows
        ],200);
    }

    public function search()
    {
        $value = \Request::get('s');
        $row = Post::with('user','category')->where('title','LIKE',"%$value%")->get();
        return response()->json([
            'search'=>$row
        ],200);
    }
}
