<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
   // protected $guarded =['id'];
    protected $fillable = ['title','excerpt','body','user_id','category_id','slug','thumbnail', 'id'];
    protected $with =['category','user'];

   public function category(){
     return $this->belongsTo(Category::class);
   }

   public function user(){
    return $this->belongsTo(User::class);
  }

  public function comments(){
    return $this->hasMany(Comment::class);
  }
}
