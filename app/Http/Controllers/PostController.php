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
            //  $posts= Post::latest('created_at')->with('category','user')->get();
           // $posts= Post::latest();

            return view('posts', [
                'posts' => $this->getPosts(),
                'categories'=>Category::all(),
            ]);
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
