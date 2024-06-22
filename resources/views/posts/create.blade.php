<x-layout>
    <x-slot:title>Create Post</x-slot:title>
    <x-slot:heading>Create a new post</x-slot:heading>
    <form method="POST" action="/posts">
    @csrf
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-field>
                <x-form-label for="title">Title</x-form-label>
                <div class="mt-2">
                    <x-form-input type="text" name="title" id="title" placeholder='What a great day!'  />
                </div>
                <x-form-error name='title'></x-form-error>
            </x-form-field>
            <div class="col-span-full">
            <x-form-field>
                <x-form-label for='content'>Content</x-form-label>
                <div class="mt-2">
                    <x-form-textarea name='content' id='content' />
                    <p class="mt-3 text-sm leading-6 text-gray-600">Feel free to talk about any topic.</p>
                </div>
                <x-form-error name='content'></x-form-error>
            </x-form-field>

            </div>

        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                Cancel
            </button>
            <x-form-button>Post</x-form-button>
        </div>
    </form>
</x-layout>
