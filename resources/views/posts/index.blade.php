<x-layout>
    <x-slot:title>
    Blog Posts
    </x-slot:title>
    <x-slot:heading>
        Posts
    </x-slot:heading>
    <div class="bg-white pb-10">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach ($posts as $post)
                <x-blog-post>
                    <x-slot:title>{{$post->title}}</x-slot:title>
                    <x-slot:content>{{$post->post_content}}</x-slot:content>
                    <x-slot:updated_at>{{ \Carbon\Carbon::parse($post->updated_at)->format('M d Y')}}</x-slot:updated_at>
                    <x-slot:user>{{$post->user->first_name}} {{$post->user->last_name}}</x-slot:user>
                </x-blog-post>
            @endforeach
          </div>
        </div>
      </div>

</x-layout>
