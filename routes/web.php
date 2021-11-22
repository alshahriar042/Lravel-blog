<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\AdminPostController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;

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

     //ADMIN
          Route::get('admin/posts/create', [PostController::class, 'create']) -> middleware('admin');
          Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');
          Route::get('admin/posts', [AdminPostController::class, 'index']);

          Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');




           //3rd Approch Collection
           Route::get('/', [PostController::class, 'index'])->name('home');
           Route::get('posts/{post:slug}', [PostController::class, 'show']);
           Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

           Route::get('/register', [RegistrationController::class, 'create'])->middleware('guest');
           Route::post('register', [RegistrationController::class, 'store'])->middleware('guest');
           Route::get('login', [SessionController::class, 'create'])->middleware('guest');
           Route::post('login', [SessionController::class, 'store'])->middleware('guest');
           Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

           Route::post('newsletter', function () {

             request()->validate([
              'email' =>'required'
            ]);

            $mailchimp = new \MailchimpMarketing\ApiClient();

            $mailchimp->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us20'
            ]);
           //dd($mailchimp);

            try{
                $response = $mailchimp->lists->addListMember('daef46cc86',[
                    "email_address" => request('email'),
                     "status" => "subscribe",
                       ]);
            } catch (\Exception $e){
             throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email Could not not be added.'
                ]);
            }
            //dd($response);

                return redirect('/');
                });

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


//find a post by its slug and pass ot view called "post"
//$post=Post::findOrFail($id);
//dd($post);



  // return $slug;


 Route::get('categories/{category:slug}', function (Category $category) {
//  $x=$category->posts;
//  dd($x);
    return view('posts',[
    'posts'=>$category->posts()->paginate(10),
    'currentCategory' => $category,
    'categories' => Category::all(),

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
