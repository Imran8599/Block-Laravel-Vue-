<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cat_name'=>'required'
        ]);

        $row = new Category();
        $row->cat_name = $request->cat_name;
        $row->save();
        return ['message'=>'Category added successfully.'];
    }

    public function allCategory()
    {
        $categories = Category::all();
        return response()->json([
            'allCategor' => $categories
        ],200);
    }
}
