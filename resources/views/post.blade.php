@extends('layout')

@section('content')
<article>
        <h1> {{$post->title}} </h1>
        <p>
        By <a href="/users/{{$post->user->user_name}}">{{$post->user->name}}</a> In<a href="/categories/{{$post->category->slug}}"> {{ $post->category->name }}</a>
     </p>
    <div>
        <strong>  {{$post->excerpt}}

        </strong>
    </div>
    <div>
      <strong> Date: {{$post->date}}
      </strong>
    </div>
    <p> {{$post->body}}</p>
    </article>

<a href="/">GO back</a>

@endsection
