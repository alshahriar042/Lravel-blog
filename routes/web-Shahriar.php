<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', function () {
    $files= File::files(resource_path("posts"));
     $posts= [];

foreach($files as $file){

 $document=YamlFrontMatter::parseFile($file);
 //ddd($document->title);

 $posts[] =$document;
//  new Post(
//  $document->title,
//  $document->excerpt,
//  $document->date,
//  $document->body()
//  );
 //ddd($posts[0]->title);

}

//ddd($posts);
return view('posts',[
    'posts'=>$posts
]);
// $document=YamlFrontMatter::parseFile(
//     resource_path('posts/my-first-post.html')
// );
// ddd($document->matter('title'));
//     $posts = Post::all();

//     return view('posts',[
//         'posts' =>$posts
//     ]);
 });

Route::get('/posts/{post}', function ($slug) {
//find a post by its slug and pass ot view called "post"
$post=Post::find($slug);
dd($post);
return view('post',[
'post'=>$post
]);

//    // return $slug;

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

