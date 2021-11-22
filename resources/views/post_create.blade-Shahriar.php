@extends('layout')
@section('content')
<section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
        <h1 class="text-center font-bold text-xl">Create a Post!</h1>

        <form method="POST" action="/admin/posts" class="mt-10" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="title"
                >
                    Title
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="title"
                       id="title"
                       value="{{old('title')}}"
                       required
                >
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>

                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="slug"
                >
                slug
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="slug"
                       id="slug"
                       value="{{old('slug')}}"
                       required
                >
                @error('slug')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>

                @enderror

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="excerpt"
                >
                Excerpt
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="excerpt"
                       id="excerpt"
                       value="{{old('excerpt')}}"
                       required
                >
                @error('excerpt')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>

                @enderror

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="thumbnail"
                    >
                        Body
                    </label>


                    <input class="border border-gray-400 p-2 w-full"
                           type="file"
                           name="thumbnail"
                           id="thumbnail"
                           required
                    >
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>

                    @enderror
                </div>


            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="body"
                >
                    Body
                </label>


                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="body"
                       id="body"
                       required
                >
                @error('body')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>

                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="category_id"
                >
                    Category
                </label>

                {{-- <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select> --}}
             <Select name="category_id" id="category_id">
               @foreach (\App\Models\Category::all() as $category )

                <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}> {{$category->name}}</option>
                @endforeach

             </Select>
                @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                >
                    Submit
                </button>
            </div>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                <li class="text-red-500 text-xm">{{$error}}</li>
                @endforeach
            </ul>
            @endif


        </form>
    </main>
</section>

  @endsection
