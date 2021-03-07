<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }

    public function show($id){
        $blog = Blog::find($id);
        return view('blog.show', compact('blog'));
    }

}
