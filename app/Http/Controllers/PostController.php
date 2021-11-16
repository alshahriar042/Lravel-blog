<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        DB::listen(function($query){
            logger($query->sql, $query->bindings);
        });
            $posts = Post::paginate(10);
            $categories = Category::paginate(10);

            return view('posts', compact('posts', 'categories'));
        }

     public function show(Post $post){
        return view('post',[
            'post'=>$post,
            'categories'=>Category::all(),
        ]);
    }

    protected function getPosts(){
        $posts= Post::latest();

        if(request('search')) {
            $posts
            ->where('title' ,'like', '%' . request('search') . '%')
            ->orwhere('body' ,'like', '%' . request('search') . '%')
            ;
        }

        return $posts->paginate(5);
    }
}
