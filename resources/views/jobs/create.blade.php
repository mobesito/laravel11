<x-layout>
    <x-slot:title> Create Job </x-slot:title>
    <x-slot:heading> Create Job </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">
                    Create a new job entry
                </h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">
                    Please fill the information below as requested
                </p>

                <div
                    class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                >
                    <div class="sm:col-span-3">
                        <label
                            for="title"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Title</label
                        >
                        <div class="mt-2">
                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="Firefighter"
                            />
                        </div>
                        @error('title')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label
                            for="salary"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Salary</label
                        >
                        <div class="mt-2">
                            <input
                                type="text"
                                name="salary"
                                id="salary"
                                class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="$45,000 USD"
                            />
                        </div>
                        @error('salary')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{$message}}</p>
                        @enderror
                    </div>

                </div>
                {{-- <div class="mt-5">
                    @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="text-red-500 italic">{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                </div> --}}
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button
                type="button"
                class="text-sm font-semibold leading-6 text-gray-900"
            >
                Cancel
            </button>
            <button
                type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
                Save
            </button>
        </div>
    </form>
</x-layout>
