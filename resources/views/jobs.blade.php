<x-layout>
    <x-slot:title>
        Jobs
    </x-slot:title>
    <x-slot:heading>
        Jobs listings
    </x-slot:heading>
    <ul>
    @foreach ($jobs as $job)
        <a href="/jobs/{{$job['id']}}" class="text-blue-500 hover:underline">
            <li><strong>{{$job['title']}}:</strong> pays {{$job['salary']}}</li>
        </a>
    @endforeach
    </ul>
</x-layout>