<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index(){

        return view('admin.index',[
            'posts' => Post::paginate(5)
        ]);
    }

    public function edit(Post $post){

        return view('admin.edit',[
              'post' => $post
        ]);


    }
}
