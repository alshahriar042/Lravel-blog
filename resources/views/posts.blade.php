@extends('layout')
@extends('category')

@section('content')

{{-- @foreach ($posts as $post)

<article class="{{$loop->odd ? 'mb-6' : ''}}">
    <h1>
        <a href="/posts/{{ $post->slug }}">
        {{$post->title}}
        </a>
    </h1>

    <p>
        By <a href="/users/{{$post->user->user_name}}">{{$post->user->name}}</a> In<a href="/categories/{{$post->category->slug}}"> {{ $post->category->name }}</a>
     </p>

<div>
    <strong> {{ $post->excerpt }}</strong>
</div>
<div>
  <strong>
      Date:{{$post->date}}
  </strong>
</div>
<p> {{$post->body}}</p>
</article>
@endforeach --}}
<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    @if ($posts->count())

    <article
        class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
        <div class="py-6 px-5 lg:flex">
            <div class="flex-1 lg:mr-8">
                <img src="{{asset('storage/resources/' .$posts[0]->thumbnail)}}" alt="Blog Post illustration" class="rounded-xl">
            </div>

            <div class="flex-1 flex flex-col justify-between">
                <header class="mt-8 lg:mt-0">
                    <div class="space-x-2">
                        <a href="#"
                           class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                           style="font-size: 10px">{{$posts[0]->category->name}}</a>

                    </div>

                    <div class="mt-4">
                        <h1 class="text-3xl">
                            <a href="/posts/{{ $posts[0]->slug }}">
                                {{$posts[0]->title}}
                                </a>
                        </h1>

                        <span class="mt-2 block text-gray-400 text-xs">
                                Published <time>{{$posts[0]->created_at->diffForHumans()}}</time>
                            </span>
                    </div>
                </header>

                <div class="text-sm mt-2">
                    <p>
                        {{$posts[0]->excerpt}}
                    </p>

                    <p class="mt-4">
                        {{$posts[0]->body}}
                    </p>
                </div>

                <footer class="flex justify-between items-center mt-8">
                    <div class="flex items-center text-sm">
                        <img src="./images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3">
                            <h5 class="font-bold">{{$posts[0]->user->name}}</h5>
                            <h6>Mascot at Laracasts</h6>
                        </div>
                    </div>

                    <div class="hidden lg:block">
                        <a href="#"
                           class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                        >Read More</a>
                    </div>
                </footer>
            </div>
        </div>
    </article>

    <div class="lg:grid lg:grid-cols-6">
        @foreach ($posts->skip(1) as $post)
        {{-- @dd($loop) --}}


        <article
            class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl
           {{$loop->iteration <3 ? 'col-span-3' : 'col-span-2'}} ">
            <div class="py-6 px-5">
                <div>
                    <img src="{{asset('storage/resources/' .$post->thumbnail)}}" alt="Blog Post illustration" class="rounded-xl">
                </div>

                <div class="mt-8 flex flex-col justify-between">
                    <header>
                        <div class="space-x-2">
                            <a href="#"
                               class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                               style="font-size: 10px">{{$post->category->name}}</a>


                        </div>

                        <div class="mt-4">
                            <h1 class="text-3xl">
                                <a href="/posts/{{ $post->slug }}">
                                    {{$post->title}}
                                    </a>
                             </h1>

                            <span class="mt-2 block text-gray-400 text-xs">
                                Published <time>{{$post->created_at->diffForHumans()}}</time>
                            </span>
                        </div>
                    </header>

                    <div class="text-sm mt-4">
                        <p>
                            {{$post->excerpt}}
                        </p>

                        <p class="mt-4">
                            {{$post->body}}                        </p>
                    </div>

                    <footer class="flex justify-between items-center mt-8">
                        <div class="flex items-center text-sm">

                            <img src=  "{{asset('images/lary-avatar.svg')}}" alt="Lary avatar">
                            <div class="ml-3">
                                <h5 class="font-bold">{{$post->user->name}}</h5>
                                <h6>Mascot at Laracasts</h6>
                            </div>
                        </div>

                        <div>
                            <a href="#"
                               class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                            >
                                Read More
                            </a>
                        </div>
                    </footer>
                </div>
            </div>
        </article>
        {{-- {{ $posts->links() }} --}}

        @endforeach
    </div>
    @if ( $posts->links() )
    {{ $posts->links() }}

    @endif
    {{-- {{ $categories->links() }} --}}


    {{-- {{ $categories->links() }} --}}


    @else
    <p>No posts Yet. Please Check back later</p>
    @endif



</main>
@endsection
