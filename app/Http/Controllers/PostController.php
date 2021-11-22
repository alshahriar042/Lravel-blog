<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index(){
        DB::listen(function($query){
            logger($query->sql, $query->bindings);
        });
            $posts = $this->getPosts();
            $categories = Category::all();
            //dd($posts);

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


    public function create(){

        // if( auth()->user()->username !== 'alshahriar'){
        //  abort(Response::HTTP_FORBIDDEN);
        // }

          return view('admin.post_create');
    }

    public function store(Request $request){
        try {
            $imageName = Str::random(28) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->storeAs(
                'public/resources', $imageName
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'Image Upload Failed!');
        }

        $attributes = request()->validate([
        'title' => 'required',
        'slug' => 'required|unique:posts,slug',
        'excerpt' => 'required',
        'thumbnail' => 'required|image',
        'body' => 'required',
        'category_id' =>['required', Rule::exists('categories','id')]
    ]);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = $imageName;
      Post::create($attributes);
    // dd($d);
        return redirect('/');
    }
}

