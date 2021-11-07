<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
           //3rd Approch Collection

Route::get('/', function () {

    DB::listen(function($query){
  logger($query->sql, $query->bindings);
    });
    $posts= Post::latest('created_at')->with('category','user')->get();

return view('posts', [
    'posts' => $posts
]);
                   //2nd Approch

// $post = array_map(function ($file){
//     $document = YamlFrontMatter::parseFile($file);
//     return new Post(
//                 $document->matter('title'),
//                 $document->matter('excerpt'),
//                 $document->matter('date'),
//                 $document->body(),
//                 $document->matter('slug')
//             );
// } ,$files);
                   //1st Approch
    // foreach ($files as $file) {

    //     $document = YamlFrontMatter::parseFile($file);

    //     $posts [] = new Post(
    //         $document->matter('title'),
    //         $document->matter('excerpt'),
    //         $document->matter('date'),
    //         $document->body(),
    //         $document->matter('slug')
    //     );

    // }
  //  ddd($posts);

    //ddd($posts);

    // $document=YamlFrontMatter::parseFile(
    //     resource_path('posts/my-first-post.html')
    // );
    // ddd($document->matter('title'));
    //     $posts = Post::all();

    //     return view('posts',[
    //         'posts' =>$posts
    //     ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
//find a post by its slug and pass ot view called "post"
//$post=Post::findOrFail($id);
//dd($post);
return view('post',[
'post'=>$post
]);

  // return $slug;

 });

 Route::get('categories/{category:slug}', function (Category $category) {
// $x=$category->posts;
// dd($x);
    return view('posts',[
    'posts'=>$category->posts
    //->load(['category','user']) //loas use for optimization
    ]);

  // return $slug;

 });

 Route::get('users/{user:user_name}', function (User $user) {
    // $x=$user->posts;
    //  dd($x);
        return view('posts',[
        'posts'=>$user->posts
        //->load(['category','user'])
        ]);

      // return $slug;

     });

// Route::get('/skills', function () {
//     return view('skills');
// });

// Route::get('/skills/{skill}', function ($slug) {
//   //  return $slug;

//   $path= __DIR__ . "/../resources/skills/{$slug}.html";
//   ddd($path);
//   $skill=file_get_contents($path);
//   return view('skill', [
//    'skil'=>$skill
//     ]);
// }) -> where('skill', '[A-z_\-]+');
