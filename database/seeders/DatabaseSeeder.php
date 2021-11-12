<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          User::truncate();
          Category::truncate();
          Post::truncate();

         Post::factory(30)->create();

    //     $user=User::factory()->create();

    //     $personal= Category::Create([
    //          'name'=>'Personal',
    //          'slug'=>'personal'
    //      ]);
    //   $work= Category::Create([
    //         'name'=>'work',
    //         'slug'=>'work'
    //     ]);

    //     Post::Create([
    //         'user_id'=>$user->id,
    //         'category_id'=>$personal->id,
    //         'title'=>'My family Post',
    //         'slug' =>'my-personal-post',
    //         'excerpt'=>'Lorem ispum asty and',
    //         'body'=>'Lorem ispum asty and Lorem ispum asty andLorem ispum asty and Lorem ispum asty and'

    //     ]);
    //     Post::Create([
    //         'user_id'=>$user->id,
    //         'category_id'=>$personal->id,
    //         'title'=>'My personal Post',
    //         'slug' =>'my-persianl-post',
    //         'excerpt'=>'Lorem ispum asty and',
    //         'body'=>'Lorem ispum asty and Lorem ispum asty andLorem ispum asty and Lorem ispum asty and'

    //       ]);

    //     Post::Create([
    //         'user_id'=>$user->id,
    //         'category_id'=>$work->id,
    //         'title'=>'My work Post',
    //         'slug' =>'my-work-post',
    //         'excerpt'=>'Lorem ispum asty and',
    //         'body'=>'Lorem ispum asty and Lorem ispum asty andLorem ispum asty and Lorem ispum asty and'

    //       ]);

    //       Post::Create([
    //         'user_id'=>$user->id,
    //         'category_id'=>$work->id,
    //         'title'=>'My Job Post',
    //         'slug' =>'my-job-post',
    //         'excerpt'=>'Lorem ispum asty and',
    //         'body'=>'Lorem ispum asty and Lorem ispum asty andLorem ispum asty and Lorem ispum asty and'

    //       ]);


    }
}
