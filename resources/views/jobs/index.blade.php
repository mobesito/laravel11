<x-layout>
    <x-slot:title>
        Jobs
    </x-slot:title>
    <x-slot:heading>
        Jobs listings
    </x-slot:heading>
    <div>
    @foreach ($jobs as $job)

        <a href="/jobs/{{$job['id']}}" class="block px-4 py-6 border border-gray-300 my-4 rounded-lg bg-white">
            <div class="font-bold text-blue-500">
                {{$job->employer->name}}
            </div>
            <div>
                <strong>{{$job['title']}}:</strong> pays {{$job['salary']}}
            </div>
        </a>
    @endforeach
    <div>
        {{$jobs->links()}}
    </div>
    </div>
</x-layout>
