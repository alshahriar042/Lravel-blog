@extends('layout')
@section('content')
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col ">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-50">

            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $post )
                <tr>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{$post->title}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                          {{$post->category->name}}
                        </span>
                      </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        published
                      </span>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a href="/admin/posts/{{ $post->id }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                  </tr>
                @endforeach

              <!-- More people... -->
            </tbody>
          </table>
          {{ $posts->links() }}

        </div>
      </div>
    </div>
  </div>

@endsection
