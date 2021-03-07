<?php

use App\Models\Blog;
use App\Http\Controllers\BlogController;

Route::get('/blog', [BlogController::class,'index']);

Route::get('/blog/{id}', [BlogController::class,'show']);

// Route::get('/blog/{id}',function($id){
//     $blog = Blog::find($id);
//     return view('blog.index',['blog'=>$blog]);
// });

Route::get('/', function () {
    return view('welcome');
});
